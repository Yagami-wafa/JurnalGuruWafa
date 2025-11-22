<!-- resources/views/pending.blade.php -->
@extends('layouts.app')

@section('title', 'Menunggu Approval')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-warning shadow">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">⏳ Menunggu Persetujuan Admin</h4>
            </div>
            <div class="card-body text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-clock fa-4x text-warning mb-3"></i>
                    <h3 class="text-warning">Akun Anda Sedang Dalam Proses Review</h3>
                </div>
                
                <div class="pending-alert rounded-3 mb-4">
                    <h5>Detail Registrasi Anda:</h5>
                    <div class="row text-start mt-3">
                        <div class="col-md-6">
                            <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Sekolah:</strong> {{ Auth::user()->sekolah }}</p>
                            <p><strong>NIP:</strong> {{ Auth::user()->nip }}</p>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info">
                    <p class="mb-0">
                        <strong>Informasi:</strong> Akun Anda akan segera diaktifkan setelah mendapatkan persetujuan dari administrator. 
                        Silakan tunggu atau hubungi admin sekolah untuk proses percepatan.
                    </p>
                </div>

                <div class="mt-4">
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="btn btn-outline-primary-red">
                        🚪 Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection