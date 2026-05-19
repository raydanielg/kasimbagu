<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kasimbagu') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; }
        .letter-spacing-1 { letter-spacing: 1px; }
        .hover-lift { transition: transform 0.3s ease; }
        .hover-lift:hover { transform: translateY(-8px); }
        .btn-kasb-custom {
            background-color: #e2e8f0; color: #004a99; border: none;
            padding: 12px 25px; border-radius: 50px; font-weight: 600;
            display: inline-flex; align-items: center; gap: 15px;
            transition: all 0.3s ease; text-decoration: none;
        }
        .btn-kasb-custom:hover { background-color: #cbd5e1; transform: scale(1.05); color: #004a99; }
        .icon-circle-kasb {
            background-color: rgba(0,0,0,0.08); width: 32px; height: 32px;
            border-radius: 50%; display: flex; align-items: center;
            justify-content: center; font-size: 14px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app" class="d-flex flex-column min-vh-100">
        @include('partials.header')

        <main class="flex-grow-1">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    @if(session('success'))
    <script>
        Swal.fire({ icon: 'success', title: 'Success!', text: "{{ session('success') }}", confirmButtonColor: '#004a99', timer: 3000 });
    </script>
    @endif
    @if($errors->any())
    <script>
        Swal.fire({ icon: 'error', title: 'Oops...', text: "{{ $errors->first() }}", confirmButtonColor: '#004a99' });
    </script>
    @endif
</body>
</html>
