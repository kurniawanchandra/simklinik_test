<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,string $role): Response
    {
        // Cek apakah pengguna terautentikasi dan memiliki role yang sesuai
        if (Auth::check() && Auth::user()->role_type === $role) {
            return $next($request);
        }else{
            
            notyf()->warning('You do not have access to this page.');
            return redirect()->route('dashboard');
        }

        // Jika tidak, redirect atau tampilkan pesan error
        
    }
}
