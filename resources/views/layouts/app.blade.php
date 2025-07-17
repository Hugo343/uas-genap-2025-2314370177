<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FPM HUGO')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tambahan gaya opsional --}}
    <style>
        body {
            padding-top: 4rem;
        }
        footer {
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm px-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                {{-- Menu Kiri --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Produk</a></li>
                    
                    @auth
                        <li class="nav-item"><a href="{{ route('wishlist.index') }}" class="nav-link">Wishlist</a></li>
                        <li class="nav-item"><a href="{{ route('orders.index') }}" class="nav-link">Pesanan</a></li>
                        @if(Auth::user()->is_admin)
                            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard Admin</a></li>
                        @endif
                    @endauth
                </ul>

                {{-- Menu Kanan --}}
                <div class="d-flex align-items-center">
                    @auth
                        <span class="me-3 text-dark">Hai, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-light py-3 text-center mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} MyApp. All rights reserved.</p>
    </footer>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
