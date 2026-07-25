<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request;
class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) return redirect('/login');
        $userRoles = auth()->user()->roles ? auth()->user()->roles->pluck('slug')->toArray() : [];
        $allowed = ['super_admin','management','branch_manager','accounts','marketing','rider','customer'];
        foreach ($allowed as $r) {
            if (in_array($r, $userRoles) && in_array($r, $roles)) return $next($request);
        }
        abort(403, 'Access denied for this role.');
    }
}
