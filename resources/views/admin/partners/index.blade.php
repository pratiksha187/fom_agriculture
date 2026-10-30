@extends('admin.layout')
@section('title', 'Channel partners')
@section('content')
<header class="page-heading"><div><p class="eyebrow">PARTNER NETWORK</p><h1>Channel partners</h1><p class="muted">Registration details submitted through the website.</p></div><span class="live-label">{{ $partners->total() }} registrations</span></header>
<section class="panel inbox-panel" aria-label="Channel partner registrations">
    @if($partners->isEmpty())<div class="empty-state"><h2>No partner registrations yet</h2><p>New registrations will appear here.</p></div>
    @else
    <div class="table-scroll" tabindex="0" role="region" aria-label="Partner list"><table><thead><tr><th>Partner</th><th>Contact</th><th>Location / Experience</th><th>RERA</th><th>Registered</th><th>Account</th></tr></thead><tbody>
    @foreach($partners as $partner)
        <tr>
            <td><strong>{{ $partner->user?->name ?? 'User account unavailable' }}</strong><div>{{ \App\Models\ChannelPartner::TYPES[$partner->partner_type] ?? 'Not available' }}</div>@if($partner->agency_name)<div>{{ $partner->agency_name }}</div>@endif</td>
            <td>@if($partner->user?->email)<a href="mailto:{{ $partner->user->email }}">{{ $partner->user->email }}</a>@else<span class="muted">Email unavailable</span>@endif<div><a href="tel:{{ $partner->mobile }}">{{ $partner->mobile }}</a></div></td>
            <td>{{ $partner->city }}<div>{{ \App\Models\ChannelPartner::EXPERIENCE[$partner->experience] ?? 'Not available' }}</div></td>
            <td>{{ $partner->rera_number ?: 'Not provided' }}</td>
            <td>{{ $partner->created_at?->timezone('Asia/Kolkata')->format('d M Y, h:i A') ?? 'Not available' }}</td>
            <td>{{ \App\Models\ChannelPartner::STATUSES[$partner->status] ?? 'Not available' }}<div><a class="quiet-link" href="{{ route('admin.partners.show', $partner) }}">Review &amp; manage &rarr;</a></div></td>
        </tr>
    @endforeach
    </tbody></table></div>
    {{ $partners->links() }}
    @endif
</section>
@endsection
