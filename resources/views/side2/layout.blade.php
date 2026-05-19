<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kasimbagu Travelling Agency</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * { font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; }
        /* ── Navbar ── */
        #k2Nav {
            background: rgba(2,18,40,0.96);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            padding: 12px 0;
            transition: all 0.3s ease;
        }
        #k2Nav.scrolled { background: rgba(1,12,28,0.99); box-shadow: 0 4px 30px rgba(0,0,0,0.5); }
        #k2Nav .nav-link { color: rgba(255,255,255,0.78) !important; font-weight: 500; font-size: 0.92rem; padding: 8px 14px; transition: color 0.2s; }
        #k2Nav .nav-link:hover { color: #38bdf8 !important; }
        /* ── Footer ── */
        .k2-footer { background: #030d1a; color: #64748b; }
        .k2-footer h6 { color: #e2e8f0; }
        .k2f-links a { color: #64748b; text-decoration: none; font-size: 0.88rem; display: block; margin-bottom: 10px; transition: all 0.2s; }
        .k2f-links a:hover { color: #38bdf8; padding-left: 5px; }
        .k2f-social { width: 34px; height: 34px; background: rgba(255,255,255,0.06); display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: #64748b; text-decoration: none; transition: all 0.3s; }
        .k2f-social:hover { background: #0284c7; color: white; transform: translateY(-3px); }
        .k2f-contact p { color: #64748b; font-size: 0.88rem; }
        .k2f-contact a { color: #64748b; text-decoration: none; }
        .k2f-contact a:hover { color: #38bdf8; }
        /* ── WhatsApp ── */
        .kasb-wa-btn { position: fixed; bottom: 28px; right: 28px; width: 54px; height: 54px; background: #25d366; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; box-shadow: 0 6px 20px rgba(37,211,102,0.45); z-index: 9990; text-decoration: none; transition: transform 0.3s; animation: pulse-wa 2.5s infinite; }
        .kasb-wa-btn:hover { transform: scale(1.15); color: white; }
        @keyframes pulse-wa { 0% { box-shadow: 0 0 0 0 rgba(37,211,102,0.6); } 70% { box-shadow: 0 0 0 16px rgba(37,211,102,0); } 100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); } }
    </style>
</head>
<body style="background:#fff;">

<!-- ══ NAVBAR ══ -->
<nav class="navbar navbar-expand-lg sticky-top" id="k2Nav">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('travel') }}">
            <div style="width:40px;height:40px;background:linear-gradient(135deg,#0284c7,#38bdf8);border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="bi bi-airplane-fill text-white" style="font-size:1.05rem;"></i>
            </div>
            <div style="line-height:1.1;">
                <div class="fw-bold" style="color:#fff;font-size:1rem;">Kasim<span style="color:#38bdf8;">bagu</span></div>
                <div style="font-size:0.58rem;letter-spacing:2.5px;color:#7dd3fc;font-weight:700;text-transform:uppercase;">Travelling Agency</div>
            </div>
        </a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#k2Offcanvas">
            <i class="bi bi-list" style="font-size:1.5rem;"></i>
        </button>
        <div class="collapse navbar-collapse" id="k2Collapse">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item"><a class="nav-link" href="{{ route('travel') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#destinations">Destinations</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#why-us">Why Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('consultacy') }}" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-semibold">
                    <i class="bi bi-briefcase me-1"></i>Consultancy
                </a>
                <a href="#contact" class="btn btn-sm rounded-pill px-4 fw-bold text-dark" style="background:#38bdf8;">Book Now</a>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="k2Offcanvas" style="background:#020c1d;max-width:280px;">
    <div class="offcanvas-header py-4" style="border-bottom:1px solid rgba(255,255,255,0.07);">
        <div class="d-flex align-items-center gap-2">
            <div style="width:36px;height:36px;background:linear-gradient(135deg,#0284c7,#38bdf8);border-radius:9px;display:flex;align-items:center;justify-content:center;">
                <i class="bi bi-airplane-fill text-white" style="font-size:0.9rem;"></i>
            </div>
            <div style="line-height:1.1;">
                <div class="fw-bold text-white" style="font-size:0.95rem;">Kasim<span style="color:#38bdf8;">bagu</span></div>
                <div style="font-size:0.56rem;letter-spacing:2px;color:#7dd3fc;font-weight:700;">TRAVEL</div>
            </div>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-4">
        <ul class="list-unstyled">
            <li><a href="{{ route('travel') }}" class="d-block py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);">Home</a></li>
            <li><a href="#destinations" class="d-block py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas">Destinations</a></li>
            <li><a href="#services" class="d-block py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas">Services</a></li>
            <li><a href="#why-us" class="d-block py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas">Why Us</a></li>
            <li><a href="#contact" class="d-block py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas">Contact</a></li>
        </ul>
        <div class="mt-4 d-grid gap-2">
            <a href="{{ route('consultacy') }}" class="btn btn-outline-light rounded-pill"><i class="bi bi-briefcase me-1"></i>Consultancy</a>
            <a href="#contact" class="btn rounded-pill fw-bold text-dark" style="background:#38bdf8;" data-bs-dismiss="offcanvas">Book Now</a>
        </div>
    </div>
</div>

<main class="flex-grow-1">
    @yield('content')
</main>

<!-- ══ FOOTER ══ -->
<footer class="k2-footer pt-5 pb-3">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div style="width:38px;height:38px;background:linear-gradient(135deg,#0284c7,#38bdf8);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-airplane-fill text-white" style="font-size:1rem;"></i>
                    </div>
                    <div style="line-height:1.1;">
                        <div class="fw-bold" style="color:#e2e8f0;">Kasim<span style="color:#38bdf8;">bagu</span></div>
                        <div style="font-size:0.58rem;letter-spacing:2px;color:#7dd3fc;font-weight:700;">TRAVELLING AGENCY</div>
                    </div>
                </div>
                <p style="color:#64748b;font-size:0.88rem;line-height:1.8;">Your trusted partner for flights, visas, hotels, tours, and seamless travel experiences across 50+ global destinations.</p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="k2f-social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="k2f-social"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="k2f-social"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://wa.me/255700000000" class="k2f-social" style="background:#25d366;color:white;"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-4 small text-uppercase" style="letter-spacing:1px;">Services</h6>
                <ul class="list-unstyled k2f-links">
                    <li><a href="#services">Flight Tickets</a></li>
                    <li><a href="#services">Visa Assistance</a></li>
                    <li><a href="#services">Hotel Booking</a></li>
                    <li><a href="#services">Tour Packages</a></li>
                    <li><a href="#services">Airport Pickup</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-4 small text-uppercase" style="letter-spacing:1px;">Destinations</h6>
                <ul class="list-unstyled k2f-links">
                    <li><a href="#destinations">Dubai, UAE</a></li>
                    <li><a href="#destinations">Istanbul, Turkey</a></li>
                    <li><a href="#destinations">London, UK</a></li>
                    <li><a href="#destinations">New York, USA</a></li>
                    <li><a href="#destinations">Beijing, China</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 class="fw-bold mb-4 small text-uppercase" style="letter-spacing:1px;">Get in Touch</h6>
                <div class="k2f-contact">
                    <p><i class="bi bi-geo-alt-fill me-2" style="color:#38bdf8;"></i>Dar es Salaam, Tanzania</p>
                    <p><i class="bi bi-envelope-fill me-2" style="color:#38bdf8;"></i><a href="mailto:travel@kasimbagu.com">travel@kasimbagu.com</a></p>
                    <p class="mb-0"><i class="bi bi-telephone-fill me-2" style="color:#38bdf8;"></i><a href="tel:+255700000000">+255 700 000 000</a></p>
                </div>
            </div>
        </div>
        <div class="row mt-5 pt-3" style="border-top:1px solid rgba(255,255,255,0.05);">
            <div class="col-12 text-center" style="color:#334155;font-size:0.83rem;">
                &copy; {{ date('Y') }} Kasimbagu Travelling Agency. All rights reserved. &nbsp;|&nbsp;
                <a href="{{ url('/') }}" style="color:#475569;text-decoration:none;">Main Site</a> &nbsp;|&nbsp;
                <a href="{{ route('consultacy') }}" style="color:#475569;text-decoration:none;">Consultancy</a>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Float -->
<a href="https://wa.me/255700000000" target="_blank" class="kasb-wa-btn" title="Chat on WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>

<script>
    window.addEventListener('scroll', function () {
        document.getElementById('k2Nav').classList.toggle('scrolled', window.scrollY > 50);
    });
</script>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
