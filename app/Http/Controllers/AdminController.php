<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $pendingUsers = User::where('status', 'pending')->where('role', 'guru')->get();
        $approvedUsers = User::where('status', 'approved')->where('role', 'guru')->get();
        
        return view('admin.dashboard', compact('pendingUsers', 'approvedUsers'));
    }

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'approved']);
        
        return redirect()->back()->with('success', 'User berhasil disetujui.');
    }

    public function rejectUser(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:500'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'status' => 'rejected',
            'alasan_penolakan' => $request->alasan_penolakan
        ]);

        return redirect()->back()->with('success', 'User berhasil ditolak.');
    }
}