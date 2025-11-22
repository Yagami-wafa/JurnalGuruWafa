<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Jurnal Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-red: #dc3545;
            --light-red: #f8d7da;
            --dark-red: #c82333;
            --white: #ffffff;
        }
        
        .bg-primary-red {
            background-color: var(--primary-red) !important;
        }
        
        .btn-primary-red {
            background-color: var(--primary-red);
            border-color: var(--primary-red);
            color: white;
        }
        
        .btn-primary-red:hover {
            background-color: var(--dark-red);
            border-color: var(--dark-red);
            color: white;
        }
        
        .text-primary-red {
            color: var(--primary-red) !important;
        }
        
        .border-primary-red {
            border-color: var(--primary-red) !important;
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .card-header-red {
            background-color: var(--primary-red);
            color: white;
            font-weight: bold;
        }
        
        .pending-alert {
            background-color: var(--light-red);
            border-left: 4px solid var(--primary-red);
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }
        
        .btn-action {
            margin: 2px;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
            }
            
            .btn-action {
                display: block;
                width: 100%;
                margin-bottom: 5px;
            }
            
            .table-responsive table {
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary-red shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                📚 Jurnal Guru
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                        @if(Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                            </li>
                        @elseif(Auth::user()->isGuru() && Auth::user()->isApproved())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('jurnal.index') }}">Jurnal Saya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('jurnal.create') }}">Tambah Jurnal</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register Guru</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                👤 {{ Auth::user()->name }}
                                @if(Auth::user()->isPending())
                                    <span class="badge bg-warning">Pending</span>
                                @elseif(Auth::user()->isApproved())
                                    <span class="badge bg-success">Approved</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        🚪 Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ✅ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ❌ {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Jurnal Guru. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>