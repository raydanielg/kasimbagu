<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasimbagu Consultancy Agency</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('consultacy') }}">Kasimbagu Consultancy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navSide1" aria-controls="navSide1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navSide1">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('travel') }}">Travel Agency</a></li>
                <li class="nav-item"><a class="btn btn-light text-primary ms-lg-2" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="py-5 bg-light border-bottom">
    <div class="container">
        <h1 class="display-5 fw-semibold">Kasimbagu Consultancy Agency</h1>
        <p class="lead mb-0">Business growth, compliance, and digital solutions under one roof.</p>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="py-4 mt-5 bg-dark text-white-50">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <p class="mb-0">© {{ date('Y') }} Kasimbagu Consultancy Agency</p>
        <div>
            <a class="text-white-50 text-decoration-none me-3" href="{{ route('consultacy') }}">Consultancy</a>
            <a class="text-white-50 text-decoration-none" href="{{ route('travel') }}">Travel</a>
        </div>
    </div>
</footer>

<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
