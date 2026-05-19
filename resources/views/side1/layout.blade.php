<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kasimbagu Consultancy Agency — Ora et Labora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --gold: #c9993a;
            --gold-light: #e8b84b;
            --gold-pale: #f5e8c8;
            --navy: #091628;
            --navy-mid: #0e2040;
            --navy-soft: #142c54;
            --teal: #0d9488;
            --teal-dark: #065f52;
            --amber-dark: #211600;
        }
        body { font-family: 'Inter', sans-serif; background: #fff; }
        h1,h2,h3,h4,h5,h6,.display-1,.display-2,.display-3,.display-4,.display-5,.display-6 {
            font-family: 'EB Garamond', Georgia, serif;
        }
        /* ── Top Bar ── */
        .k1-topbar { background: var(--navy); border-bottom: 1px solid rgba(201,153,58,0.2); padding: 7px 0; font-size: 0.78rem; color: rgba(255,255,255,0.55); }
        .k1-topbar a { color: var(--gold); text-decoration: none; }
        /* ── Navbar ── */
        #k1Nav {
            background: rgba(4,12,30,0.97);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(201,153,58,0.15);
            padding: 10px 0;
            transition: all 0.3s ease;
        }
        #k1Nav.scrolled { background: rgba(3,9,22,1); box-shadow: 0 4px 40px rgba(0,0,0,0.6); }
        #k1Nav .nav-link { color: rgba(255,255,255,0.78) !important; font-weight: 500; font-size: 0.88rem; padding: 8px 12px; transition: color 0.2s; letter-spacing: 0.3px; }
        #k1Nav .nav-link:hover { color: var(--gold) !important; }
        #k1Nav .dropdown-menu { background: var(--navy-mid); border: 1px solid rgba(201,153,58,0.15); border-radius: 12px; padding: 10px; min-width: 240px; box-shadow: 0 20px 50px rgba(0,0,0,0.5); }
        #k1Nav .dropdown-item { color: rgba(255,255,255,0.75); font-size: 0.87rem; padding: 9px 14px; border-radius: 8px; transition: all 0.2s; display: flex; align-items: center; gap: 10px; }
        #k1Nav .dropdown-item:hover { background: rgba(201,153,58,0.12); color: var(--gold); }
        #k1Nav .dropdown-item i { font-size: 1rem; width: 22px; }
        /* ── Footer ── */
        .k1-footer { background: #020810; color: #64748b; }
        .k1-footer h6 { color: #e2e8f0; font-family: 'EB Garamond', serif; font-size: 1rem; }
        .k1f-links a { color: #64748b; text-decoration: none; font-size: 0.87rem; display: block; margin-bottom: 9px; transition: all 0.2s; }
        .k1f-links a:hover { color: var(--gold); padding-left: 5px; }
        .k1f-social { width: 36px; height: 36px; background: rgba(255,255,255,0.05); display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: #64748b; text-decoration: none; border: 1px solid rgba(255,255,255,0.07); transition: all 0.3s; }
        .k1f-social:hover { background: var(--gold); color: var(--navy); transform: translateY(-3px); border-color: var(--gold); }
        .k1f-contact p { color: #64748b; font-size: 0.87rem; display: flex; gap: 10px; align-items: flex-start; }
        .k1f-contact a { color: #64748b; text-decoration: none; }
        .k1f-contact a:hover { color: var(--gold); }
        /* ── WhatsApp ── */
        .kasb-wa-btn { position: fixed; bottom: 28px; right: 28px; width: 54px; height: 54px; background: #25d366; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; box-shadow: 0 6px 20px rgba(37,211,102,0.45); z-index: 9990; text-decoration: none; transition: transform 0.3s; animation: pulse-wa 2.5s infinite; }
        .kasb-wa-btn:hover { transform: scale(1.15); color: white; }
        @keyframes pulse-wa { 0% { box-shadow: 0 0 0 0 rgba(37,211,102,0.6); } 70% { box-shadow: 0 0 0 16px rgba(37,211,102,0); } 100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); } }
        /* ── Shared utility ── */
        .text-gold { color: var(--gold) !important; }
        .bg-navy { background: var(--navy) !important; }
        .k1-section-badge { display: inline-flex; align-items: center; background: rgba(201,153,58,0.1); border: 1px solid rgba(201,153,58,0.3); color: var(--gold); padding: 5px 16px; border-radius: 50px; font-size: 0.72rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 14px; }
    </style>
</head>
<body>

<!-- ══ TOP BAR ══ -->
<div class="k1-topbar d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex gap-4">
            <span><i class="bi bi-geo-alt-fill me-1 text-gold"></i>Dar es Salaam &amp; Moshi, Kilimanjaro</span>
            <span><i class="bi bi-envelope-fill me-1 text-gold"></i><a href="mailto:info@kasimbagu.com">info@kasimbagu.com</a></span>
        </div>
        <div class="d-flex gap-4">
            <span><i class="bi bi-telephone-fill me-1 text-gold"></i><a href="tel:+255700000000">+255 700 000 000</a></span>
            <a href="{{ route('travel') }}" class="text-gold"><i class="bi bi-airplane me-1"></i>Travel Agency</a>
        </div>
    </div>
</div>

<!-- ══ NAVBAR ══ -->
<nav class="navbar navbar-expand-lg sticky-top" id="k1Nav">
    <div class="container">
        <a class="navbar-brand py-1" href="{{ route('consultacy') }}">
            <div style="background:#fff;border-radius:10px;padding:4px 14px;display:inline-flex;align-items:center;box-shadow:0 3px 18px rgba(0,0,0,0.35);">
                <img src="{{ asset('logo_kasimbagu_agency-removebg-preview.png') }}" alt="Kasimbagu Consultancy Agency" style="height:38px;width:auto;">
            </div>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#k1Offcanvas">
            <i class="bi bi-list text-white" style="font-size:1.6rem;"></i>
        </button>
        <div class="collapse navbar-collapse" id="k1Collapse">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item"><a class="nav-link" href="{{ route('consultacy') }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Services</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#legal"><i class="bi bi-journal-richtext text-gold"></i>Legal Activities</a></li>
                        <li><a class="dropdown-item" href="#research"><i class="bi bi-search text-gold"></i>Research &amp; Consultancy</a></li>
                        <li><a class="dropdown-item" href="#company"><i class="bi bi-building-fill text-gold"></i>Company &amp; Org. Management</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#why-us">Why Choose Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('travel') }}" class="btn btn-sm btn-outline-light rounded-pill px-3" style="font-size:0.82rem;">
                    <i class="bi bi-airplane me-1"></i>Travel
                </a>
                <a href="#contact" class="btn btn-sm rounded-pill px-4 fw-bold text-dark" style="background:var(--gold);font-size:0.85rem;">
                    Book Consultation
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="k1Offcanvas" style="background:var(--navy);max-width:290px;">
    <div class="offcanvas-header py-4" style="border-bottom:1px solid rgba(201,153,58,0.15);">
        <div style="background:#fff;border-radius:9px;padding:5px 13px;display:inline-flex;align-items:center;">
            <img src="{{ asset('logo_kasimbagu_agency-removebg-preview.png') }}" alt="Kasimbagu" style="height:32px;width:auto;">
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-4">
        <ul class="list-unstyled">
            <li><a href="{{ route('consultacy') }}" class="d-block py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);">Home</a></li>
            <li class="mb-1">
                <div class="py-2 px-3" style="color:rgba(255,255,255,0.4);font-size:0.72rem;letter-spacing:1px;font-weight:700;text-transform:uppercase;">Services</div>
                <a href="#legal" class="d-flex align-items-center gap-2 py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas"><i class="bi bi-journal-richtext text-gold"></i>Legal Activities</a>
                <a href="#research" class="d-flex align-items-center gap-2 py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas"><i class="bi bi-search text-gold"></i>Research &amp; Consultancy</a>
                <a href="#company" class="d-flex align-items-center gap-2 py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas"><i class="bi bi-building-fill text-gold"></i>Company Management</a>
            </li>
            <li><a href="#why-us" class="d-block py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas">Why Choose Us</a></li>
            <li><a href="#blog" class="d-block py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas">Blog</a></li>
            <li><a href="#contact" class="d-block py-2 px-3 rounded-3 mb-1 text-decoration-none" style="color:rgba(255,255,255,0.8);" data-bs-dismiss="offcanvas">Contact</a></li>
        </ul>
        <div class="mt-4 d-grid gap-2">
            <a href="{{ route('travel') }}" class="btn btn-outline-light rounded-pill"><i class="bi bi-airplane me-1"></i>Travel Agency</a>
            <a href="#contact" class="btn rounded-pill fw-bold text-dark" style="background:var(--gold);" data-bs-dismiss="offcanvas">Book Consultation</a>
        </div>
    </div>
</div>

<main class="flex-grow-1">
    @yield('content')
</main>

<!-- ══ FOOTER ══ -->
<footer class="k1-footer pt-5 pb-3">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="mb-4">
                    <div style="background:#fff;border-radius:10px;padding:6px 16px;display:inline-flex;align-items:center;box-shadow:0 2px 12px rgba(0,0,0,0.25);">
                        <img src="{{ asset('logo_kasimbagu_agency-removebg-preview.png') }}" alt="Kasimbagu" style="height:44px;width:auto;">
                    </div>
                </div>
                <p class="mb-1" style="color:#64748b;font-size:0.87rem;font-style:italic;font-family:'EB Garamond',serif;font-size:1rem;">"Ora et Labora"</p>
                <p style="color:#64748b;font-size:0.85rem;line-height:1.8;margin-top:8px;">Empowering East African businesses and individuals with expert legal, research, and organizational management services.</p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="k1f-social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="k1f-social"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="k1f-social"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://wa.me/255700000000" class="k1f-social"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-3 small text-uppercase" style="letter-spacing:1px;">Services</h6>
                <ul class="list-unstyled k1f-links">
                    <li><a href="#legal">Legal Activities</a></li>
                    <li><a href="#research">Research &amp; Consultancy</a></li>
                    <li><a href="#company">Company Registration</a></li>
                    <li><a href="#company">NGO/CSO Registration</a></li>
                    <li><a href="#blog">Blog &amp; Insights</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-3 small text-uppercase" style="letter-spacing:1px;">Quick Links</h6>
                <ul class="list-unstyled k1f-links">
                    <li><a href="{{ url('/') }}">Main Site</a></li>
                    <li><a href="{{ route('travel') }}">Travel Agency</a></li>
                    <li><a href="#why-us">Why Choose Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="{{ route('login') }}">Client Login</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 class="fw-bold mb-3 small text-uppercase" style="letter-spacing:1px;">Our Offices</h6>
                <div class="k1f-contact">
                    <p><i class="bi bi-building-fill text-gold flex-shrink-0"></i><div><strong style="color:#94a3b8;">Head Office — Dar es Salaam</strong><br>Dar es Salaam, Tanzania<br><a href="tel:+255700000000">+255 700 000 000</a> · <a href="mailto:info@kasimbagu.com">info@kasimbagu.com</a></div></p>
                    <p><i class="bi bi-building text-gold flex-shrink-0"></i><div><strong style="color:#94a3b8;">Branch — Moshi, Kilimanjaro</strong><br>Moshi, Kilimanjaro, Tanzania<br><a href="tel:+255700000001">+255 700 000 001</a> · <a href="mailto:moshi@kasimbagu.com">moshi@kasimbagu.com</a></div></p>
                </div>
            </div>
        </div>
        <div class="row mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.05);">
            <div class="col-12 text-center" style="color:#334155;font-size:0.82rem;">
                &copy; {{ date('Y') }} Kasimbagu Consultancy Agency. All rights reserved. &mdash; <em style="color:#475569;font-family:'EB Garamond',serif;">Ora et Labora</em>
            </div>
        </div>
    </div>
</footer>

<a href="https://wa.me/255700000000" target="_blank" class="kasb-wa-btn" title="Chat on WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>

<script>
    window.addEventListener('scroll', function () {
        document.getElementById('k1Nav').classList.toggle('scrolled', window.scrollY > 50);
    });
</script>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
