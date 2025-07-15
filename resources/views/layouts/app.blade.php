<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Katalog Produk</a>

    <div class="ms-auto">
      @guest
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
        <a href="{{ route('register') }}" class="btn btn-light btn-sm">Daftar</a>
      @else
        <span class="text-white me-2">Hai, {{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
          <button class="btn btn-danger btn-sm">Logout</button>
        </form>
      @endguest
    </div>
  </div>
</nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
