<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo '<h3 style="color:green">We are now in ValidUser middleware</h3>';
        return $next($request);

        if (Auth::check()) {
            return $next($request);
        }
        else {
            return redirect()->route('login');
        }
    }
}
