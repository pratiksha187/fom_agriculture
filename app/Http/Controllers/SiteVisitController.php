<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class SiteVisitController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $documentLabels = config('project.land_documents');
        $rules = [
            'enquiry_type' => ['nullable', 'in:site_visit,land_registration'],
            'full_name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'regex:/^\+?(?=(?:[ ()-]*[0-9]){10,15}[ ()-]*$)[0-9 ()-]{10,24}$/'],
            'email' => ['nullable', 'email', 'max:254'],
            'message' => ['nullable', 'string', 'max:1500'],
            'attachment' => ['exclude_if:enquiry_type,land_registration', 'nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
            'land_location' => ['exclude_unless:enquiry_type,land_registration', 'required', 'string', 'max:250'],
            'survey_number' => ['exclude_unless:enquiry_type,land_registration', 'nullable', 'string', 'max:100'],
            'documents' => ['exclude_unless:enquiry_type,land_registration', 'nullable', 'array:'.implode(',', array_keys($documentLabels))],
        ];
        $attributes = [];
        foreach ($documentLabels as $key => $label) {
            $rules['documents.'.$key] = ['exclude_unless:enquiry_type,land_registration', 'nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'];
            $attributes['documents.'.$key] = $label;
        }
        $details = $request->validate($rules, [], $attributes);
        $isLandRegistration = ($details['enquiry_type'] ?? 'site_visit') === 'land_registration';
        $uploads = [];
        if ($isLandRegistration) {
            foreach ($details['documents'] ?? [] as $key => $file) {
                if ($file !== null) {
                    $uploads['documents.'.$key] = [$file, $documentLabels[$key]];
                }
            }
        } elseif (! empty($details['attachment'])) {
            $uploads['attachment'] = [$details['attachment'], 'Attachment'];
        }
        $totalBytes = array_sum(array_map(fn ($upload) => $upload[0]->getSize(), $uploads));
        if ($totalBytes > 6 * 1024 * 1024) {
            return back()->withInput($request->except(['attachment', 'documents']))->withErrors([
                'documents' => 'Please keep the combined document size within 6 MB.',
            ]);
        }

        $message = ($isLandRegistration
            ? "Hello, I would like to register my land with the Foothills of Mahabaleshwar team.\n"
            : "Hello, I would like to arrange a site visit to Foothills of Mahabaleshwar.\n")
            ."Name: {$details['full_name']}\nPhone: {$details['phone']}";

        if ($isLandRegistration) {
            $message .= "\nLand location: {$details['land_location']}";
            if (! empty($details['survey_number'])) {
                $message .= "\nSurvey / Gat number: {$details['survey_number']}";
            }
        }
        if (! empty($details['email'])) {
            $message .= "\nEmail: {$details['email']}";
        }

        if (! empty($details['message'])) {
            $message .= "\nRequirements: {$details['message']}";
        }

        $storedPaths = [];
        $documents = [];
        try {
            foreach ($uploads as $field => [$file, $label]) {
                $path = $file->store('enquiry-attachments', 'local');
                if ($path === false) {
                    Storage::disk('local')->delete($storedPaths);

                    return back()->withInput($request->except(['attachment', 'documents']))->withErrors([
                        $field => 'The file could not be uploaded. Please select your documents and try again.',
                    ]);
                }
                $storedPaths[] = $path;
                $documents[] = [
                    'category' => str_replace('documents.', '', $field),
                    'label' => $label,
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                ];

                $link = URL::temporarySignedRoute('enquiry-attachment', now()->addDays(7), [
                    'file' => basename($path),
                ]);
                $message .= "\n{$label} (download link valid for 7 days): {$link}";
            }

            DB::transaction(function () use ($details, $isLandRegistration, $documents) {
                $enquiry = Enquiry::create([
                    'enquiry_type' => $isLandRegistration ? 'land_registration' : 'site_visit',
                    'full_name' => $details['full_name'],
                    'phone' => $details['phone'],
                    'email' => $details['email'] ?? null,
                    'message' => $details['message'] ?? null,
                    'land_location' => $details['land_location'] ?? null,
                    'survey_number' => $details['survey_number'] ?? null,
                ]);
                $enquiry->documents()->createMany($documents);
            });
        } catch (\Throwable $exception) {
            Storage::disk('local')->delete($storedPaths);
            report($exception);

            return back()->withInput($request->except(['attachment', 'documents']))->withErrors([
                'enquiry' => 'We could not save your enquiry. Please select any files again and try once more, or call our team.',
            ]);
        }

        // The enquiry is saved before visitors review and send in WhatsApp.
        return redirect()->away(
            'https://wa.me/91'.config('project.phones.0').'?text='.rawurlencode($message),
            303
        );
    }

    public function attachment(string $file)
    {
        $path = 'enquiry-attachments/'.$file;
        abort_unless(Storage::disk('local')->exists($path), 404);

        return Storage::disk('local')->download($path, 'enquiry-attachment.'.pathinfo($file, PATHINFO_EXTENSION), [
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'private, no-store',
        ]);
    }
}
