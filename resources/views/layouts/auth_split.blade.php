<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fff;
        }
        .split-container {
            display: grid;
            grid-template-columns: 45% 55%;
            min-height: 100vh;
        }
        .form-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3rem;
        }
        .illustration-section {
            background-color: #F0F2F5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .auth-card {
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
        }
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            background-color: #F9FAFB;
            border: 1px solid #D1D5DB;
        }
        .btn-primary {
            background-color: #22c55e;
            border-color: #22c55e;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            font-weight: 600;
            width: 100%;
        }
        .social-btn {
            border: 1px solid #D1D5DB;
        }
        @media (max-width: 992px) {
            .split-container {
                grid-template-columns: 1fr;
            }
            .illustration-section {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="split-container">
        <div class="form-section">
            <div class="auth-card">
                @yield('content')
            </div>
        </div>
        <div class="illustration-section" style="background-image: linear-gradient(rgba(15,23,42,0.25), rgba(15,23,42,0.25)), url('{{ asset('serious-expert-expressing-support-colleague.jpg') }}');">
        </div>
    </div>
</body>
</html>
