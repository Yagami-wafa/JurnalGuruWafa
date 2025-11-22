<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('title', 'Registrasi Guru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header card-header-red">
                <h4 class="mb-0 text-white">📝 Registrasi Guru Baru</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required
                                       placeholder="Masukkan nama lengkap">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required
                                       placeholder="contoh@sekolah.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sekolah" class="form-label">Sekolah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('sekolah') is-invalid @enderror" 
                                       id="sekolah" name="sekolah" value="{{ old('sekolah') }}" required
                                       placeholder="Nama sekolah tempat mengajar">
                                @error('sekolah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                                       id="nip" name="nip" value="{{ old('nip') }}" required
                                       placeholder="Nomor Induk Pegawai">
                                @error('nip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" required
                                       placeholder="Minimal 8 karakter">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" 
                                       id="password_confirmation" name="password_confirmation" required
                                       placeholder="Ulangi password">
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <small>
                            <strong>Perhatian:</strong> Setelah registrasi, akun Anda akan menunggu persetujuan admin. 
                            Anda akan mendapatkan notifikasi via email ketika akun sudah diaktifkan.
                        </small>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary-red btn-lg">
                            📋 Daftar Sekarang
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-primary-red">Login di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection