<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\EnquiryDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'type' => ['nullable', Rule::in(array_keys(Enquiry::TYPES))],
            'status' => ['nullable', Rule::in(array_keys(Enquiry::STATUSES))],
        ]);
        $query = Enquiry::query()->withCount('documents');
        if (! empty($filters['q'])) {
            $term = '%'.$filters['q'].'%';
            $query->where(function ($query) use ($term) {
                foreach (['full_name', 'phone', 'email', 'land_location', 'survey_number'] as $field) {
                    $query->orWhere($field, 'like', $term);
                }
            });
        }
        if (! empty($filters['type'])) {
            $query->where('enquiry_type', $filters['type']);
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return view('admin.enquiries.index', [
            'enquiries' => $query->latest()->latest('id')->paginate(20)->withQueryString(),
            'filters' => $filters,
            'counts' => [
                'total' => Enquiry::count(),
                'new' => Enquiry::where('status', 'new')->count(),
                'site_visit' => Enquiry::where('enquiry_type', 'site_visit')->count(),
                'land_registration' => Enquiry::where('enquiry_type', 'land_registration')->count(),
            ],
        ]);
    }

    public function show(Enquiry $enquiry)
    {
        return view('admin.enquiries.show', ['enquiry' => $enquiry->load('documents')]);
    }

    public function update(Request $request, Enquiry $enquiry)
    {
        $details = $request->validate(['status' => ['required', Rule::in(array_keys(Enquiry::STATUSES))]]);
        $enquiry->status = $details['status'];
        $enquiry->save();

        return back()->with('success', 'Enquiry status updated.');
    }

    public function download(Enquiry $enquiry, EnquiryDocument $document)
    {
        abort_unless($document->enquiry_id === $enquiry->id, 404);
        abort_unless(Storage::disk('local')->exists($document->path), 404);

        return Storage::disk('local')->download($document->path, 'enquiry-'.$enquiry->id.'-'.$document->category.'.'.pathinfo($document->path, PATHINFO_EXTENSION), [
            'X-Content-Type-Options' => 'nosniff', 'Cache-Control' => 'private, no-store',
        ]);
    }

    public function uploadDocuments(Request $request, Enquiry $enquiry)
    {
        $labels = config('project.land_documents');
        $rules = ['documents' => ['required', 'array:'.implode(',', array_keys($labels))]];
        $attributes = [];
        foreach ($labels as $key => $label) {
            $rules['documents.'.$key] = ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'];
            $attributes['documents.'.$key] = $label;
        }
        $details = $request->validate($rules, [
            'documents.required' => 'Select at least one document to upload.',
        ], $attributes);
        $files = array_filter($details['documents']);
        $redirect = redirect()->to(route('admin.enquiries.show', $enquiry).'#admin-document-upload');
        if ($files === []) {
            return $redirect->withErrors(['documents' => 'Select at least one document to upload.']);
        }
        if (array_sum(array_map(fn ($file) => $file->getSize(), $files)) > 6 * 1024 * 1024) {
            return $redirect->withErrors(['documents' => 'Please keep the combined document size within 6 MB per upload.']);
        }

        $storedPaths = [];
        try {
            $documents = [];
            foreach ($files as $key => $file) {
                $path = $file->store('enquiry-attachments', 'local');
                if ($path === false) {
                    throw new \RuntimeException('An admin enquiry document could not be stored.');
                }
                $storedPaths[] = $path;
                $documents[] = [
                    'category' => $key,
                    'label' => $labels[$key],
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                ];
            }
            DB::transaction(fn () => $enquiry->documents()->createMany($documents));
        } catch (\Throwable $exception) {
            Storage::disk('local')->delete($storedPaths);
            report($exception);

            return $redirect->withErrors(['documents' => 'The documents could not be saved. Please select your files again and retry.']);
        }

        $count = count($documents);

        return redirect()->route('admin.enquiries.show', $enquiry)
            ->with('success', $count.' '.($count === 1 ? 'document added' : 'documents added').' to this enquiry.');
    }
}
