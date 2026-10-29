<?php

namespace Tests\Feature;

use App\Models\ChannelPartner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ChannelPartnerTest extends TestCase
{
    use RefreshDatabase;

    private function details(array $overrides = []): array
    {
        return array_replace([
            'partner_type' => 'individual', 'name' => 'Test Partner', 'email' => 'partner@example.com',
            'mobile' => '9876543210', 'city' => 'Mumbai', 'experience' => '1_to_3',
            'password' => 'Partner123', 'password_confirmation' => 'Partner123', 'terms' => '1',
            'terms_version' => \App\Support\PartnerTerms::version(),
        ], $overrides);
    }

    public function test_public_form_and_homepage_link_are_available(): void
    {
        $this->get('/')->assertOk()->assertSee(route('partners.register'));
        $this->get('/partners/register')->assertOk()->assertSee('Channel Partner Registration')->assertSee('Real Estate Agency')->assertSee('Individual Broker');
        $this->get('/partners/login')->assertOk();
        $this->get('/partners/dashboard')->assertRedirect('/partners/login');
    }

    public function test_individual_registration_hashes_password_and_does_not_accept_admin_or_agency_fields(): void
    {
        $this->post('/partners/register', $this->details(['is_admin' => true, 'status' => 'approved', 'approved_by' => 1, 'agency_name' => 'Ignored']))
            ->assertRedirect('/partners/login')->assertSessionHas('success');
        $user = User::where('email', 'partner@example.com')->firstOrFail();
        $this->assertFalse($user->is_admin);
        $this->assertSame('pending', $user->channelPartner->status);
        $this->assertTrue(Hash::check('Partner123', $user->password));
        $this->assertNull($user->channelPartner->agency_name);
        $this->assertNotNull($user->channelPartner->terms_accepted_at);
        $this->assertSame(\App\Support\PartnerTerms::version(), $user->channelPartner->terms_version);
        $this->assertGuest();
    }

    public function test_agency_requires_a_company_name_and_stores_optional_rera_number(): void
    {
        $this->from('/partners/register')->post('/partners/register', $this->details(['partner_type' => 'agency']))
            ->assertSessionHasErrors('agency_name');
        $this->assertDatabaseCount('users', 0);
        $this->post('/partners/register', $this->details(['partner_type' => 'agency', 'agency_name' => 'Test Realty', 'rera_number' => 'A12345']))
            ->assertSessionHasNoErrors()->assertRedirect('/partners/login');
        $this->assertDatabaseHas('channel_partners', ['agency_name' => 'Test Realty', 'rera_number' => 'A12345']);
    }

    public function test_validation_rejects_invalid_details_and_never_flashes_passwords(): void
    {
        $this->from('/partners/register')->post('/partners/register', $this->details([
            'partner_type' => 'unknown', 'name' => '', 'mobile' => '123', 'email' => 'invalid', 'city' => '',
            'experience' => 'unknown', 'password' => 'abcdefgh', 'password_confirmation' => 'mismatch', 'terms' => '0',
        ]))->assertRedirect('/partners/register')->assertSessionHasErrors([
            'partner_type', 'name', 'mobile', 'email', 'city', 'experience', 'password', 'terms',
        ])->assertSessionMissing('_old_input.password')->assertSessionMissing('_old_input.password_confirmation');
        $this->assertDatabaseCount('users', 0);
        $this->assertDatabaseCount('channel_partners', 0);
    }

    public function test_duplicate_email_and_mobile_are_rejected(): void
    {
        $this->post('/partners/register', $this->details())->assertSessionHasNoErrors();
        $this->post('/partners/register', $this->details())->assertSessionHasErrors(['email', 'mobile']);
        $this->assertDatabaseCount('channel_partners', 1);
    }

    public function test_partner_login_dashboard_logout_and_admin_isolation(): void
    {
        $this->post('/partners/register', $this->details());
        User::where('email', 'partner@example.com')->firstOrFail()->channelPartner->forceFill(['status' => 'approved'])->save();
        $this->post('/partners/login', ['email' => 'partner@example.com', 'password' => 'wrong'])->assertSessionHasErrors('email');
        $this->assertGuest();
        $this->post('/partners/login', ['email' => 'PARTNER@example.com', 'password' => 'Partner123'])->assertRedirect('/partners/dashboard');
        $this->get('/partners/dashboard')->assertOk()->assertSee('Welcome back, Test')->assertHeader('Cache-Control', 'max-age=0, no-store, private');
        $this->get('/partners/profile')->assertOk()->assertSee('Test Partner')->assertSee('Mumbai');
        $this->get('/admin')->assertForbidden();
        $this->get('/admin/partners')->assertForbidden();
        $this->post('/partners/logout')->assertRedirect('/partners/login');
        $this->assertGuest();
        $this->post('/admin/login', ['email' => 'partner@example.com', 'password' => 'Partner123'])->assertSessionHasErrors('email');
        $admin = User::factory()->create(['is_admin' => true, 'password' => 'Admin12345']);
        $this->post('/partners/login', ['email' => $admin->email, 'password' => 'Admin12345'])->assertSessionHasErrors('email');
        $this->actingAs($admin)->get('/partners/dashboard')->assertForbidden();
        $this->get('/admin/partners')->assertOk()->assertSee('Test Partner')->assertDontSee('Partner123');
    }

    public function test_registration_and_login_are_rate_limited(): void
    {
        for ($i = 0; $i < 6; $i++) {
            $this->post('/partners/register', [])->assertStatus(302);
        }
        $this->post('/partners/register', [])->assertStatus(429);
        for ($i = 0; $i < 5; $i++) {
            $this->post('/partners/login', ['email' => 'missing@example.com', 'password' => 'wrong'])->assertStatus(302);
        }
        $this->post('/partners/login', [])->assertStatus(429);
    }

    public function test_terms_document_is_complete_and_registration_requires_current_acceptance(): void
    {
        $this->get('/partners/terms')->assertOk()
            ->assertSee('1. Channel Partner Registration')
            ->assertSee('9. Marketing & Promotional Activities')
            ->assertSee('15. Acceptance of Terms & Conditions')
            ->assertSee('Channel Partner Commission Agreement');
        $this->get('/partners/register')->assertOk()->assertSee('Accept &amp; Continue', false)->assertSee(\App\Support\PartnerTerms::version());
        $this->post('/partners/register', $this->details(['terms' => '0']))->assertSessionHasErrors('terms');
        $this->post('/partners/register', $this->details(['terms_version' => str_repeat('0', 64)]))->assertSessionHasErrors('terms_version');
        $this->post('/partners/register', $this->details(['terms_version' => null]))->assertSessionHasErrors('terms_version');
        $this->assertDatabaseCount('users', 0);
        $this->assertDatabaseCount('channel_partners', 0);
    }

    public function test_personal_dashboard_never_shows_another_partners_details(): void
    {
        $this->post('/partners/register', $this->details());
        $first = User::where('email', 'partner@example.com')->firstOrFail();
        $first->channelPartner->forceFill(['status' => 'approved'])->save();
        $this->post('/partners/register', $this->details(['name' => 'Other Partner', 'email' => 'other@example.com', 'mobile' => '9123456789', 'city' => 'Pune']));
        $this->actingAs($first)->get('/partners/dashboard')->assertOk()->assertSee($first->channelPartner->partner_code)
            ->assertSee('My profile')->assertSee('Password &amp; security', false)
            ->assertDontSee('Other Partner')->assertDontSee('other@example.com')->assertDontSee('9123456789');
    }

    public function test_partner_can_change_only_their_own_password_using_the_current_password(): void
    {
        $this->put('/partners/password', [])->assertRedirect('/partners/login');
        $this->post('/partners/register', $this->details());
        $user = User::where('email', 'partner@example.com')->firstOrFail();
        $other = User::factory()->create(['password' => 'Original123']);
        $user->channelPartner->forceFill(['status' => 'approved'])->save();
        $this->actingAs($user);
        $new = ['password' => 'Changed123', 'password_confirmation' => 'Changed123', 'user_id' => $other->id];
        $this->put('/partners/password', $new + ['current_password' => 'wrong'])->assertSessionHasErrors('current_password')
            ->assertSessionMissing('_old_input.current_password')->assertSessionMissing('_old_input.password');
        $this->put('/partners/password', $new + ['current_password' => 'Partner123'])
            ->assertRedirect(route('partners.security'))->assertSessionHas('success');
        $this->assertTrue(Hash::check('Changed123', $user->fresh()->password));
        $this->assertTrue(Hash::check('Original123', $other->fresh()->password));
        $this->post('/partners/logout');
        $this->post('/partners/login', ['email' => $user->email, 'password' => 'Partner123'])->assertSessionHasErrors('email');
        $this->post('/partners/login', ['email' => $user->email, 'password' => 'Changed123'])->assertRedirect('/partners/dashboard');
        $this->actingAs(User::factory()->create(['is_admin' => true]))->put('/partners/password', [])->assertForbidden();
    }
}
