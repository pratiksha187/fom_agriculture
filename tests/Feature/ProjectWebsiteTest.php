<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProjectWebsiteTest extends TestCase
{
    use \Illuminate\Foundation\Testing\RefreshDatabase;
    public function test_homepage_shows_profile_details_and_local_media(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('13,000')
            ->assertSee('₹399')
            ->assertSee('25 exclusive plots.')
            ->assertSee('All infrastructure is proposed')
            ->assertSee('Box cricket arena')
            ->assertSee('images/project/layout-plan.webp')
            ->assertDontSee('119 per sqft')
            ->assertDontSee('45 minutes from city center')
            ->assertDontSee('storage/vedio');
    }

    public function test_brochure_route_downloads_the_new_profile(): void
    {
        $response = $this->get('/download-brochure');

        $response->assertOk()->assertDownload('Foothills-of-Mahabaleshwar-Project-Profile.pdf');
        $this->assertSame(
            realpath(public_path('pdf/Brochure.pdf')),
            $response->baseResponse->getFile()->getRealPath()
        );
    }

    public function test_valid_enquiry_opens_whatsapp_with_encoded_details(): void
    {
        $response = $this->post('/site-visit', [
            'full_name' => 'Test Visitor',
            'phone' => '+91 98765 43210',
            'email' => 'visitor@example.com',
            'message' => 'Saturday visit & plot details?',
        ]);

        $response->assertStatus(303);
        $location = $response->headers->get('Location');
        $this->assertStringStartsWith('https://wa.me/919326216153?text=', $location);
        parse_str(parse_url($location, PHP_URL_QUERY), $query);
        $this->assertStringContainsString('Name: Test Visitor', $query['text']);
        $this->assertStringContainsString('Saturday visit & plot details?', $query['text']);
        $this->assertStringContainsString('Email: visitor@example.com', $query['text']);
    }

    public function test_enquiry_requires_name_and_a_real_phone_number(): void
    {
        $this->from('/')->post('/site-visit', [
            'full_name' => '', 'phone' => '----------', 'email' => 'invalid',
        ])->assertRedirect('/')->assertSessionHasErrors(['full_name', 'phone', 'email']);
    }

    public function test_optional_enquiry_fields_can_be_omitted(): void
    {
        $this->post('/site-visit', [
            'full_name' => 'Test Visitor', 'phone' => '9876543210',
        ])->assertStatus(303)->assertSessionHasNoErrors();
    }

    public function test_optional_attachment_is_stored_privately_and_shared_with_a_signed_link(): void
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->image('reference.png');
        $response = $this->post('/site-visit', [
            'full_name' => 'Test Visitor', 'phone' => '9876543210', 'attachment' => $file,
        ])->assertStatus(303)->assertSessionHasNoErrors();

        Storage::disk('local')->assertExists('enquiry-attachments/'.$file->hashName());
        parse_str(parse_url($response->headers->get('Location'), PHP_URL_QUERY), $query);
        $this->assertMatchesRegularExpression('/Attachment .*: https?:\/\//', $query['text']);
        $link = substr($query['text'], strrpos($query['text'], ': http') + 2);
        $this->get($link)->assertOk()->assertDownload('enquiry-attachment.png');
        $this->get(strtok($link, '?'))->assertForbidden();
        $this->travel(8)->days();
        $this->get($link)->assertForbidden();
        $this->travelBack();
    }

    public function test_attachment_rejects_unsupported_files_and_oversized_images(): void
    {
        Storage::fake('local');
        foreach ([UploadedFile::fake()->create('script.php', 1, 'text/x-php'), UploadedFile::fake()->image('large.png')->size(2049)] as $file) {
            $this->from('/')->post('/site-visit', [
                'full_name' => 'Test Visitor', 'phone' => '9876543210', 'attachment' => $file,
            ])->assertRedirect('/')->assertSessionHasErrors('attachment');
        }
        $this->assertSame([], Storage::disk('local')->allFiles());
    }

    public function test_land_registration_stores_each_document_and_labels_its_signed_link(): void
    {
        Storage::fake('local');
        $documents = [];
        foreach (config('project.land_documents') as $key => $label) {
            $documents[$key] = UploadedFile::fake()->create($key.'.pdf', 30, 'application/pdf');
        }
        $response = $this->post('/site-visit', [
            'enquiry_type' => 'land_registration',
            'full_name' => 'Land Owner', 'phone' => '9876543210',
            'land_location' => 'Poladpur, Raigad', 'survey_number' => '42/1',
            'documents' => $documents,
        ])->assertStatus(303)->assertSessionHasNoErrors();

        parse_str(parse_url($response->headers->get('Location'), PHP_URL_QUERY), $query);
        $this->assertStringContainsString('register my land', $query['text']);
        $this->assertStringContainsString('Land location: Poladpur, Raigad', $query['text']);
        $this->assertStringContainsString('Survey / Gat number: 42/1', $query['text']);
        $this->assertCount(10, Storage::disk('local')->allFiles('enquiry-attachments'));
        foreach ($documents as $key => $file) {
            Storage::disk('local')->assertExists('enquiry-attachments/'.$file->hashName());
            $prefix = config('project.land_documents.'.$key).' (download link valid for 7 days): ';
            $line = collect(explode("\n", $query['text']))->first(fn ($line) => str_starts_with($line, $prefix));
            $this->assertNotNull($line);
            $link = substr($line, strlen($prefix));
            $this->get($link)->assertOk()->assertDownload('enquiry-attachment.pdf');
            $this->get(strtok($link, '?'))->assertForbidden();
        }
    }

    public function test_land_location_is_required_but_documents_are_optional(): void
    {
        $details = ['enquiry_type' => 'land_registration', 'full_name' => 'Land Owner', 'phone' => '9876543210'];
        $this->from('/')->post('/site-visit', $details)
            ->assertRedirect('/')->assertSessionHasErrors('land_location');
        $this->post('/site-visit', $details + ['land_location' => 'Poladpur'])
            ->assertStatus(303)->assertSessionHasNoErrors();
    }

    public function test_land_documents_reject_invalid_files_and_excessive_combined_size_before_storage(): void
    {
        Storage::fake('local');
        $details = ['enquiry_type' => 'land_registration', 'full_name' => 'Land Owner', 'phone' => '9876543210', 'land_location' => 'Poladpur'];
        foreach ([UploadedFile::fake()->create('script.php', 1, 'text/x-php'), UploadedFile::fake()->create('large.pdf', 2049, 'application/pdf')] as $file) {
            $this->from('/')->post('/site-visit', $details + ['documents' => ['satbara' => $file]])
                ->assertRedirect('/')->assertSessionHasErrors('documents.satbara');
        }
        $documents = [];
        foreach (['satbara', 'eight_a', 'mutation', 'sale_deed'] as $key) {
            $documents[$key] = UploadedFile::fake()->create($key.'.pdf', 1800, 'application/pdf');
        }
        $this->from('/')->post('/site-visit', $details + ['documents' => $documents])
            ->assertRedirect('/')->assertSessionHasErrors('documents');
        $this->assertSame([], Storage::disk('local')->allFiles());
    }

    public function test_site_visit_ignores_land_fields_and_unknown_document_categories_are_rejected(): void
    {
        Storage::fake('local');
        $details = ['full_name' => 'Visitor', 'phone' => '9876543210'];
        $this->post('/site-visit', $details + [
            'enquiry_type' => 'site_visit',
            'documents' => ['satbara' => UploadedFile::fake()->create('satbara.pdf', 10, 'application/pdf')],
        ])->assertStatus(303);
        $this->assertSame([], Storage::disk('local')->allFiles());
        $this->from('/')->post('/site-visit', $details + [
            'enquiry_type' => 'land_registration', 'land_location' => 'Poladpur',
            'documents' => ['unknown' => UploadedFile::fake()->create('extra.pdf', 10, 'application/pdf')],
        ])->assertRedirect('/')->assertSessionHasErrors('documents');
        $this->assertSame([], Storage::disk('local')->allFiles());
    }
}
