<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->role == 'quality_inspector') {
                    return redirect(RouteServiceProvider::QUALITY_INSPECTOR);
                }

                if (Auth::user()->role == 'pic_coordinator') {
                    return redirect(RouteServiceProvider::PIC_COORDINATOR);
                }

                return redirect(RouteServiceProvider::APPLICANT);
            }
        }

        return $next($request);
    }
}
