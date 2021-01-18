<?php

namespace Marketplaceful\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserLastSeenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard()->check()) {
            return $next($request);
        }

        if (is_null(Auth::user()->last_seen_at)) {
            $this->markAsSeenNow();
        }

        if (Auth::user()->last_seen_at->diffInHours(now()) > 1) {
            $this->markAsSeenNow();
        }

        return $next($request);
    }

    private function markAsSeenNow()
    {
        Auth::user()->forceFill([
            'last_seen_at' => now(),
        ])->save();
    }
}
