<div>
    <!DOCTYPE html>
    <html lang="lt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Konferencijų sistema')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Jei naudoji Bootstrap CDN kaip fallback -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">

    <!-- Navbar (disabled logout kaip užduotyje) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Konferencijos</a>
            <div class="ms-auto d-flex align-items-center">
                <span class="me-3">Sveiki, {{ Auth::user()->name ?? ' svečias' }}</span>
                <button class="btn btn-outline-secondary" disabled>Logout</button>
            </div>
        </div>
    </nav>

    <!-- Pagrindinis turinys -->
    <main class="container my-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
</div>
