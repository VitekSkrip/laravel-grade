<?php

namespace App\Http\Middleware;

use App\Contracts\Services\RolesServiceContract;
use Closure;
use Illuminate\Http\Request;

class ManagerMiddleware
{
    public function __construct(private readonly RolesServiceContract $rolesService)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user() || ! $this->rolesService->userIsManager($request->user()->id)) {
            return abort(403);
        }

        return $next($request);
    }
}
