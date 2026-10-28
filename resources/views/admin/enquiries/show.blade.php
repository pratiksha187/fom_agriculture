@extends('admin.layout')
@section('title', 'Enquiry #'.$enquiry->id)
@section('content')
<a class="back-link" href="{{ route('admin.enquiries.index') }}">← Back to enquiries</a>
<header class="page-heading"><div><p class="eyebrow">ENQUIRY #{{ str_pad($enquiry->id, 5, '0', STR_PAD_LEFT) }}</p><h1>{{ $enquiry->full_name }}</h1><p class="muted">{{ \App\Models\Enquiry::TYPES[$enquiry->enquiry_type] }} · Received {{ $enquiry->created_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }} IST</p></div><span class="badge badge-{{ $enquiry->status }}">{{ \App\Models\Enquiry::STATUSES[$enquiry->status] }}</span></header>
<div class="detail-grid">
    <div class="detail-main">
        <section class="panel detail-panel"><h2>Contact &amp; enquiry details</h2><dl class="details-list">
            <div><dt>Full name</dt><dd>{{ $enquiry->full_name }}</dd></div>
            <div><dt>Phone number</dt><dd><a href="tel:{{ preg_replace('/[^+0-9]/', '', $enquiry->phone) }}">{{ $enquiry->phone }} ↗</a></dd></div>
            <div><dt>Email address</dt><dd>@if($enquiry->email)<a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }} ↗</a>@else<span class="muted">Not provided</span>@endif</dd></div>
            <div><dt>Enquiry type</dt><dd>{{ \App\Models\Enquiry::TYPES[$enquiry->enquiry_type] }}</dd></div>
            @if($enquiry->enquiry_type === 'land_registration')<div><dt>Land location</dt><dd>{{ $enquiry->land_location }}</dd></div><div><dt>Survey / Gat number</dt><dd>{{ $enquiry->survey_number ?: 'Not provided' }}</dd></div>@endif
        </dl><div class="message-block"><h3>Message / requirements</h3><p>{{ $enquiry->message ?: 'No message provided.' }}</p></div></section>
        <section class="panel detail-panel"><div class="document-heading"><h2>Uploaded documents</h2><span>{{ $enquiry->documents->count() }} {{ $enquiry->documents->count() === 1 ? 'file' : 'files' }}</span></div>
            @forelse($enquiry->documents as $document)
                <article class="document-row"><div><h3>{{ $document->label }}</h3><p>{{ $document->original_name }} <span>· {{ number_format($document->size / 1024, 1) }} KB</span></p></div><a class="button button-outline" href="{{ route('admin.documents.download', [$enquiry, $document]) }}">Download ↓</a></article>
            @empty<p class="muted">No documents were uploaded with this enquiry.</p>@endforelse
        </section>
    </div>
    <aside class="panel status-panel"><p class="eyebrow">FOLLOW-UP</p><h2>Enquiry status</h2><p class="muted">Keep track of your conversation with this visitor.</p><form class="stack" action="{{ route('admin.enquiries.update', $enquiry) }}" method="post">@csrf @method('PATCH')<div><label for="status">Status</label><select id="status" name="status">@foreach(\App\Models\Enquiry::STATUSES as $value => $label)<option value="{{ $value }}" @selected(old('status', $enquiry->status) === $value)>{{ $label }}</option>@endforeach</select></div><button class="button" type="submit">Save status ↗</button></form><p class="status-note">This records the website submission. WhatsApp delivery and site-visit confirmation are handled separately.</p></aside>
</div>
@endsection
