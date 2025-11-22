<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="text-primary-red mb-4">🎛️ Dashboard Administrator</h2>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-primary-red text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $pendingUsers->count() }}</h4>
                        <p>Menunggu Approval</p>
                    </div>
                    <div class="align-self-center">
                        <span style="font-size: 2rem;">⏳</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $approvedUsers->count() }}</h4>
                        <p>Guru Disetujui</p>
                    </div>
                    <div class="align-self-center">
                        <span style="font-size: 2rem;">✅</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $pendingUsers->count() + $approvedUsers->count() }}</h4>
                        <p>Total Guru</p>
                    </div>
                    <div class="align-self-center">
                        <span style="font-size: 2rem;">👨‍🏫</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Daftar User Menunggu Approval -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header card-header-red">
                <h5 class="mb-0 text-white">📋 User Menunggu Approval</h5>
            </div>
            <div class="card-body">
                @if($pendingUsers->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Sekolah</th>
                                    <th>NIP</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->sekolah }}</td>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm btn-action">
                                                ✅ Setujui
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm btn-action" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#rejectModal{{ $user->id }}">
                                            ❌ Tolak
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal untuk Penolakan -->
                                <div class="modal fade" id="rejectModal{{ $user->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tolak Registrasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="{{ route('admin.users.reject', $user->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <p>Menolak registrasi: <strong>{{ $user->name }}</strong></p>
                                                    <div class="mb-3">
                                                        <label for="alasan_penolakan" class="form-label">Alasan Penolakan:</label>
                                                        <textarea class="form-control" id="alasan_penolakan" 
                                                                  name="alasan_penolakan" rows="3" 
                                                                  placeholder="Berikan alasan penolakan..." required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Tolak Registrasi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-success text-center">
                        <h5>🎉 Tidak ada user yang menunggu approval!</h5>
                        <p class="mb-0">Semua registrasi sudah diproses.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Daftar Guru yang Sudah Disetujui -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">✅ Guru yang Sudah Disetujui</h5>
            </div>
            <div class="card-body">
                @if($approvedUsers->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Sekolah</th>
                                    <th>NIP</th>
                                    <th>Tanggal Disetujui</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($approvedUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->sekolah }}</td>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <span class="badge bg-success">Aktif</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <h5>ℹ️ Belum ada guru yang disetujui</h5>
                        <p class="mb-0">Setujui beberapa registrasi di atas untuk melihat daftar ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection