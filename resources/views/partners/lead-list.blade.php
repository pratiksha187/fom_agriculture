<form class="crm-search" method="get" action="{{ request()->url() }}"><label class="crm-sr-only" for="lead-search">Search buyer name, city or Lead ID</label><input id="lead-search" name="q" type="search" value="{{ request('q') }}" maxlength="100" placeholder="Search buyer name, city or Lead ID"><input name="status" type="hidden" value="{{ request('status', 'all') }}"><button type="submit">Search</button></form>
<nav class="crm-filters" aria-label="Filter buyer leads">
    @foreach(['all' => 'All'] + \App\Models\PartnerLead::PROGRESS_STATUSES + ['missed' => 'No Show'] as $value => $label)
        <a href="{{ request()->url().'?'.http_build_query(array_filter(['q' => request('q'), 'status' => $value])) }}" @if(request('status', 'all') === $value) aria-current="true" @endif>{{ $label }}</a>
    @endforeach
</nav>
<div class="crm-records">
@forelse($leads as $lead)
    <article class="crm-lead-row"><div><h3>{{ $lead->buyer_name }}</h3><p>{{ $lead->lead_code }} @if($lead->city)&middot; {{ $lead->city }}@endif</p></div><div class="crm-row-status"><span class="crm-badge badge-{{ $lead->pipeline_status }}">{{ $lead->pipeline_label }}</span><small>{{ $lead->latestVisit ? 'Visit: '.$lead->latestVisit->scheduled_at->timezone('Asia/Kolkata')->format('d M Y, h:i A').' IST' : 'Visit not scheduled' }}</small><a class="crm-detail-link" href="{{ route('partners.leads.show', $lead) }}">Update Status &amp; Details &rsaquo;</a></div></article>
@empty <div class="crm-empty"><h3>{{ request('q') || request('status', 'all') !== 'all' ? 'No matching buyer leads' : 'No buyer leads yet' }}</h3><p>{{ request('q') || request('status', 'all') !== 'all' ? 'Try a different search or choose All.' : 'Select Add Lead to submit your first buyer enquiry.' }}</p></div>@endforelse
</div>
{{ $leads->links() }}
