<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class redirectAdmin
{
  
    public function handle(Request $request, Closure $next , $guard = null): Response
    {
        
            return redirect()->route('admin.dashboard');
        

        return $next($request);
    }
}