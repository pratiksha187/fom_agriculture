<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureApprovedPartner
{
    public function handle(Request $request, Closure $next)
    {
        abort_unless(! $request->user()?->is_admin && $request->user()?->channelPartner?->status === 'approved', 403, 'Your partner account needs admin approval. Please contact the Foothills team.');

        return $next($request);
    }
}
