<!-- ===== TOP BAR ===== -->
<div class="kasb-top-bar py-2 shadow-sm border-bottom">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex gap-3 gap-md-4">
            <a href="mailto:info@kasimbagu.com" class="text-white text-decoration-none d-flex align-items-center hover-opacity">
                <i class="bi bi-envelope-fill text-warning me-1 me-md-2"></i>
                <span class="d-none d-sm-inline small">info@kasimbagu.com</span>
            </a>
            <a href="tel:+255690075672" class="text-white text-decoration-none d-flex align-items-center hover-opacity">
                <i class="bi bi-telephone-fill text-warning me-1 me-md-2"></i>
                <span class="small">+255 690 075 672</span>
            </a>
        </div>
        <div class="d-flex align-items-center gap-2 gap-md-3">
            <a href="#cta" class="btn btn-warning btn-sm px-3 rounded-pill fw-bold text-dark shadow-sm">
                <i class="bi bi-send-fill me-1"></i> Book / Inquire
            </a>
        </div>
    </div>
</div>

<!-- ===== MAIN NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-0 sticky-top shadow-sm kasb-main-header">
    <div class="container">
        <a class="navbar-brand py-3 fw-bold" href="{{ url('/') }}" style="font-size:1.4rem; letter-spacing:-0.5px;">
            <span style="color:#004a99;">Kasim</span><span style="color:#f59e0b;">bagu</span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#kasbMobileSidebar">
            <div class="kasb-hamburger"><span></span><span></span><span></span></div>
        </button>

        <div class="collapse navbar-collapse" id="kasbNavbar">
            <ul class="navbar-nav ms-auto align-items-center">

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link px-3 py-4 fw-bold {{ request()->is('/') ? 'active text-primary' : '' }}" href="{{ url('/') }}">Home</a>
                </li>

                <!-- Services -->
                <li class="nav-item">
                    <a class="nav-link px-3 py-4 fw-bold {{ request()->is('services') ? 'active text-primary' : '' }}" href="{{ route('services') }}">Services</a>
                </li>

                <!-- Destinations -->
                <li class="nav-item">
                    <a class="nav-link px-3 py-4 fw-bold {{ request()->is('destinations') ? 'active text-primary' : '' }}" href="{{ route('destinations') }}">Destinations</a>
                </li>

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-link px-3 py-4 fw-bold {{ request()->is('about') ? 'active text-primary' : '' }}" href="{{ route('about') }}">About</a>
                </li>

                <!-- Contact -->
                <li class="nav-item ms-lg-2">
                    <a class="nav-link px-3 py-4 fw-bold {{ request()->is('contact') ? 'active text-primary' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>

                <!-- Portal / Auth -->
                @auth
                <li class="nav-item dropdown ms-lg-2">
                    <a class="btn btn-outline-primary px-4 rounded-pill fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->first_name ?? Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 p-3 mt-2" style="min-width:220px;">
                        <li><h6 class="dropdown-header text-uppercase small fw-bold text-muted mb-2 letter-spacing-1">My Account</h6></li>
                        <li><a class="dropdown-item rounded-3 p-2 mb-1" href="{{ url('/home') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                        <li><div class="dropdown-divider"></div></li>
                        <li>
                            <a class="dropdown-item rounded-3 p-2 text-danger fw-bold" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('kasb-logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                    <form id="kasb-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </li>
                @endauth

                <li class="nav-item ms-lg-2">
                    @auth
                    <a href="{{ route('contact') }}" class="btn btn-primary px-4 rounded-pill fw-bold shadow-sm kasb-hover-lift">
                        Book Now
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary px-4 rounded-pill fw-bold shadow-sm kasb-hover-lift">
                        Book Now
                    </a>
                    @endauth
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- ===== MOBILE OFFCANVAS SIDEBAR ===== -->
<div class="offcanvas offcanvas-start border-0" tabindex="-1" id="kasbMobileSidebar" style="width:85%;max-width:380px;">
    <div class="offcanvas-header p-4" style="background:linear-gradient(135deg,#004a99 0%,#0056b3 100%);">
        <div class="d-flex align-items-center">
            <div class="bg-white rounded-3 p-2 me-3 shadow-sm">
                <span style="font-size:1.1rem;font-weight:900;color:#004a99;">K</span>
            </div>
            <div>
                <h5 class="text-white fw-bold mb-0">Kasimbagu</h5>
                <small class="text-white-50">Consultancy & Travel</small>
            </div>
        </div>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body p-0 bg-light">
        <div class="p-3 bg-white border-bottom">
            @auth
            <a href="{{ route('contact') }}" class="btn btn-warning w-100 rounded-pill fw-bold shadow-sm mb-2" data-bs-dismiss="offcanvas">
                <i class="bi bi-send-fill me-2"></i>Book / Inquire
            </a>
            @else
            <a href="{{ route('login') }}" class="btn btn-warning w-100 rounded-pill fw-bold shadow-sm mb-2" data-bs-dismiss="offcanvas">
                <i class="bi bi-send-fill me-2"></i>Book / Inquire
            </a>
            @endauth
        </div>

        <div class="p-3">
            <a href="{{ url('/') }}" class="kasb-mob-item {{ request()->is('/') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i><span>Home</span><i class="bi bi-chevron-right ms-auto"></i>
            </a>

            <div class="kasb-mob-group">
                <button class="kasb-mob-item" type="button" data-bs-toggle="collapse" data-bs-target="#mob-services">
                    <i class="bi bi-briefcase"></i><span>Services</span><i class="bi bi-chevron-down ms-auto kasb-acc-icon"></i>
                </button>
                <div id="mob-services" class="collapse kasb-mob-sub">
                    <a href="/consultacy"><i class="bi bi-building"></i>Business Consultancy</a>
                    <a href="/consultacy"><i class="bi bi-cpu"></i>ICT Solutions</a>
                    <a href="/travel"><i class="bi bi-airplane"></i>Flight Ticketing</a>
                    <a href="/travel"><i class="bi bi-passport"></i>Visa Assistance</a>
                    <a href="/travel"><i class="bi bi-building-check"></i>Hotel Booking</a>
                </div>
            </div>

            <a href="{{ route('destinations') }}" class="kasb-mob-item" data-bs-dismiss="offcanvas">
                <i class="bi bi-globe2"></i><span>Destinations</span><i class="bi bi-chevron-right ms-auto"></i>
            </a>

            <div class="kasb-mob-group">
                <button class="kasb-mob-item" type="button" data-bs-toggle="collapse" data-bs-target="#mob-about">
                    <i class="bi bi-info-circle"></i><span>About</span><i class="bi bi-chevron-down ms-auto kasb-acc-icon"></i>
                </button>
                <div id="mob-about" class="collapse kasb-mob-sub">
                    <a href="#"><i class="bi bi-dot"></i>Who We Are</a>
                    <a href="#"><i class="bi bi-dot"></i>Our Team</a>
                    <a href="{{ route('about') }}#why"><i class="bi bi-dot"></i>Why Choose Us</a>
                </div>
            </div>

            <a href="{{ route('contact') }}" class="kasb-mob-item" data-bs-dismiss="offcanvas">
                <i class="bi bi-chat-dots"></i><span>Contact</span><i class="bi bi-chevron-right ms-auto"></i>
            </a>
        </div>

        <div class="mt-auto p-3 bg-white border-top">
            @auth
            <a href="{{ url('/home') }}" class="btn btn-outline-primary w-100 mb-2 rounded-pill">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>
            <a href="{{ route('logout') }}" class="btn btn-danger w-100 rounded-pill"
               onclick="event.preventDefault();document.getElementById('kasb-logout-form').submit();">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
            @endauth
        </div>
    </div>
</div>

<style>
    /* ===== TOP BAR ===== */
    .kasb-top-bar {
        background-color: #004a99 !important;
        font-size: 0.85rem;
        position: relative;
        z-index: 1030;
        font-family: 'Inter', 'Plus Jakarta Sans', sans-serif;
    }

    /* ===== MAIN NAVBAR ===== */
    .kasb-main-header {
        transition: all 0.3s ease;
        font-family: 'Inter', 'Plus Jakarta Sans', sans-serif;
    }
    .kasb-main-header .nav-link {
        color: #1e293b !important;
        font-size: 0.95rem;
        font-weight: 600;
        transition: color 0.2s ease;
    }
    .kasb-main-header .nav-link:hover,
    .kasb-main-header .nav-link.active { color: #0d6efd !important; }
    .kasb-main-header .dropdown-toggle::after {
        transition: transform 0.3s ease;
    }
    .kasb-main-header .nav-item.dropdown:hover .dropdown-toggle::after { transform: rotate(180deg); }
    .kasb-main-header .nav-item.dropdown:hover > .dropdown-menu { display: block; margin-top: 0; }

    /* ===== MEGA MENU ===== */
    .kasb-has-megamenu { position: static; }
    .kasb-megamenu {
        width: 100%;
        left: 0; right: 0; top: 100%;
        padding: 36px !important;
        border-radius: 0 0 1.5rem 1.5rem !important;
    }
    .kasb-mega-list li { margin-bottom: 8px; }
    .kasb-mega-list li a {
        color: #475569;
        text-decoration: none;
        font-size: 0.95rem;
        transition: color 0.2s;
    }
    .kasb-mega-list li a:hover { color: #0d6efd; }

    /* ===== DROPDOWN ITEMS ===== */
    .dropdown-menu {
        border-radius: 1.25rem !important;
        margin-top: 10px !important;
    }
    .dropdown-item {
        padding: 0.75rem 1rem !important;
        transition: all 0.2s ease;
    }
    .dropdown-item:hover {
        background-color: rgba(13,110,253,0.05) !important;
        color: #0d6efd !important;
    }

    /* ===== HAMBURGER ===== */
    .kasb-hamburger { width: 30px; height: 20px; position: relative; cursor: pointer; }
    .kasb-hamburger span {
        display: block;
        position: absolute;
        height: 3px; width: 100%;
        background: #004a99;
        border-radius: 9px;
        transition: .25s ease-in-out;
    }
    .kasb-hamburger span:nth-child(1) { top: 0px; }
    .kasb-hamburger span:nth-child(2) { top: 8px; }
    .kasb-hamburger span:nth-child(3) { top: 16px; }

    /* ===== MOBILE NAV ITEMS ===== */
    .kasb-mob-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        margin-bottom: 4px;
        background: white;
        border: none;
        border-radius: 12px;
        color: #1e293b;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        width: 100%;
        transition: all 0.25s cubic-bezier(0.4,0,0.2,1);
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .kasb-mob-item:hover {
        background: linear-gradient(135deg,#004a99 0%,#0056b3 100%);
        color: white;
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(0,74,153,0.2);
    }
    .kasb-mob-item.active {
        background: linear-gradient(135deg,#004a99 0%,#0056b3 100%);
        color: white;
    }
    .kasb-mob-item i:first-child { font-size: 1.2rem; width: 24px; text-align: center; }
    .kasb-acc-icon { transition: transform 0.3s ease; font-size: 0.9rem; }
    .kasb-mob-item[aria-expanded="true"] .kasb-acc-icon { transform: rotate(180deg); }

    /* ===== MOBILE SUBMENU ===== */
    .kasb-mob-sub {
        padding: 8px 0 12px 0;
        margin-left: 12px;
        border-left: 2px solid #e2e8f0;
    }
    .kasb-mob-sub a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        color: #475569;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.2s ease;
    }
    .kasb-mob-sub a:hover {
        background: #f1f5f9;
        color: #004a99;
        padding-left: 20px;
    }
    .kasb-mob-group { margin-bottom: 4px; }

    /* ===== MISC ===== */
    .letter-spacing-1 { letter-spacing: 1px; }
    .kasb-hover-lift:hover { transform: translateY(-2px); transition: transform 0.2s; }
    .hover-opacity:hover { opacity: 0.85; }
    .offcanvas { font-family: 'Inter', 'Plus Jakarta Sans', sans-serif; }
</style>
