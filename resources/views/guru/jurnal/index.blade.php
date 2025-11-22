<!-- resources/views/guru/jurnal/index.blade.php -->
@extends('layouts.app')

@section('title', 'Jurnal Mengajar Saya')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary-red">📓 Jurnal Mengajar Saya</h2>
            <a href="{{ route('jurnal.create') }}" class="btn btn-primary-red">
                ➕ Tambah Jurnal Baru
            </a>
        </div>
    </div>
</div>

@if($jurnals->count() > 0)
    <div class="row">
        @foreach($jurnals as $jurnal)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border-primary-red shadow-sm">
                <div class="card-header card-header-red">
                    <h6 class="mb-0 text-white">{{ $jurnal->mata_pelajaran }}</h6>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <strong>Tanggal:</strong> {{ $jurnal->tanggal->format('d/m/Y') }}<br>
                        <strong>Materi:</strong> 
                        <span class="text-muted">
                            {{ Str::limit($jurnal->materi_pelajaran, 100) }}
                        </span><br>
                        <strong>Kehadiran:</strong> {{ $jurnal->kehadiran_siswa }} siswa<br>
                        @if($jurnal->catatan_khusus)
                        <strong>Catatan:</strong> 
                        <span class="text-muted">
                            {{ Str::limit($jurnal->catatan_khusus, 80) }}
                        </span>
                        @endif
                    </p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex gap-2">
                        <a href="{{ route('jurnal.edit', $jurnal->id) }}" 
                           class="btn btn-outline-primary btn-sm btn-action">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('jurnal.destroy', $jurnal->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm btn-action"
                                    onclick="return confirm('Hapus jurnal ini?')">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
    <div class="row">
        <div class="col-12">
            <div class="card text-center py-5">
                <div class="card-body">
                    <i class="fas fa-book fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum Ada Jurnal</h4>
                    <p class="text-muted">Mulai dengan menambahkan jurnal mengajar pertama Anda.</p>
                    <a href="{{ route('jurnal.create') }}" class="btn btn-primary-red btn-lg">
                        ➕ Buat Jurnal Pertama
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection