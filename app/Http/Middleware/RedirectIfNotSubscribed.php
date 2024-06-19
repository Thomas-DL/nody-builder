<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!$request->user()?->subscription(config('cashier.product')) && !$request->user()?->lifeTimeSubscribed()) {
            return redirect()->route('filament.user.pages.dashboard');
        }

        return $next($request);
    }
}
