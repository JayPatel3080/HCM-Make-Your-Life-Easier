<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role === 'patient') {
            return redirect('/patient');
        } elseif (auth()->user()->role === 'doctor') {
            return redirect('/doctor');
        } elseif (auth()->user()->role === 'staff') {
            return redirect('/staf');
        } else {
            // Handle other roles or set a default redirect
            return redirect('/admin');
        }
        return $next($request);
    }
}
