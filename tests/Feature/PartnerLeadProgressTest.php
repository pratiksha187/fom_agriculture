<?php

namespace Tests\Feature;

use App\Models\ChannelPartner;
use App\Models\PartnerLead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnerLeadProgressTest extends TestCase
{
    use RefreshDatabase;

    private function partner(string $status = 'approved'): ChannelPartner
    {
        $user = User::factory()->create();
        $partner = $user->channelPartner()->create([
            'partner_type' => 'individual', 'mobile' => (string) (9000000000 + $user->id),
            'city' => 'Mumbai', 'experience' => '1_to_3', 'terms_accepted_at' => now(),
        ]);
        $partner->forceFill(['status' => $status])->save();
        return $partner;
    }

    private function submitLead(ChannelPartner $partner): PartnerLead
    {
        $this->actingAs($partner->user)->post('/partners/leads', [
            'buyer_name' => 'Progress Buyer', 'phone' => '9876543210', 'buyer_consent' => '1',
        ])->assertRedirect('/partners/leads');
        return $partner->leads()->latest('id')->firstOrFail();
    }

    public function test_partner_tracks_all_five_statuses_and_reschedules_with_a_dated_history(): void
    {
        $this->freezeTime();
        $partner = $this->partner();
        $lead = $this->submitLead($partner);
        $url = route('partners.leads.status', $lead);
        $this->assertSame('new', $lead->pipeline_status);
        $this->assertSame('New Lead', $lead->pipeline_label);
        $this->assertDatabaseHas('partner_lead_status_histories', ['partner_lead_id' => $lead->id, 'from_status' => null, 'to_status' => 'new', 'changed_by' => $partner->user_id]);

        $time = now()->addDay()->timezone('Asia/Kolkata')->format('Y-m-d\TH:i');
        $this->patch($url, ['status' => 'scheduled', 'scheduled_at' => $time, 'notes' => 'Customer available tomorrow'])->assertSessionHasNoErrors();
        $visit = $lead->visits()->firstOrFail();
        $this->assertSame($time, $visit->scheduled_at->timezone('Asia/Kolkata')->format('Y-m-d\TH:i'));
        $this->assertSame('scheduled', $visit->status);
        $this->assertNull($visit->verified_by);
        $this->assertSame('new', $lead->fresh()->status);

        $later = now()->addDays(2)->timezone('Asia/Kolkata')->format('Y-m-d\TH:i');
        $this->patch($url, ['status' => 'scheduled', 'scheduled_at' => $later])->assertSessionHasNoErrors();
        $this->patch($url, ['status' => 'scheduled', 'scheduled_at' => $later])->assertSessionHasNoErrors();
        $this->assertDatabaseCount('partner_site_visits', 1);
        $this->assertDatabaseCount('partner_lead_status_histories', 3);
        $this->travel(3)->days();
        $this->patch($url, ['status' => 'completed'])->assertSessionHasNoErrors();
        $this->assertSame('completed', $visit->fresh()->status);
        $this->assertNull($visit->fresh()->verified_by);
        $this->patch($url, ['status' => 'booked'])->assertSessionHasNoErrors();
        $this->assertDatabaseCount('partner_bookings', 0);
        $this->get('/partners/dashboard')->assertViewHas('stats', fn ($stats) => $stats['bookings'] === 1);
        $this->patch($url, ['status' => 'rejected', 'notes' => 'Buyer chose another property'])->assertSessionHasNoErrors();
        $this->get('/partners/leads?status=rejected')->assertSee('Progress Buyer');
        $this->get('/partners/leads?status=booked')->assertDontSee('Progress Buyer');
        $this->get(route('partners.leads.show', $lead))->assertOk()->assertSee('Status history')->assertSee('Buyer chose another property')->assertSee('Customer available tomorrow');
        $this->patch($url, ['status' => 'new'])->assertSessionHasNoErrors();
        $this->assertSame('new', $lead->fresh()->pipeline_status);
        $this->assertDatabaseCount('partner_lead_status_histories', 7);
    }

    public function test_scheduling_requires_a_future_ist_time_and_completion_requires_an_elapsed_visit(): void
    {
        $this->freezeTime();
        $lead = $this->submitLead($this->partner());
        $url = route('partners.leads.status', $lead);
        $this->patch($url, ['status' => 'scheduled'])->assertSessionHasErrors('scheduled_at');
        $this->patch($url, ['status' => 'scheduled', 'scheduled_at' => 'invalid'])->assertSessionHasErrors('scheduled_at');
        $this->patch($url, ['status' => 'scheduled', 'scheduled_at' => now()->subDay()->format('Y-m-d\TH:i')])->assertSessionHasErrors('scheduled_at');
        $this->patch($url, ['status' => 'completed'])->assertSessionHasErrors('status');
        $this->patch($url, ['status' => 'approved'])->assertSessionHasErrors('status');
        $this->assertDatabaseCount('partner_site_visits', 0);
        $this->assertDatabaseCount('partner_lead_status_histories', 1);
        $this->patch($url, ['status' => 'scheduled', 'scheduled_at' => now()->addWeek()->timezone('Asia/Kolkata')->format('Y-m-d\TH:i')])->assertSessionHasNoErrors();
        $this->patch($url, ['status' => 'completed'])->assertSessionHasErrors('status');
        $this->assertSame('scheduled', $lead->fresh()->pipeline_status);
        $this->patch($url, ['status' => 'rejected'])->assertSessionHasNoErrors();
        $this->assertSame('cancelled', $lead->visits()->firstOrFail()->status);
        $this->get('/partners/dashboard')->assertViewHas('stats', fn ($stats) => $stats['visits'] === 0);
    }

    public function test_partner_cannot_modify_or_read_another_partners_lead_or_history(): void
    {
        $owner = $this->partner();
        $lead = $this->submitLead($owner);
        $other = $this->partner();
        $this->actingAs($other->user)->patch(route('partners.leads.status', $lead), ['status' => 'booked'])->assertNotFound();
        $this->get(route('partners.leads.show', $lead))->assertNotFound();
        $this->get('/partners/leads?status=new')->assertDontSee('Progress Buyer');
        $this->actingAs($this->partner('pending')->user)->patch(route('partners.leads.status', $lead), ['status' => 'booked'])->assertForbidden();
        $this->actingAs(User::factory()->create(['is_admin' => true]))->patch(route('partners.leads.status', $lead), ['status' => 'booked'])->assertForbidden();
        $this->post('/admin/logout');
        $this->patch(route('partners.leads.status', $lead), ['status' => 'booked'])->assertRedirect('/partners/login');
        $this->assertDatabaseCount('partner_lead_status_histories', 1);
        $this->assertSame('new', $lead->fresh()->pipeline_status);
    }

    public function test_admin_visit_updates_sync_partner_progress_and_record_the_actor(): void
    {
        $this->freezeTime();
        $partner = $this->partner();
        $lead = $this->submitLead($partner);
        $this->patch(route('partners.leads.status', $lead), ['status' => 'scheduled', 'scheduled_at' => now()->addDay()->timezone('Asia/Kolkata')->format('Y-m-d\TH:i')]);
        $visit = $lead->visits()->firstOrFail();
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin)->patch(route('admin.partners.visits.update', [$partner, $visit]), [
            'status' => 'completed', 'scheduled_at' => now()->subHour()->timezone('Asia/Kolkata')->format('Y-m-d\TH:i'),
        ])->assertSessionHasNoErrors();
        $this->assertSame('completed', $lead->fresh()->pipeline_status);
        $this->assertDatabaseHas('partner_lead_status_histories', ['partner_lead_id' => $lead->id, 'changed_by' => $admin->id, 'from_status' => 'scheduled', 'to_status' => 'completed']);
        $this->assertSame($admin->id, $visit->fresh()->verified_by);
    }

    public function test_history_failure_rolls_back_progress_and_appointment_changes(): void
    {
        $lead = $this->submitLead($this->partner());
        \App\Models\PartnerLeadStatusHistory::creating(function () {
            throw new \RuntimeException('Simulated history failure');
        });
        try {
            $this->withoutExceptionHandling()->patch(route('partners.leads.status', $lead), [
                'status' => 'scheduled', 'scheduled_at' => now()->addDay()->timezone('Asia/Kolkata')->format('Y-m-d\TH:i'),
            ]);
            $this->fail('Expected the history write to fail.');
        } catch (\RuntimeException $exception) {
            $this->assertSame('Simulated history failure', $exception->getMessage());
        } finally {
            \App\Models\PartnerLeadStatusHistory::flushEventListeners();
        }
        $this->assertNull($lead->fresh()->progress_status);
        $this->assertDatabaseCount('partner_site_visits', 0);
        $this->assertDatabaseCount('partner_lead_status_histories', 1);
    }

    public function test_admin_official_booking_updates_progress_without_losing_partner_history(): void
    {
        $partner = $this->partner();
        $lead = $this->submitLead($partner);
        $this->patch(route('partners.leads.status', $lead), ['status' => 'rejected', 'notes' => 'Initial decision']);
        $lead->forceFill(['status' => 'accepted'])->save();
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin)->put(route('admin.partners.bookings.save', [$partner, $lead]), [
            'reference' => 'FOM-TEST-1', 'plot' => 'A-1', 'sale_amount' => '100000',
            'status' => 'confirmed', 'commission_status' => 'not_eligible',
        ])->assertSessionHasNoErrors();
        $this->assertSame('booked', $lead->fresh()->pipeline_status);
        $this->assertDatabaseHas('partner_lead_status_histories', ['changed_by' => $admin->id, 'from_status' => 'rejected', 'to_status' => 'booked']);
        $this->actingAs($partner->user)->get('/partners/leads?status=booked')->assertSee('Progress Buyer');
        $this->get('/partners/leads?status=rejected')->assertDontSee('Progress Buyer');
        $this->get(route('partners.leads.show', $lead))->assertSee('Initial decision')->assertSee($admin->name);
    }

    public function test_bookings_tab_shows_partner_marked_leads_and_removes_them_when_progress_changes(): void
    {
        $owner = $this->partner();
        $lead = $this->submitLead($owner);
        $this->patch(route('partners.leads.status', $lead), ['status' => 'booked'])->assertSessionHasNoErrors();
        $other = $this->submitLead($this->partner());
        $other->forceFill(['buyer_name' => 'Other Private Buyer', 'progress_status' => 'booked'])->save();
        $other->booking()->create(['reference' => 'OTHER-1', 'plot' => 'PRIVATE', 'sale_amount' => 200000, 'status' => 'confirmed']);

        $this->actingAs($owner->user)->get('/partners/bookings')->assertOk()
            ->assertSee('Progress Buyer')->assertSee('Booking details awaiting the project team.')
            ->assertDontSee('No bookings recorded yet')->assertDontSee('Other Private Buyer')->assertDontSee('OTHER-1')
            ->assertViewHas('bookingLeads', fn ($leads) => $leads->total() === 1 && $leads->first()->id === $lead->id);
        $this->assertFalse($lead->booking()->exists());
        $this->patch(route('partners.leads.status', $lead), ['status' => 'rejected'])->assertSessionHasNoErrors();
        $this->get('/partners/bookings')->assertOk()->assertSee('No bookings recorded yet')->assertDontSee('Progress Buyer');
    }

    public function test_bookings_tab_shows_one_card_with_official_details_for_a_partner_marked_booking(): void
    {
        $lead = $this->submitLead($this->partner());
        $this->patch(route('partners.leads.status', $lead), ['status' => 'booked'])->assertSessionHasNoErrors();
        $booking = $lead->booking()->create(['reference' => 'BOOK-DETAILS-1', 'plot' => 'A-12', 'sale_amount' => 250000, 'status' => 'confirmed']);

        $this->get('/partners/bookings')->assertOk()->assertSee('BOOK-DETAILS-1')->assertSee('A-12')->assertSee('250,000.00')
            ->assertSee('Confirmed')->assertDontSee('Booking details awaiting the project team.')
            ->assertViewHas('bookingLeads', fn ($leads) => $leads->total() === 1);
        $lead->forceFill(['progress_status' => null])->save();
        $booking->update(['status' => 'cancelled']);
        $this->get('/partners/bookings')->assertOk()->assertSee('Cancelled')->assertSee('BOOK-DETAILS-1');
    }
}
