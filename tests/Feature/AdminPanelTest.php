<?php

namespace Tests\Feature;

use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    private function enquiry(array $attributes = []): Enquiry
    {
        return Enquiry::create($attributes + [
            'enquiry_type' => 'site_visit', 'full_name' => 'Test Visitor', 'phone' => '9876543210',
        ]);
    }

    public function test_admin_pages_and_documents_require_an_admin_account(): void
    {
        $enquiry = $this->enquiry();
        $document = $enquiry->documents()->create([
            'category' => 'satbara', 'label' => '7/12 Extract', 'path' => 'enquiry-attachments/test.pdf',
            'original_name' => 'test.pdf', 'size' => 100,
        ]);
        foreach (['/admin', '/admin/enquiries/'.$enquiry->id, '/admin/enquiries/'.$enquiry->id.'/documents/'.$document->id, '/admin/account'] as $url) {
            $this->get($url)->assertRedirect('/admin/login');
        }
        $this->actingAs(User::factory()->create(['is_admin' => false]));
        $this->get('/admin')->assertForbidden();
        $this->get('/admin/enquiries/'.$enquiry->id)->assertForbidden();
        $this->get('/admin/enquiries/'.$enquiry->id.'/documents/'.$document->id)->assertForbidden();
        $this->patch('/admin/enquiries/'.$enquiry->id, ['status' => 'closed'])->assertForbidden();
    }

    public function test_admin_can_login_and_logout_but_other_users_cannot_login(): void
    {
        $admin = User::factory()->create(['is_admin' => true, 'password' => 'correct-password']);
        $this->from('/admin/login')->post('/admin/login', ['email' => $admin->email, 'password' => 'wrong'])
            ->assertRedirect('/admin/login')->assertSessionHasErrors('email');
        $this->post('/admin/login', ['email' => $admin->email, 'password' => 'correct-password'])->assertRedirect('/admin');
        $this->assertAuthenticatedAs($admin);
        $this->get('/admin')->assertOk()->assertHeader('X-Robots-Tag', 'noindex, nofollow');
        $this->post('/admin/logout')->assertRedirect('/admin/login');
        $this->assertGuest();
        $regular = User::factory()->create(['is_admin' => false, 'password' => 'correct-password']);
        $this->from('/admin/login')->post('/admin/login', ['email' => $regular->email, 'password' => 'correct-password'])
            ->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_admin_login_is_rate_limited(): void
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post('/admin/login', ['email' => 'unknown@example.com', 'password' => 'incorrect'])->assertStatus(302);
        }
        $this->post('/admin/login', ['email' => 'unknown@example.com', 'password' => 'incorrect'])->assertStatus(429);
    }

    public function test_inbox_search_filters_pagination_and_escaped_submission_content(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $land = $this->enquiry(['enquiry_type' => 'land_registration', 'full_name' => 'Land Owner', 'land_location' => 'Poladpur', 'survey_number' => '42/1', 'message' => '<script>alert(1)</script>']);
        for ($i = 0; $i < 21; $i++) {
            $this->enquiry(['full_name' => 'Visitor '.$i]);
        }
        $this->get('/admin')->assertOk()->assertSee('Next')->assertSee('22 results');
        $this->get('/admin?page=2')->assertOk()->assertSee('Land Owner');
        $this->get('/admin?q=42%2F1&type=land_registration&status=new')->assertOk()->assertSee('Land Owner')->assertDontSee('Visitor 20');
        $this->get('/admin?q=nothing-matches')->assertOk()->assertSee('No matching enquiries');
        $this->get('/admin/enquiries/'.$land->id)->assertOk()->assertSee('Poladpur')->assertSee('42/1')->assertSee('<script>alert(1)</script>')->assertDontSee('<script>alert(1)</script>', false);
        $this->from('/admin')->get('/admin?status=invalid')->assertRedirect('/admin')->assertSessionHasErrors('status');
    }

    public function test_status_updates_validate_and_documents_are_scoped_to_their_enquiry(): void
    {
        Storage::fake('local');
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $enquiry = $this->enquiry();
        Storage::disk('local')->put('enquiry-attachments/record.pdf', 'private document');
        $document = $enquiry->documents()->create([
            'category' => 'satbara', 'label' => '7/12 Extract', 'path' => 'enquiry-attachments/record.pdf',
            'original_name' => 'satbara.pdf', 'size' => 16,
        ]);
        $this->get(route('admin.documents.download', [$enquiry, $document]))->assertOk()->assertDownload('enquiry-'.$enquiry->id.'-satbara.pdf');
        $other = $this->enquiry();
        $this->get(route('admin.documents.download', [$other, $document]))->assertNotFound();
        $this->from(route('admin.enquiries.show', $enquiry))->patch(route('admin.enquiries.update', $enquiry), ['status' => 'contacted'])->assertSessionHas('success');
        $this->assertSame('contacted', $enquiry->fresh()->status);
        $this->patch(route('admin.enquiries.update', $enquiry), ['status' => 'invalid'])->assertSessionHasErrors('status');
        $this->assertSame('contacted', $enquiry->fresh()->status);
        $this->travel(8)->days();
        $this->get(route('admin.documents.download', [$enquiry, $document]))->assertOk();
        $this->travelBack();
    }

    public function test_submission_is_saved_before_whatsapp_with_all_details_and_document_metadata(): void
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->create('land-record.pdf', 20, 'application/pdf');
        $this->post('/site-visit', [
            'enquiry_type' => 'land_registration', 'full_name' => 'Land Owner', 'phone' => '9876543210',
            'email' => 'owner@example.com', 'message' => 'Please contact me', 'land_location' => 'Poladpur',
            'survey_number' => '42/1', 'documents' => ['satbara' => $file],
        ])->assertStatus(303);
        $this->assertDatabaseHas('enquiries', [
            'full_name' => 'Land Owner', 'email' => 'owner@example.com', 'phone' => '9876543210',
            'message' => 'Please contact me', 'land_location' => 'Poladpur', 'survey_number' => '42/1',
            'enquiry_type' => 'land_registration', 'status' => 'new',
        ]);
        $this->assertDatabaseHas('enquiry_documents', [
            'enquiry_id' => Enquiry::first()->id, 'category' => 'satbara', 'label' => '7/12 Extract (Satbara)',
            'original_name' => 'land-record.pdf', 'path' => 'enquiry-attachments/'.$file->hashName(),
        ]);
    }

    public function test_failed_database_save_removes_uploads_and_shows_a_retry_message(): void
    {
        Storage::fake('local');
        Enquiry::creating(function () {
            throw new \RuntimeException('Simulated database failure');
        });
        try {
            $this->from('/')->post('/site-visit', [
                'full_name' => 'Visitor', 'phone' => '9876543210', 'attachment' => UploadedFile::fake()->image('ref.png'),
            ])->assertRedirect('/')->assertSessionHasErrors('enquiry');
            $this->assertDatabaseCount('enquiries', 0);
            $this->assertSame([], Storage::disk('local')->allFiles());
        } finally {
            Enquiry::flushEventListeners();
        }
    }

    public function test_admin_can_change_password_only_with_the_current_password(): void
    {
        $admin = User::factory()->create(['is_admin' => true, 'password' => 'current-password']);
        $this->actingAs($admin)->get('/admin/account')->assertOk();
        $details = ['password' => 'new-secure-password', 'password_confirmation' => 'new-secure-password'];
        $this->put('/admin/account/password', $details + ['current_password' => 'incorrect'])->assertSessionHasErrors('current_password');
        $this->put('/admin/account/password', $details + ['current_password' => 'current-password'])->assertSessionHas('success');
        $this->assertTrue(Hash::check('new-secure-password', $admin->fresh()->password));
    }

    public function test_admin_setup_command_creates_an_admin_and_does_not_overwrite_existing_accounts(): void
    {
        $this->artisan('admin:create', ['email' => 'admin@example.com', '--generate-password' => true])->assertSuccessful();
        $this->assertTrue(User::where('email', 'admin@example.com')->first()->is_admin);
        $regular = User::factory()->create(['is_admin' => false]);
        $this->artisan('admin:create', ['email' => $regular->email, '--generate-password' => true])->assertFailed();
        $this->assertFalse($regular->fresh()->is_admin);
    }
}
