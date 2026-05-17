<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #F3F4F6; /* A light, neutral gray */
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23D1D5DB' fill-opacity='0.3'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
        }
        .auth-card {
            background-color: #FFFFFF;
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            width: 100%;
            max-width: 28rem;
        }
        .auth-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        .auth-logo svg {
            width: 3rem;
            height: 3rem;
        }
        .auth-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 2rem;
        }
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            background-color: #F9FAFB;
            border: 1px solid #D1D5DB;
        }
        .form-control:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .btn-primary {
            background-color: #22c55e; /* Green from previous design */
            border-color: #22c55e;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            font-weight: 600;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #16a34a;
            border-color: #16a34a;
        }
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #6B7280;
            margin: 1.5rem 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #E5E7EB;
        }
        .divider:not(:empty)::before {
            margin-right: .5em;
        }
        .divider:not(:empty)::after {
            margin-left: .5em;
        }
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.5rem;
            background-color: #FFFFFF;
            color: #374151;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 0.75rem;
        }
        .social-btn:hover {
            background-color: #F9FAFB;
        }
        .social-btn svg {
            width: 1.25rem;
            height: 1.25rem;
            margin-right: 0.5rem;
        }
        .auth-footer-link {
            text-align: center;
            font-size: 0.875rem;
            color: #6B7280;
        }
        .auth-footer-link a {
            color: #2563EB;
            font-weight: 600;
            text-decoration: none;
        }
        .auth-footer-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="auth-logo">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
        </div>
        <h2 class="auth-title">@yield('title')</h2>
        @yield('content')
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.Swal) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true
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
        }

        // Loading state for forms with data-loading attribute
        document.querySelectorAll('form[data-loading]')?.forEach(form => {
            form.addEventListener('submit', () => {
                const btn = form.querySelector('button[type="submit"]');
                if (btn) {
                    btn.disabled = true;
                    const original = btn.getAttribute('data-original');
                    if (!original) btn.setAttribute('data-original', btn.innerHTML);
                    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Processing...';
                }
            }, { once: true });
        });
    });
</script>
</body>
</html>
