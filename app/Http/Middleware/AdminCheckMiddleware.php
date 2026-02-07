<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. User -> provera u bazi da li je admin
        // 2. User -> da li je korisniku upisano da li je admin (if)

        $role = Auth::user()->role; // uzmi podatke usera i daj mi user role
        
        if($role != 'admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
