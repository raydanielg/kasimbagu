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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: url('{{ asset('flat-abstract-background-pattern-vector_822782-866.jpg') }}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .split-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1.5rem;
            position: relative;
            z-index: 1;
        }
        .bg-overlay {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.78);
            z-index: 0;
        }
        .form-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
        }
        .auth-card {
            width: 100%;
            max-width: 360px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            padding: 2rem;
        }
        .form-control {
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            background-color: #F9FAFB;
            border: 1px solid #D1D5DB;
            font-size: 0.875rem;
        }
        .input-icon-wrap {
            position: relative;
        }
        .input-icon-wrap .form-control {
            padding-left: 2.25rem;
        }
        .input-icon-wrap svg {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 1rem;
            color: #9CA3AF;
            pointer-events: none;
        }
        .form-label {
            font-size: 0.8125rem;
            margin-bottom: 0.25rem;
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
        .compact-title {
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }
        .compact-subtitle {
            font-size: 0.8125rem;
            margin-bottom: 1rem;
        }
        .loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(3px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }
        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .loading-overlay .spinner {
            width: 3rem;
            height: 3rem;
            border: 0.25rem solid #e5e7eb;
            border-top-color: #22c55e;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="bg-overlay"></div>

    <div class="split-container">
        <div class="form-section">
            <div class="auth-card animate__animated animate__fadeInUp animate__faster">
                @yield('content')
            </div>
        </div>
    </div>

    <div id="loadingOverlay" class="loading-overlay">
        <div class="spinner" role="status" aria-label="Loading"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            @if (session('success'))
                Toast.fire({ icon: 'success', title: @json(session('success')) });
            @endif
            @if (session('status'))
                Toast.fire({ icon: 'success', title: @json(session('status')) });
            @endif
            @if (session('error'))
                Toast.fire({ icon: 'error', title: @json(session('error')) });
            @endif
            @if (session('warning'))
                Toast.fire({ icon: 'warning', title: @json(session('warning')) });
            @endif
            @if (session('info'))
                Toast.fire({ icon: 'info', title: @json(session('info')) });
            @endif
            @if ($errors->any())
                Toast.fire({ icon: 'error', title: @json($errors->first()) });
            @endif
        });
    </script>

    @stack('scripts')
</body>
</html>
