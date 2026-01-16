<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RAS STORE')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            background-color: #ffae00; /* Warna Oranye Asli */
            color: #000000;
            font-family: 'Poppins', sans-serif;
        }

        nav {
            background-color: #000000; /* Navbar Hitam Asli */
        }
        nav a {
            color: #e0e0e0 !important;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #ffffff !important;
        }

        /* Fix: Agar Dropdown menu admin terlihat jelas */
        .dropdown-menu {
            background-color: #ffffff;
        }
        .dropdown-item {
            color: #000000 !important;
        }
        .dropdown-item:hover {
            background-color: #ffae00;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #1f1f1f;
            color: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 0.9rem;
        }

        /* Style Asli Anda */
        .card {
            background-color: #d28e0f;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.4);
        }
        .btn-custom {
            background-color: #000000;
            color: #fff;
            border-radius: 20px;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            background-color: #ffffff;
            color: #000000;
        }

        .admin-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">RAS STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/post') }}">Produk</a></li>
                    
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                    @else
                        @if(Auth::user()->role == 'admin')
                            {{-- MODIFIKASI KECIL: DROPDOWN AGAR BISA PILIH MENU --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-bold text-danger" href="#" role="button" data-bs-toggle="dropdown">
                                    MENU ADMIN
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('products.index') }}">Aplikasi Premium</a></li>
                                    <li><a class="dropdown-item" href="{{ route('sosmed.index') }}">Suntik Sosmed</a></li>
                                    <li><a class="dropdown-item" href="{{ route('games.index') }}">Topup Game</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="{{ url('/logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link text-danger" href="{{ url('/logout') }}">Logout</a></li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="container mt-5">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <p>© {{ date('Y') }} RAS STORE | Aplikasi Untuk List Pembelian Topup Berbasis Open Source</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>