<?php
// app/Http/Controllers/JurnalController.php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('approved');
    }

    public function index()
    {
        $jurnals = Jurnal::where('user_id', Auth::id())->latest()->get();
        return view('guru.jurnal.index', compact('jurnals'));
    }

    public function create()
    {
        return view('guru.jurnal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'mata_pelajaran' => 'required|string|max:255',
            'materi_pelajaran' => 'required|string',
            'kehadiran_siswa' => 'required|integer|min:0',
            'catatan_khusus' => 'nullable|string'
        ]);

        Jurnal::create([
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'mata_pelajaran' => $request->mata_pelajaran,
            'materi_pelajaran' => $request->materi_pelajaran,
            'kehadiran_siswa' => $request->kehadiran_siswa,
            'catatan_khusus' => $request->catatan_khusus,
            'status' => 'draft'
        ]);

        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jurnal = Jurnal::where('user_id', Auth::id())->findOrFail($id);
        return view('guru.jurnal.edit', compact('jurnal'));
    }

    public function update(Request $request, $id)
    {
        $jurnal = Jurnal::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'mata_pelajaran' => 'required|string|max:255',
            'materi_pelajaran' => 'required|string',
            'kehadiran_siswa' => 'required|integer|min:0',
            'catatan_khusus' => 'nullable|string'
        ]);

        $jurnal->update([
            'tanggal' => $request->tanggal,
            'mata_pelajaran' => $request->mata_pelajaran,
            'materi_pelajaran' => $request->materi_pelajaran,
            'kehadiran_siswa' => $request->kehadiran_siswa,
            'catatan_khusus' => $request->catatan_khusus
        ]);

        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jurnal = Jurnal::where('user_id', Auth::id())->findOrFail($id);
        $jurnal->delete();

        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil dihapus.');
    }
}