<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class SiteVisitController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $details = $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'regex:/^\+?(?=(?:[ ()-]*[0-9]){10,15}[ ()-]*$)[0-9 ()-]{10,24}$/'],
            'email' => ['nullable', 'email', 'max:254'],
            'message' => ['nullable', 'string', 'max:1500'],
            'attachment' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ]);

        $message = "Hello, I would like to arrange a site visit to Foothills of Mahabaleshwar.\n"
            ."Name: {$details['full_name']}\nPhone: {$details['phone']}";

        if (! empty($details['email'])) {
            $message .= "\nEmail: {$details['email']}";
        }

        if (! empty($details['message'])) {
            $message .= "\nRequirements: {$details['message']}";
        }

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('enquiry-attachments', 'local');
            if ($path === false) {
                return back()->withInput($request->except('attachment'))->withErrors([
                    'attachment' => 'The file could not be uploaded. Please try again or continue without a file.',
                ]);
            }

            $link = URL::temporarySignedRoute('enquiry-attachment', now()->addDays(7), [
                'file' => basename($path),
            ]);
            $message .= "\nAttachment (download link valid for 7 days): {$link}";
        }

        // Visitors review and send in WhatsApp; this does not confirm a booking.
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
