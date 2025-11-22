<!-- resources/views/guru/jurnal/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Jurnal')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header card-header-red">
                <h4 class="mb-0 text-white">✏️ Edit Jurnal Mengajar</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('jurnal.update', $jurnal->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Mengajar</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                                       id="tanggal" name="tanggal" 
                                       value="{{ old('tanggal', $jurnal->tanggal->format('Y-m-d')) }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                                <input type="text" class="form-control @error('mata_pelajaran') is-invalid @enderror" 
                                       id="mata_pelajaran" name="mata_pelajaran" 
                                       value="{{ old('mata_pelajaran', $jurnal->mata_pelajaran) }}" required>
                                @error('mata_pelajaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="materi_pelajaran" class="form-label">Materi Pelajaran</label>
                        <textarea class="form-control @error('materi_pelajaran') is-invalid @enderror" 
                                  id="materi_pelajaran" name="materi_pelajaran" 
                                  rows="3" required>{{ old('materi_pelajaran', $jurnal->materi_pelajaran) }}</textarea>
                        @error('materi_pelajaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kehadiran_siswa" class="form-label">Jumlah Kehadiran Siswa</label>
                                <input type="number" class="form-control @error('kehadiran_siswa') is-invalid @enderror" 
                                       id="kehadiran_siswa" name="kehadiran_siswa" 
                                       value="{{ old('kehadiran_siswa', $jurnal->kehadiran_siswa) }}" min="0" required>
                                @error('kehadiran_siswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="catatan_khusus" class="form-label">Catatan Khusus</label>
                        <textarea class="form-control @error('catatan_khusus') is-invalid @enderror" 
                                  id="catatan_khusus" name="catatan_khusus" 
                                  rows="3">{{ old('catatan_khusus', $jurnal->catatan_khusus) }}</textarea>
                        @error('catatan_khusus')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('jurnal.index') }}" class="btn btn-secondary me-md-2">Batal</a>
                        <button type="submit" class="btn btn-primary-red">Update Jurnal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
