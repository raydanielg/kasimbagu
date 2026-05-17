<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redirecting…</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body { min-height: 100vh; display:flex; align-items:center; justify-content:center; background:#c9c7c2; }
        .logo { font-weight: 800; font-size: 2rem; letter-spacing: 1px; }
        .dot { width: 8px; height: 8px; background:#111; border-radius: 50%; display:inline-block; animation: blink 1.3s infinite; margin-left:6px; }
        @keyframes blink { 0%, 60% { opacity: 0.2 } 100% { opacity: 1 } }
        .card { background: rgba(255,255,255,0.75); border-radius: 10px; padding: 24px 32px; box-shadow: 0 10px 30px rgba(0,0,0,0.12); text-align:center; }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo mb-2">W</div>
        <div>Redirecting<span class="dot"></span></div>
    </div>

    <script>
        setTimeout(function(){ window.location.href = @json($to); }, 1000);
    </script>
</body>
</html>
