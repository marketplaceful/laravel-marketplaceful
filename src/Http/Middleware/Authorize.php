<?php

namespace Marketplaceful\Http\Middleware;

use Illuminate\Support\Facades\Gate;

class Authorize
{
    public function handle($request, $next)
    {
        if (! Gate::check('viewMarketplaceful', [$request->user()])) {
            abort(403);
        }

        return $next($request);
    }
}
