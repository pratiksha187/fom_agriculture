@extends('admin.layout')
@section('title', 'Channel partners')
@section('content')
<header class="page-heading"><div><p class="eyebrow">PARTNER NETWORK</p><h1>Channel partners</h1><p class="muted">Registration details submitted through the website.</p></div><span class="live-label">{{ $partners->total() }} registrations</span></header>
<div class="stats partner-stats">
    @foreach(['total' => ['All partners', 'Registered with Foothills'], 'pending' => ['Awaiting approval', 'Review new registrations'], 'approved' => ['Approved partners', 'Access to the partner portal'], 'suspended' => ['Suspended', 'Portal access paused']] as $key => [$label, $hint])
        <a class="stat-{{ $key }}" href="{{ route('admin.partners.index', $key === 'total' ? [] : ['status' => $key]) }}"><span>{{ $label }}</span><strong>{{ number_format($counts[$key]) }}</strong><small>{{ $hint }}</small></a>
    @endforeach
</div>
<section class="panel inbox-panel" aria-label="Channel partner registrations">
    <form class="filters partner-filters" method="get" action="{{ route('admin.partners.index') }}">
        <div><label for="partner-search">Find a partner</label><input id="partner-search" name="q" type="search" maxlength="100" value="{{ $filters['q'] ?? '' }}" placeholder="Name, email, mobile, agency or city"></div>
        <div><label for="partner-status">Account status</label><select id="partner-status" name="status"><option value="">All statuses</option>@foreach(\App\Models\ChannelPartner::STATUSES as $value => $label)<option value="{{ $value }}" @selected(($filters['status'] ?? '') === $value)>{{ $label }}</option>@endforeach</select></div>
        <button class="button" type="submit">Search partners</button><a class="quiet-link" href="{{ route('admin.partners.index') }}">Reset</a>
    </form>
    <div class="list-heading"><h2>Partner registrations</h2><span>{{ $partners->total() }} results &middot; Newest first</span></div>
    @if($partners->isEmpty())<div class="empty-state"><span class="empty-icon" aria-hidden="true">@include('partners.icon', ['name' => 'people'])</span><h2>{{ array_filter($filters) ? 'No matching partners' : 'No partner registrations yet' }}</h2><p>{{ array_filter($filters) ? 'Try a different search or reset your filters.' : 'New registrations will appear here.' }}</p></div>
    @else
    <div class="table-scroll" tabindex="0" role="region" aria-label="Partner list"><table><thead><tr><th scope="col">Partner</th><th scope="col">Contact</th><th scope="col">Location / Experience</th><th scope="col">Registered</th><th scope="col">Account status</th><th scope="col"><span class="sr-only">Manage partner</span></th></tr></thead><tbody>
    @foreach($partners as $partner)
        <tr>
            <td><a class="person-name" href="{{ route('admin.partners.show', $partner) }}">{{ $partner->user?->name ?? 'User account unavailable' }}</a><span class="cell-secondary">{{ $partner->partner_code }} &middot; {{ \App\Models\ChannelPartner::TYPES[$partner->partner_type] ?? 'Not available' }}</span>@if($partner->agency_name)<span class="cell-secondary">{{ $partner->agency_name }}</span>@endif</td>
            <td>@if($partner->user?->email)<a href="mailto:{{ $partner->user->email }}">{{ $partner->user->email }}</a>@else<span class="muted">Email unavailable</span>@endif<a class="cell-secondary" href="tel:{{ $partner->mobile }}">{{ $partner->mobile }}</a></td>
            <td>{{ $partner->city }}<span class="cell-secondary">{{ \App\Models\ChannelPartner::EXPERIENCE[$partner->experience] ?? 'Not available' }}</span></td>
            <td>{{ $partner->created_at?->timezone('Asia/Kolkata')->format('d M Y') ?? 'Not available' }}<span class="cell-secondary">{{ $partner->created_at?->timezone('Asia/Kolkata')->format('h:i A') }}</span></td>
            <td><span class="badge badge-{{ $partner->status }}">{{ \App\Models\ChannelPartner::STATUSES[$partner->status] ?? 'Not available' }}</span></td>
            <td><a class="row-link" href="{{ route('admin.partners.show', $partner) }}">Manage &rarr;</a></td>
        </tr>
    @endforeach
    </tbody></table></div>
    <nav class="pagination" aria-label="Partner pages"><span>Showing {{ $partners->firstItem() }}&ndash;{{ $partners->lastItem() }} of {{ $partners->total() }}</span><div>@if($partners->previousPageUrl())<a href="{{ $partners->previousPageUrl() }}" rel="prev">&larr; Previous</a>@endif<span>Page {{ $partners->currentPage() }} of {{ $partners->lastPage() }}</span>@if($partners->nextPageUrl())<a href="{{ $partners->nextPageUrl() }}" rel="next">Next &rarr;</a>@endif</div></nav>
    @endif
</section>
@endsection
