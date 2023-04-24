<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class ApiLoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $requestId = Uuid::getFactory()->uuid4();
        Log::channel('api')->info($requestId . ': Incoming Request', [
            'uri' => $request->getUri(),
            'method' => $request->getMethod(),
            'params' => $request->toArray(),
            'body' => $request->getContent(),
        ]);

        $response = $next($request);

        $method = $response->isSuccessful() || $response->isRedirection() ? 'info' : 'error';

        Log::channel('api')->{$method}($requestId . ': Response', [
            'status' => $response->getStatusCode(),
            'body' => $response->getContent(),
        ]);

        return $response;
    }
}
