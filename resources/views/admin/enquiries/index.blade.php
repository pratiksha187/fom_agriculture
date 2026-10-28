@extends('admin.layout')
@section('title', 'Enquiry inbox')
@section('content')
<header class="page-heading"><div><p class="eyebrow">EVERY CONVERSATION, IN ONE PLACE</p><h1>Enquiry inbox</h1><p class="muted">View form submissions, follow up with visitors and review land documents.</p></div><span class="live-label">Website submissions</span></header>
<div class="stats">
    <a href="{{ route('admin.enquiries.index') }}"><span>Total enquiries</span><strong>{{ number_format($counts['total']) }}</strong><small>All form submissions</small></a>
    <a href="{{ route('admin.enquiries.index', ['status' => 'new']) }}"><span>Awaiting follow-up</span><strong>{{ number_format($counts['new']) }}</strong><small>New enquiries</small></a>
    <a href="{{ route('admin.enquiries.index', ['type' => 'site_visit']) }}"><span>Site visits</span><strong>{{ number_format($counts['site_visit']) }}</strong><small>Visitors to the project</small></a>
    <a href="{{ route('admin.enquiries.index', ['type' => 'land_registration']) }}"><span>Land registrations</span><strong>{{ number_format($counts['land_registration']) }}</strong><small>Landowner enquiries</small></a>
</div>
<section class="panel inbox-panel" aria-label="Enquiry list">
    <form class="filters" action="{{ route('admin.enquiries.index') }}" method="get">
        <div><label for="q">Search enquiries</label><input id="q" name="q" maxlength="100" placeholder="Name, phone, email or land details" value="{{ $filters['q'] ?? '' }}"></div>
        <div><label for="type">Enquiry type</label><select id="type" name="type"><option value="">All types</option>@foreach(\App\Models\Enquiry::TYPES as $value => $label)<option value="{{ $value }}" @selected(($filters['type'] ?? '') === $value)>{{ $label }}</option>@endforeach</select></div>
        <div><label for="status">Status</label><select id="status" name="status"><option value="">All statuses</option>@foreach(\App\Models\Enquiry::STATUSES as $value => $label)<option value="{{ $value }}" @selected(($filters['status'] ?? '') === $value)>{{ $label }}</option>@endforeach</select></div>
        <button class="button" type="submit">Apply filters</button><a class="quiet-link" href="{{ route('admin.enquiries.index') }}">Reset</a>
    </form>
    <div class="list-heading"><h2>All enquiries</h2><span>{{ $enquiries->total() }} {{ $enquiries->total() === 1 ? 'result' : 'results' }} · Newest first</span></div>
    @if($enquiries->isEmpty())
        <div class="empty-state"><span class="empty-icon" aria-hidden="true">↗</span><h2>{{ count(array_filter($filters)) ? 'No matching enquiries' : 'Your inbox is ready' }}</h2><p>{{ count(array_filter($filters)) ? 'Try another search or reset the filters.' : 'New enquiries will appear here when someone submits the website form.' }}</p></div>
    @else
        <div class="table-scroll" tabindex="0" role="region" aria-label="Enquiries table; scroll horizontally on small screens">
            <table><thead><tr><th scope="col">Name &amp; contact</th><th scope="col">Enquiry type</th><th scope="col">Received</th><th scope="col">Documents</th><th scope="col">Status</th><th scope="col"><span class="sr-only">Open enquiry</span></th></tr></thead>
                <tbody>@foreach($enquiries as $enquiry)<tr>
                    <td><a class="person-name" href="{{ route('admin.enquiries.show', $enquiry) }}">{{ $enquiry->full_name }}</a><span class="cell-secondary">{{ $enquiry->phone }}</span></td>
                    <td><span class="type-label">{{ \App\Models\Enquiry::TYPES[$enquiry->enquiry_type] }}</span><span class="cell-secondary">#{{ str_pad($enquiry->id, 5, '0', STR_PAD_LEFT) }}</span></td>
                    <td>{{ $enquiry->created_at->timezone('Asia/Kolkata')->format('d M Y') }}<span class="cell-secondary">{{ $enquiry->created_at->timezone('Asia/Kolkata')->format('h:i A') }}</span></td>
                    <td>{{ $enquiry->documents_count }} {{ $enquiry->documents_count === 1 ? 'file' : 'files' }}</td>
                    <td><span class="badge badge-{{ $enquiry->status }}">{{ \App\Models\Enquiry::STATUSES[$enquiry->status] }}</span></td>
                    <td><a class="row-link" href="{{ route('admin.enquiries.show', $enquiry) }}" aria-label="View enquiry from {{ $enquiry->full_name }}">View ↗</a></td>
                </tr>@endforeach</tbody>
            </table>
        </div>
        <nav class="pagination" aria-label="Enquiry pages"><span>Showing {{ $enquiries->firstItem() }}–{{ $enquiries->lastItem() }} of {{ $enquiries->total() }}</span><div>@if($enquiries->previousPageUrl())<a href="{{ $enquiries->previousPageUrl() }}" rel="prev">← Previous</a>@endif<span>Page {{ $enquiries->currentPage() }} of {{ $enquiries->lastPage() }}</span>@if($enquiries->nextPageUrl())<a href="{{ $enquiries->nextPageUrl() }}" rel="next">Next →</a>@endif</div></nav>
    @endif
</section>
@endsection
