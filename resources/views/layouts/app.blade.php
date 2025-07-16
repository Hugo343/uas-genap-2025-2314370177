<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Tambahkan Bootstrap via CDN jika belum -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="{{ url('/') }}">MyApp</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Produk</a></li>
                @auth
                    <li class="nav-item"><a href="{{ route('wishlist.index') }}" class="nav-link">Wishlist</a></li>
                    <li class="nav-item"><a href="{{ route('orders.index') }}" class="nav-link">Pesanan</a></li>
                    @if(Auth::user()->is_admin)
                        <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Admin</a></li>
                    @endif
                @endauth
            </ul>

            <div class="d-flex">
                @auth
                    <div class="me-3 align-self-center text-dark">
                        Hai, {{ Auth::user()->name }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="bg-light py-3 text-center">
        <p class="mb-0">&copy; {{ date('Y') }} MyApp. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
