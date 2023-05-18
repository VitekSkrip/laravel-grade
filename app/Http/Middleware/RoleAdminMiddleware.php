<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user()->isAdmin()) {
            abort(403);
        }
        
        return $next($request);
    }
}
