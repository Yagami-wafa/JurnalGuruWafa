<?php
// app/Http/Middleware/ApprovedMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isApproved()) {
            return $next($request);
        }

        return redirect('/pending')->with('error', 'Akun Anda menunggu persetujuan admin.');
    }
}