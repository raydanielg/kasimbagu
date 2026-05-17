<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasimbagu Travelling Agency</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        .gradient-brand { background: linear-gradient(90deg, #0ea5e9 0%, #22c55e 100%); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark gradient-brand">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('travel') }}">Kasimbagu Travel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navSide2" aria-controls="navSide2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navSide2">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('consultacy') }}">Consultancy</a></li>
                <li class="nav-item"><a class="btn btn-light text-dark ms-lg-2" href="#contact">Get a Quote</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="py-5 bg-light border-bottom">
    <div class="container">
        <h1 class="display-5 fw-semibold">Kasimbagu Travelling Agency</h1>
        <p class="lead mb-0">Stress-free bookings and curated trips worldwide.</p>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="py-4 mt-5 bg-dark text-white-50">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <p class="mb-0">© {{ date('Y') }} Kasimbagu Travelling Agency</p>
        <div>
            <a class="text-white-50 text-decoration-none me-3" href="{{ route('travel') }}">Travel</a>
            <a class="text-white-50 text-decoration-none" href="{{ route('consultacy') }}">Consultancy</a>
        </div>
    </div>
</footer>

<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
