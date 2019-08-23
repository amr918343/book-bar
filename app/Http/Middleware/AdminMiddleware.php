<?php

namespace App\Http\Middleware;

use Closure;
use function Faker\Provider\pt_BR\check_digit;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return $next($request);
            }
        }
        return abort('404', 'Page Not Found');
    }
}
