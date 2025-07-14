<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        echo '<h3 style="color:green">We are now in ValidUser middleware</h3>';
        echo '<h3 style="color:red">Role:' . $role . '</h3>';
        return $next($request);

        if (Auth::user()->role == $role) {
            return $next($request);
        }
        elseif (Auth::user()->role == "client"){
            return redirect()->route('addcustomer');
        }
    }}
