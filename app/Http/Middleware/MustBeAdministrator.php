<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $checkPermission = fn() => auth()->check() && auth()->user()->username == 'john';

        abort_unless($checkPermission(), Response::HTTP_FORBIDDEN);

        return $next($request);
    }
}
