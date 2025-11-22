<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->isGuru()) {
                if (Auth::user()->isApproved()) {
                    return redirect()->route('jurnal.index');
                } else {
                    return view('pending');
                }
            }
        }
        
        // Tampilkan welcome page untuk guest
        return view('welcome');
    }

    public function pending()
    {
        if (Auth::check() && Auth::user()->isPending()) {
            return view('pending');
        }
        
        return redirect('/');
    }
}