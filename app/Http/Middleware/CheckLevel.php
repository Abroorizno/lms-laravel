<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        if (!auth()->Auth::check()) {
            return redirect('/login');
        }

        if (!in_array(auth()->Auth::user()->level, $levels)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
