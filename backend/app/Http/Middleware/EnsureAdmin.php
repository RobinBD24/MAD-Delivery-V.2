<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->email) {
            // For demo, allow any logged in user to access admin
            // In production, check auth()->user()->is_admin
            return redirect('/login');
        }
        return $next($request);
    }
}
