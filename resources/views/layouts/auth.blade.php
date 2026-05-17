<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Auth')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body { min-height: 100vh; background: radial-gradient(1000px 600px at -10% -10%, #2f855a 0%, #0f3a3a 60%), #0b2c2c; }
        .auth-shell { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem; }
        .auth-card { width: 100%; max-width: 1100px; border-radius: 26px; overflow: hidden; background: rgba(255,255,255,0.06); box-shadow: 0 20px 60px rgba(0,0,0,0.35); backdrop-filter: blur(10px); }
        .auth-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; }
        .auth-illustration { position: relative; padding: 3rem 2rem; background: linear-gradient(135deg, rgba(255,255,255,0.10), rgba(255,255,255,0.04)); }
        .auth-illustration .bubble { position: absolute; border-radius: 999px; background: rgba(255,255,255,0.08); filter: blur(0.5px); }
        .bubble.b1 { width: 260px; height: 260px; left: 12%; top: 10%; }
        .bubble.b2 { width: 120px; height: 120px; right: 18%; top: 18%; }
        .bubble.b3 { width: 70px; height: 70px; right: 12%; bottom: 18%; }
        .auth-illustration .brand { color: #e6fffa; opacity: 0.9; }
        .auth-illustration .caption { color: #d1fae5; opacity: 0.8; }
        .auth-form { padding: 3rem 2.5rem; background: #0b2f2f; }
        .auth-title { color: #e6fffa; font-weight: 600; }
        .form-label { color: #b2f5ea; font-weight: 500; }
        .form-control { background: #0a2525; color: #e6fffa; border: 1px solid rgba(226, 255, 250, 0.18); border-radius: 999px; padding: 0.8rem 1.1rem; }
        .form-control::placeholder { color: #94d5cc; opacity: 0.8; }
        .form-control:focus { background: #0b2b2b; color: #fff; border-color: #5eead4; box-shadow: 0 0 0 0.25rem rgba(45, 212, 191, 0.15); }
        .btn-brand { background: linear-gradient(90deg, #14b8a6, #60a5fa); border: none; color: white; border-radius: 999px; padding: 0.8rem 1.2rem; font-weight: 600; }
        .btn-brand:hover { filter: brightness(1.05); }
        .auth-links a { color: #86efac; text-decoration: none; }
        .auth-links a:hover { text-decoration: underline; }
        @media (max-width: 992px) { .auth-grid { grid-template-columns: 1fr; } .auth-illustration { display: none; } }
    </style>
</head>
<body>
<div class="auth-shell">
    <div class="auth-card">
        <div class="auth-grid">
            <div class="auth-illustration">
                <div class="bubble b1"></div>
                <div class="bubble b2"></div>
                <div class="bubble b3"></div>
                <div class="container">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rounded-circle bg-teal-200 me-3" style="width:48px;height:48px;background:#5eead4"></div>
                        <div>
                            <h5 class="mb-0 brand">Kasimbagu</h5>
                            <small class="caption">Welcome back</small>
                        </div>
                    </div>
                    <div class="text-white-50">
                        <p class="mb-2">Professional services and seamless travel planning.</p>
                        <p class="mb-0">Secure login to continue.</p>
                    </div>
                </div>
            </div>
            <div class="auth-form">
                @yield('form')
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
