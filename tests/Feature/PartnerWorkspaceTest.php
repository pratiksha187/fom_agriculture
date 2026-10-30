<?php

namespace Tests\Feature;

use App\Models\ChannelPartner;
use App\Models\PartnerLead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnerWorkspaceTest extends TestCase
{
    use RefreshDatabase;

    private function partner(string $status = 'approved'): ChannelPartner
    {
        $user = User::factory()->create(['password' => 'Partner123']);
        $partner = $user->channelPartner()->create([
            'partner_type' => 'individual', 'mobile' => (string) (9000000000 + $user->id),
            'city' => 'Mumbai', 'experience' => '1_to_3', 'terms_accepted_at' => now(),
        ]);
        $partner->forceFill(['status' => $status])->save();

        return $partner;
    }

    private function lead(ChannelPartner $partner, string $phone = '9876543210'): PartnerLead
    {
        return $partner->leads()->create(['buyer_name' => 'Buyer One', 'phone' => $phone, 'buyer_consent_at' => now()]);
    }

    private function booking(): array
    {
        return ['reference' => 'FOM-BOOK-101', 'plot' => 'A-12', 'sale_amount' => '5000000.00', 'status' => 'confirmed', 'commission_amount' => '50000.00', 'commission_status' => 'eligible'];
    }

    public function test_admin_partner_list_handles_legacy_registration_values(): void
    {
        $partner = $this->partner();
        $partner->forceFill([
            'partner_type' => 'legacy', 'experience' => 'legacy', 'status' => 'legacy', 'created_at' => null,
        ])->save();

        $this->actingAs(User::factory()->create(['is_admin' => true]))
            ->get('/admin/partners')->assertOk()->assertSee($partner->user->name)->assertSee('Not available');
    }

    public function test_admin_can_view_partner_list_and_details_without_a_linked_user(): void
    {
        $partner = $this->partner();
        $validPartner = $this->partner();
        // Simulate a legacy orphan in the isolated SQLite transaction.
        \Illuminate\Support\Facades\DB::statement('PRAGMA defer_foreign_keys = ON');
        \Illuminate\Support\Facades\DB::table('channel_partners')->where('id', $partner->id)->update(['user_id' => 999999]);

        $this->actingAs(User::factory()->create(['is_admin' => true]))
            ->get('/admin/partners')->assertOk()->assertSee('User account unavailable')
            ->assertSee('Email unavailable')->assertSee($partner->mobile)->assertSee($validPartner->user->email);
        $this->get(route('admin.partners.show', $partner))->assertOk()
            ->assertSee('User account unavailable')->assertSee('no linked user account')->assertSee($partner->mobile);
        $this->assertDatabaseHas('channel_partners', ['id' => $partner->id, 'user_id' => 999999]);
    }

    public function test_admin_partner_list_handles_registrations_before_the_status_migration(): void
    {
        $partner = $this->partner();
        \Illuminate\Support\Facades\Schema::table('channel_partners', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropColumn('status');
        });

        $this->actingAs(User::factory()->create(['is_admin' => true]))
            ->get('/admin/partners')->assertOk()->assertSee($partner->user->name)->assertSee('Not available');
    }

    public function test_admin_approval_is_required_and_suspension_blocks_existing_sessions(): void
    {
        $partner = $this->partner('pending');
        $admin = User::factory()->create(['is_admin' => true]);
        $credentials = ['email' => $partner->user->email, 'password' => 'Partner123'];
        $this->post('/partners/login', $credentials)->assertSessionHasErrors('email');
        $this->assertGuest();
        $this->actingAs($partner->user)->get('/partners/dashboard')->assertForbidden();
        $this->post('/partners/leads', [])->assertForbidden();
        $this->patch(route('admin.partners.update', $partner), ['status' => 'approved'])->assertForbidden();
        $this->actingAs($admin)->patch(route('admin.partners.update', $partner), ['status' => 'approved'])->assertSessionHas('success');
        $this->assertDatabaseHas('channel_partners', ['id' => $partner->id, 'status' => 'approved', 'approved_by' => $admin->id]);
        $this->post('/admin/logout');
        $this->post('/partners/login', $credentials)->assertRedirect('/partners/dashboard');
        $this->get('/partners/dashboard')->assertOk()->assertSee('Add Lead');
        $this->actingAs($admin)->patch(route('admin.partners.update', $partner), ['status' => 'suspended'])->assertSessionHas('success');
        $this->actingAs($partner->user->fresh())->get('/partners/dashboard')->assertForbidden();
        $this->post('/partners/leads', [])->assertForbidden();
        $this->post('/partners/logout');
        $this->post('/partners/login', $credentials)->assertSessionHasErrors('email');
    }

    public function test_lead_submission_requires_buyer_consent_and_ignores_ownership_and_status_tampering(): void
    {
        $partner = $this->partner();
        $other = $this->partner();
        $details = ['buyer_name' => 'Buyer One', 'phone' => '9876543210', 'status' => 'accepted', 'channel_partner_id' => $other->id];
        $this->actingAs($partner->user)->post('/partners/leads', $details)->assertSessionHasErrors('buyer_consent');
        $this->assertDatabaseCount('partner_leads', 0);
        $this->post('/partners/leads', $details + ['buyer_consent' => '1'])->assertSessionHas('success');
        $this->assertDatabaseHas('partner_leads', ['channel_partner_id' => $partner->id, 'status' => 'new', 'phone' => '9876543210']);
        $this->post('/partners/leads', $details + ['buyer_consent' => '1'])->assertSessionHasErrors('phone');
        $this->actingAs($other->user)->post('/partners/leads', $details + ['buyer_consent' => '1'])->assertSessionHas('success');
        $this->assertDatabaseHas('partner_leads', ['channel_partner_id' => $other->id, 'status' => 'duplicate_review']);
    }

    public function test_visits_require_an_accepted_owned_lead_and_only_admin_can_verify_completion(): void
    {
        $partner = $this->partner();
        $other = $this->partner();
        $lead = $this->lead($partner);
        $foreign = $this->lead($other, '9123456789');
        $time = now()->addDay()->timezone('Asia/Kolkata')->format('Y-m-d\TH:i');
        $this->actingAs($partner->user)->post(route('partners.visits.store', $foreign), ['scheduled_at' => $time])->assertNotFound();
        $this->post(route('partners.visits.store', $lead), ['scheduled_at' => $time])->assertSessionHasErrors('visit');
        $lead->forceFill(['status' => 'accepted'])->save();
        $this->post(route('partners.visits.store', $lead), ['scheduled_at' => '2020-01-01T10:00'])->assertSessionHasErrors('scheduled_at');
        $this->post(route('partners.visits.store', $lead), ['scheduled_at' => $time, 'status' => 'completed', 'verified_by' => $partner->user_id])->assertSessionHas('success');
        $visit = $lead->visits()->firstOrFail();
        $this->assertSame('requested', $visit->status);
        $this->assertNull($visit->verified_by);
        $this->assertSame($time, $visit->scheduled_at->timezone('Asia/Kolkata')->format('Y-m-d\TH:i'));
        $this->post(route('partners.visits.store', $lead), ['scheduled_at' => $time])->assertSessionHasErrors('visit');
        $this->patch(route('admin.partners.visits.update', [$partner, $visit]), ['status' => 'completed'])->assertForbidden();
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin)->patch(route('admin.partners.visits.update', [$partner, $visit]), ['status' => 'completed', 'scheduled_at' => $time])->assertSessionHasErrors('visit');
        $past = now()->subHour()->timezone('Asia/Kolkata')->format('Y-m-d\TH:i');
        $this->patch(route('admin.partners.visits.update', [$partner, $visit]), ['status' => 'completed', 'scheduled_at' => $past])->assertSessionHas('success');
        $this->assertSame($admin->id, $visit->fresh()->verified_by);
        $this->assertSame('completed', $visit->fresh()->status);
    }

    public function test_admin_manages_bookings_and_commissions_and_partner_cannot_modify_them(): void
    {
        $partner = $this->partner();
        $lead = $this->lead($partner);
        $admin = User::factory()->create(['is_admin' => true]);
        $url = route('admin.partners.bookings.save', [$partner, $lead]);
        $this->actingAs($partner->user)->put($url, $this->booking())->assertForbidden();
        $this->actingAs($admin)->put($url, $this->booking())->assertSessionHasErrors('booking');
        $lead->forceFill(['status' => 'accepted'])->save();
        $this->get(route('admin.partners.show', $partner))->assertOk()->assertSee('Record booking &amp; commission', false);
        $this->put($url, $this->booking())->assertSessionHas('success');
        $this->put($url, array_replace($this->booking(), ['commission_status' => 'paid']))->assertSessionHasErrors(['payment_reference', 'paid_at']);
        $this->put($url, array_replace($this->booking(), ['commission_amount' => '-1']))->assertSessionHasErrors('commission_amount');
        $paid = array_replace($this->booking(), ['commission_status' => 'paid', 'payment_reference' => 'BANK-REF-1001', 'paid_at' => now()->timezone('Asia/Kolkata')->format('Y-m-d')]);
        $this->put($url, $paid)->assertSessionHas('success');
        $this->assertDatabaseCount('partner_bookings', 1);
        $this->assertDatabaseHas('partner_bookings', ['partner_lead_id' => $lead->id, 'commission_status' => 'paid', 'payment_reference' => 'BANK-REF-1001']);
        $this->put($url, array_replace($paid, ['status' => 'cancelled']))->assertSessionHasErrors('commission_status');
        $this->actingAs($partner->user)->get('/partners/commissions')->assertOk()->assertSee('FOM-BOOK-101')->assertSee('BANK-REF-1001')->assertSee('50,000.00');
    }

    public function test_records_and_totals_are_private_and_admin_nested_routes_are_scoped(): void
    {
        $partner = $this->partner();
        $other = $this->partner();
        $lead = $this->lead($other);
        $lead->update(['buyer_name' => 'Private Other Buyer']);
        $visit = $lead->visits()->create(['scheduled_at' => now()->addDay()]);
        $lead->booking()->create($this->booking());
        $this->actingAs($partner->user)->get('/partners/dashboard')->assertOk()->assertDontSee('Private Other Buyer')->assertDontSee('FOM-BOOK-101')
            ->assertViewHas('stats', fn ($stats) => $stats['leads'] === 0 && $stats['visits'] === 0 && $stats['bookings'] === 0);
        $this->get(route('admin.partners.show', $other))->assertForbidden();
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $this->patch(route('admin.partners.leads.update', [$partner, $lead]), ['status' => 'accepted'])->assertNotFound();
        $this->patch(route('admin.partners.visits.update', [$partner, $visit]), [])->assertNotFound();
        $this->put(route('admin.partners.bookings.save', [$partner, $lead]), $this->booking())->assertNotFound();
        $this->get(route('admin.partners.show', $other))->assertOk()->assertSee('Private Other Buyer');
    }

    public function test_portal_pages_are_separate_and_lead_details_are_private(): void
    {
        $partner = $this->partner();
        $lead = $this->lead($partner);
        $foreign = $this->lead($this->partner(), '9123456789');
        $this->actingAs($partner->user);
        $this->get('/partners/dashboard')->assertOk()->assertSee('Recent Buyer Leads')->assertSee('Visits Completed')
            ->assertDontSee('id="submit-lead"', false)->assertDontSee('id="security"', false)->assertDontSee('Commission Tracking');
        $this->get('/partners/leads')->assertOk()->assertSee('My Buyer Leads')->assertSee(route('partners.leads.show', $lead))->assertDontSee('Submit New Buyer Lead');
        $this->get('/partners/leads/create')->assertOk()->assertSee('Submit New Buyer Lead')->assertSee('name="preferred_visit_date"', false)->assertDontSee('Recent Buyer Leads');
        $this->get('/partners/visits')->assertOk()->assertSee('Site Visit Tracking')->assertDontSee('Submit New Buyer Lead');
        $this->get('/partners/bookings')->assertOk()->assertSee('Booking Tracking');
        $this->get('/partners/commissions')->assertOk()->assertSee('Commission Tracking')->assertDontSee('Recent Buyer Leads');
        foreach (['profile', 'resources', 'security', 'agreement'] as $page) {
            $this->get('/partners/'.$page)->assertOk();
        }
        $this->get(route('partners.leads.show', $lead))->assertOk()->assertSee($lead->lead_code)->assertSee('Buyer One');
        $this->get(route('partners.leads.show', $foreign))->assertNotFound();
        $this->post('/partners/logout');
        $this->get('/partners/leads')->assertRedirect('/partners/login');
    }

    public function test_search_and_pipeline_filters_use_current_status_and_preserve_partner_scope(): void
    {
        $partner = $this->partner();
        $new = $this->lead($partner);
        $new->update(['buyer_name' => 'New Buyer', 'city' => 'Mumbai']);
        $scheduled = $this->lead($partner, '9123456789');
        $scheduled->update(['buyer_name' => 'Scheduled Buyer']);
        $scheduled->visits()->create(['scheduled_at' => now()->addDay()])->forceFill(['status' => 'scheduled'])->save();
        $complete = $this->lead($partner, '9234567890');
        $complete->update(['buyer_name' => 'Complete Buyer']);
        $complete->visits()->create(['scheduled_at' => now()->subDay()])->forceFill(['status' => 'completed'])->save();
        $missed = $this->lead($partner, '9345678901');
        $missed->update(['buyer_name' => 'Missed Buyer']);
        $missed->visits()->create(['scheduled_at' => now()->subDays(2)])->forceFill(['status' => 'completed'])->save();
        $missed->visits()->create(['scheduled_at' => now()->subDay()])->forceFill(['status' => 'missed'])->save();
        $booked = $this->lead($partner, '9456789012');
        $booked->update(['buyer_name' => 'Booked Buyer']);
        $booked->visits()->create(['scheduled_at' => now()->subDay()])->forceFill(['status' => 'completed'])->save();
        $booked->booking()->create($this->booking());
        $foreign = $this->lead($this->partner(), '9567890123');
        $foreign->update(['buyer_name' => 'Foreign Private Buyer', 'city' => 'Mumbai']);
        $this->actingAs($partner->user);
        foreach (['new' => $new, 'scheduled' => $scheduled, 'completed' => $complete, 'missed' => $missed, 'booked' => $booked] as $status => $expected) {
            $this->get('/partners/leads?status='.$status)->assertOk()->assertViewHas('leads', fn ($leads) => $leads->total() === 1 && $leads->first()->id === $expected->id);
        }
        $this->get('/partners/leads?q=Mumbai')->assertOk()->assertSee('New Buyer')->assertDontSee('Foreign Private Buyer')->assertDontSee('Scheduled Buyer');
        $this->get('/partners/leads?q='.$complete->lead_code)->assertOk()->assertViewHas('leads', fn ($leads) => $leads->total() === 1 && $leads->first()->id === $complete->id);
        $this->get('/partners/dashboard')->assertOk()->assertSee('Scheduled Buyer')->assertViewHas('stats', fn ($stats) => $stats['leads'] === 5 && $stats['completed'] === 3 && $stats['visits'] === 1);
        $this->from('/partners/leads')->get('/partners/leads?status=invalid')->assertSessionHasErrors('status');
    }

    public function test_preferred_visit_date_is_saved_without_creating_a_confirmed_visit(): void
    {
        $partner = $this->partner();
        $date = now()->addWeek()->timezone('Asia/Kolkata')->toDateString();
        $this->actingAs($partner->user)->from('/partners/leads/create')->post('/partners/leads', [
            'buyer_name' => 'Preferred Visit Buyer', 'phone' => '9876543210', 'buyer_consent' => '1', 'preferred_visit_date' => $date,
        ])->assertRedirect('/partners/leads');
        $lead = $partner->leads()->firstOrFail();
        $this->assertSame($date, $lead->preferred_visit_date->toDateString());
        $this->assertDatabaseCount('partner_site_visits', 0);
        $this->get(route('partners.leads.show', $lead))->assertOk()->assertSee($lead->preferred_visit_date->format('d M Y'));
    }
}
