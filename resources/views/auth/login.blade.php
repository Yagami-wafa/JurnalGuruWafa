<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header card-header-red">
                <h4 class="mb-0 text-white">🔐 Login</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required 
                               autocomplete="email" autofocus
                               placeholder="Masukkan email Anda">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required 
                               autocomplete="current-password"
                               placeholder="Masukkan password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="remember" 
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Ingat Saya</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary-red btn-lg">Login</button>
                    </div>

                    <div class="text-center mt-3">
                        <p>Belum punya akun? <a href="{{ route('register') }}" class="text-primary-red">Daftar di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection