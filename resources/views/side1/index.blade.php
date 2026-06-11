@extends('side1.layout')

@section('content')

{{-- ════════════════════════════════════════════════════
     HERO SLIDER
════════════════════════════════════════════════════ --}}
<style>
    /* ── Hero ── */
    .k1-hero { height: 620px; }
    .k1-hero .swiper-slide { background-size:cover; background-position:center; display:flex; align-items:center; position:relative; }
    .k1-hero .swiper-slide::before { content:''; position:absolute; inset:0; background:linear-gradient(120deg,rgba(6,16,38,0.85) 38%,rgba(6,16,38,0.4)); z-index:1; }
    .k1-hero-content { position:relative; z-index:2; }
    .k1-hero-badge { background:rgba(255,193,7,0.92); color:#1a1a1a; padding:6px 18px; border-radius:50px; display:inline-block; font-weight:700; font-size:0.85rem; margin-bottom:22px; letter-spacing:0.5px; }
    .k1-hero .swiper-pagination-bullet { width:12px; height:12px; background:#fff; opacity:0.5; transition:all 0.3s ease; }
    .k1-hero .swiper-pagination-bullet-active { width:32px; border-radius:20px; background:#ffc107; opacity:1; }
    @media(max-width:768px){ 
        .k1-hero { height: 480px; } 
        .k1-hero-content .btn { font-size: 0.9rem !important; padding: 0.5rem 1rem !important; }
        .k1-hero-content h1 { font-size: 1.8rem !important; }
        .k1-hero-content p { font-size: 0.95rem !important; }
    }
    
    /* ── Scroll Animations ── */
    .k1-animate-on-scroll { opacity: 0; transform: translateY(40px); transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); }
    .k1-animate-on-scroll.k1-visible { opacity: 1; transform: translateY(0); }
    .k1-animate-left { opacity: 0; transform: translateX(-50px); transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); }
    .k1-animate-left.k1-visible { opacity: 1; transform: translateX(0); }
    .k1-animate-right { opacity: 0; transform: translateX(50px); transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); }
    .k1-animate-right.k1-visible { opacity: 1; transform: translateX(0); }
    .k1-animate-scale { opacity: 0; transform: scale(0.9); transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); }
    .k1-animate-scale.k1-visible { opacity: 1; transform: scale(1); }
    
    /* ── Stagger animations ── */
    .k1-stagger-1 { transition-delay: 0.1s; }
    .k1-stagger-2 { transition-delay: 0.2s; }
    .k1-stagger-3 { transition-delay: 0.3s; }
    .k1-stagger-4 { transition-delay: 0.4s; }
    .k1-stagger-5 { transition-delay: 0.5s; }
    .k1-stagger-6 { transition-delay: 0.6s; }
    
    /* ── NGO Service Cards ── */
    .ngo-service-card {
        background: #f0fdf4;
        border: 2px solid #d1fae5;
        transition: all 0.3s ease;
    }
    .ngo-service-icon {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #10b981, #059669);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-size: 1.4rem;
        color: white;
        box-shadow: 0 4px 12px rgba(16,185,129,0.25);
    }
    .ngo-service-title {
        color: #065f46;
        font-size: 1.05rem;
    }
    .ngo-service-desc {
        font-size: 0.88rem;
        line-height: 1.6;
    }
    
    /* ── TRA Service Cards ── */
    .tra-service-card {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(251,146,60,0.2);
        transition: all 0.3s ease;
    }
    .tra-service-icon {
        width: 56px;
        height: 56px;
        background: rgba(251,146,60,0.15);
        border: 2px solid rgba(251,146,60,0.3);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-size: 1.4rem;
        color: #fb923c;
    }
    .tra-service-title {
        color: white;
        font-size: 1.05rem;
    }
    .tra-service-desc {
        font-size: 0.88rem;
        line-height: 1.6;
        opacity: 0.85;
    }
    
    /* ── Interface cards ── */
    .k1-iface-card { border-radius:20px; overflow:hidden; position:relative; height:360px; cursor:pointer; transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
    .k1-iface-card img { width:100%; height:100%; object-fit:cover; transition:transform 0.7s cubic-bezier(0.4, 0, 0.2, 1); }
    .k1-iface-card:hover img { transform:scale(1.1); }
    .k1-iface-card .overlay { position:absolute; inset:0; background:linear-gradient(to top,rgba(4,10,26,0.97) 0%,rgba(4,10,26,0.42) 55%,transparent 100%); transition:all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
    .k1-iface-card:hover .overlay { background:linear-gradient(to top,rgba(4,10,26,0.98) 0%,rgba(4,10,26,0.75) 70%,rgba(4,10,26,0.2) 100%); }
    .k1-iface-card:hover { transform: translateY(-12px); box-shadow: 0 30px 60px rgba(0,0,0,0.3); }
    .k1-iface-card .card-content { position:absolute; bottom:0; left:0; right:0; padding:28px; transition: all 0.4s ease; }
    .k1-iface-card:hover .card-content { transform: translateY(-8px); }
    .k1-iface-card .card-icon { width:50px; height:50px; border-radius:14px; display:flex; align-items:center; justify-content:center; font-size:1.3rem; margin-bottom:14px; transition: all 0.4s ease; }
    .k1-iface-card:hover .card-icon { transform: scale(1.15) rotate(5deg); }
    
    /* ── Service cards ── */
    .k1-svc-card { background:#fff; border:1px solid #f1f5f9; border-radius:16px; padding:24px; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height:100%; position: relative; overflow: hidden; }
    .k1-svc-card::before { content:''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--gold), #e8b84b); transform: scaleX(0); transition: transform 0.4s ease; }
    .k1-svc-card:hover::before { transform: scaleX(1); }
    .k1-svc-card:hover { transform:translateY(-10px); box-shadow:0 25px 60px rgba(201,153,58,0.2); border-color:var(--gold); }
    .k1-svc-icon { width:52px; height:52px; border-radius:14px; display:flex; align-items:center; justify-content:center; margin-bottom:16px; font-size:1.25rem; transition: all 0.4s ease; }
    .k1-svc-card:hover .k1-svc-icon { transform: scale(1.1) rotate(-5deg); }
    
    /* ── Section divider ── */
    .k1-section-divider { height:4px; background:linear-gradient(90deg,var(--gold),transparent); border-radius:2px; width:60px; margin:16px auto 0; }
    
    /* ── Why cards ── */
    .k1-why-card { background:rgba(255,255,255,0.04); border:1px solid rgba(201,153,58,0.12); border-radius:18px; padding:28px; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden; }
    .k1-why-card::before { content:''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(201,153,58,0.1) 0%, transparent 70%); opacity: 0; transition: opacity 0.5s ease; }
    .k1-why-card:hover::before { opacity: 1; }
    .k1-why-card:hover { background:rgba(201,153,58,0.08); border-color:rgba(201,153,58,0.4); transform:translateY(-8px); box-shadow: 0 20px 50px rgba(201,153,58,0.15); }
    
    /* ── Blog cards ── */
    .k1-blog-card { border-radius:16px; overflow:hidden; border:1px solid #f1f5f9; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
    .k1-blog-card:hover { transform:translateY(-10px); box-shadow:0 25px 60px rgba(0,0,0,0.12); }
    .k1-blog-card img { height:200px; object-fit:cover; width:100%; transition:transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
    .k1-blog-card:hover img { transform:scale(1.08); }
    
    /* ── Value cards ── */
    .k1-value-card { background:#fff; border:1px solid #f1f5f9; border-radius:16px; padding:28px 20px; text-align:center; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden; }
    .k1-value-card::after { content:''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, var(--gold), #e8b84b); transform: scaleX(0); transition: transform 0.4s ease; }
    .k1-value-card:hover::after { transform: scaleX(1); }
    .k1-value-card:hover { transform:translateY(-8px); box-shadow:0 20px 50px rgba(201,153,58,0.15); border-color:var(--gold); }
    
    /* ── Teal section overrides ── */
    #why-us .k1-why-card { background:rgba(255,255,255,0.04); border:1px solid rgba(45,212,191,0.14); }
    #why-us .k1-why-card::before { background: radial-gradient(circle, rgba(45,212,191,0.1) 0%, transparent 70%); }
    #why-us .k1-why-card:hover { background:rgba(45,212,191,0.08); border-color:rgba(45,212,191,0.4); transform:translateY(-8px); box-shadow: 0 20px 50px rgba(45,212,191,0.15); }
    
    /* ── Section accent line ── */
    .k1-accent-line { height:3px; background:linear-gradient(90deg,var(--gold),rgba(201,153,58,0)); border-radius:2px; width:48px; margin-top:10px; }
    
    /* ── Hero content animations ── */
    .k1-hero-badge { animation: fadeInDown 0.8s ease-out; }
    .k1-hero h1 { animation: fadeInUp 0.8s ease-out 0.2s both; }
    .k1-hero p { animation: fadeInUp 0.8s ease-out 0.4s both; }
    .k1-hero .btn { animation: fadeInUp 0.8s ease-out 0.6s both; }
    
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
{{-- ═══ HERO ═══ --}}
<div class="swiper k1-hero">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1600&q=80');">
            <div class="container k1-hero-content">
                <div class="col-lg-7 col-md-12">
                    <span class="k1-hero-badge"><i class="bi bi-journal-richtext me-2"></i>Legal Activities</span>
                    <h1 class="display-2 fw-bold text-white mb-4" style="line-height:1.1;font-family:'EB Garamond',serif;">Justice. Clarity. <span style="color:var(--gold);">Results.</span></h1>
                    <p class="lead text-white mb-5" style="opacity:0.85;font-size:1.15rem;">Litigation, arbitration, contract review, immigration law, and full legal representation — approachable, client-centred, and results-driven.</p>
                    <div class="d-flex flex-nowrap gap-2 gap-md-3">
                        <a href="#contact" class="btn btn-lg px-4 px-md-5 rounded-0 fw-bold text-dark shadow flex-1" style="background:var(--gold);">Get a Free Consultation</a>
                        <a href="#legal" class="btn btn-outline-light btn-lg px-4 px-md-5 rounded-0 flex-1">Explore Services</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=1600&q=80');">
            <div class="container k1-hero-content text-center">
                <div class="col-lg-8 col-md-12 mx-auto">
                    <span class="k1-hero-badge"><i class="bi bi-search me-2"></i>Research &amp; Consultancy</span>
                    <h1 class="display-2 fw-bold text-white mb-4" style="line-height:1.1;font-family:'EB Garamond',serif;">Research That <span style="color:var(--gold);">Creates Impact.</span></h1>
                    <p class="lead text-white mb-5" style="opacity:0.85;font-size:1.15rem;">Research writing, proposal development, concept notes, business plans — bridging academic knowledge with real-world results for NGOs, institutions, and researchers.</p>
                    <a href="#contact" class="btn btn-lg px-4 px-md-5 rounded-0 fw-bold text-dark shadow flex-1" style="background:var(--gold);">Submit a Research Request</a>
                </div>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1600&q=80');">
            <div class="container k1-hero-content">
                <div class="col-lg-7 col-md-12 ms-auto text-end">
                    <span class="k1-hero-badge"><i class="bi bi-building-fill me-2"></i>Company Management</span>
                    <h1 class="display-2 fw-bold text-white mb-4" style="line-height:1.1;font-family:'EB Garamond',serif;">Register. Comply. <span style="color:var(--gold);">Thrive.</span></h1>
                    <p class="lead text-white mb-5" style="opacity:0.85;font-size:1.15rem;">BRELA, TIN, NGO/CSO, CRB, microfinance registration, tax compliance and full organizational structuring — all handled expertly from start to finish.</p>
                    <a href="#contact" class="btn btn-lg px-4 px-md-5 rounded-0 fw-bold text-dark shadow flex-1" style="background:var(--gold);">Start Registration Journey</a>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination" style="bottom:28px;"></div>
</div>

{{-- ═══ MOTTO / STATS BAR ═══ --}}
<div style="background:linear-gradient(135deg,#0c1e42 0%,#162c56 100%);border-bottom:1px solid rgba(201,153,58,0.28);">
    <div class="container py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-4 text-center text-lg-start">
                <div style="font-family:'EB Garamond',serif;font-size:1.5rem;font-style:italic;color:var(--gold);">&ldquo;Ora et Labora&rdquo;</div>
                <div style="color:#64748b;font-size:0.78rem;letter-spacing:1px;margin-top:4px;">Work and Pray — Our Guiding Motto</div>
            </div>
            <div class="col-lg-8">
                <div class="row g-3 text-center">
                    @foreach([['500+','Clients Served'],['10+','Years Experience'],['3','Service Areas'],['2','Office Locations']] as $s)
                    <div class="col-6 col-md-3">
                        <div class="fw-bold" style="font-size:2rem;color:var(--gold);line-height:1;font-family:'EB Garamond',serif;">{{ $s[0] }}</div>
                        <div style="color:#64748b;font-size:0.78rem;margin-top:4px;">{{ $s[1] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══ VISION & MISSION ═══ --}}
<section class="py-5 position-relative overflow-hidden k1-animate-on-scroll" style="background:linear-gradient(160deg,#091730 0%,#0f2246 60%,#152a52 100%);">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-eye me-2"></i>Our Purpose</span>
            <h2 class="display-4 fw-bold text-white mt-2">Vision &amp; Mission</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 col-md-12 k1-animate-left k1-stagger-1">
                <div class="p-4 p-lg-5 rounded-4 h-100" style="background:rgba(201,153,58,0.07);border:1px solid rgba(201,153,58,0.2);">
                    <div style="width:56px;height:56px;background:linear-gradient(135deg,var(--gold),#a07825);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:white;margin-bottom:20px;">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h3 class="fw-bold text-white mb-3">Our Vision</h3>
                    <p style="color:#94a3b8;font-size:1.05rem;line-height:1.85;font-family:'EB Garamond',serif;">To be the most trusted and impactful consultancy firm in East Africa, known for transforming individuals, organizations, and communities through excellence in legal services, research, and corporate governance.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 k1-animate-right k1-stagger-2">
                <div class="p-4 p-lg-5 rounded-4 h-100" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);">
                    <div style="width:56px;height:56px;background:linear-gradient(135deg,#1d4ed8,#3b82f6);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:white;margin-bottom:20px;">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h3 class="fw-bold text-white mb-3">Our Mission</h3>
                    <p style="color:#94a3b8;font-size:1.05rem;line-height:1.85;font-family:'EB Garamond',serif;">To provide exceptional, approachable, and client-centred services in legal affairs, research consultancy, and organizational management — empowering our clients with integrity, innovation, and lasting impact.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ CORE VALUES ═══ --}}
<section class="py-5" style="background:#f8f5ef;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-star me-2"></i>Our Foundation</span>
            <h2 class="display-4 fw-bold mt-2">Core Values</h2>
            <div class="k1-section-divider mx-auto"></div>
        </div>
        <div class="row g-4">
            @foreach($values as $v)
            <div class="col-lg-4 col-md-6">
                <div class="k1-value-card">
                    <div style="width:58px;height:58px;background:{{ $v['bg'] }};border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;color:{{ $v['color'] }};margin:0 auto 16px;border:1px solid {{ $v['bg'] }};">
                        <i class="bi {{ $v['icon'] }}"></i>
                    </div>
                    <h5 class="fw-bold mb-2">{{ $v['title'] }}</h5>
                    <p class="text-secondary mb-0" style="font-size:0.9rem;line-height:1.7;">{{ $v['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ 3 INTERFACE OVERVIEW CARDS ═══ --}}
<section class="py-5 bg-white k1-animate-on-scroll">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-grid-fill me-2"></i>Our Expertise</span>
            <h2 class="display-4 fw-bold mt-2">Three Pillars of Service</h2>
            <p class="text-secondary mx-auto mt-3" style="max-width:580px;">Click to explore each area of specialisation in depth.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 k1-animate-scale k1-stagger-1">
                <a href="#legal" class="text-decoration-none">
                    <div class="k1-iface-card">
                        <img src="https://images.unsplash.com/photo-1575505586569-646b2ca898fc?w=800&q=80" alt="Legal">
                        <div class="overlay"></div>
                        <div class="card-content">
                            <div class="card-icon" style="background:rgba(201,153,58,0.25);border:1px solid rgba(201,153,58,0.4);color:var(--gold);"><i class="bi bi-journal-richtext"></i></div>
                            <h4 class="text-white fw-bold mb-2" style="font-family:'EB Garamond',serif;">Legal Activities</h4>
                            <p style="color:rgba(255,255,255,0.7);font-size:0.88rem;margin-bottom:12px;">Litigation · Mediation · Arbitration · Immigration · Family Law · Criminal Defence</p>
                            <span style="color:var(--gold);font-size:0.82rem;font-weight:700;">7 Services &rarr;</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 k1-animate-scale k1-stagger-2">
                <a href="#research" class="text-decoration-none">
                    <div class="k1-iface-card">
                        <img src="https://images.unsplash.com/photo-1532619675605-1ede6c2ed2b0?w=800&q=80" alt="Research">
                        <div class="overlay"></div>
                        <div class="card-content">
                            <div class="card-icon" style="background:rgba(13,148,136,0.25);border:1px solid rgba(13,148,136,0.4);color:#2dd4bf;"><i class="bi bi-search"></i></div>
                            <h4 class="text-white fw-bold mb-2" style="font-family:'EB Garamond',serif;">Research &amp; Consultancy</h4>
                            <p style="color:rgba(255,255,255,0.7);font-size:0.88rem;margin-bottom:12px;">Research Writing · Proposals · Concept Notes · Business Plans · Synopsis</p>
                            <span style="color:#2dd4bf;font-size:0.82rem;font-weight:700;">5 Services &rarr;</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 k1-animate-scale k1-stagger-3">
                <a href="#company" class="text-decoration-none">
                    <div class="k1-iface-card">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80" alt="Company">
                        <div class="overlay"></div>
                        <div class="card-content">
                            <div class="card-icon" style="background:rgba(29,78,216,0.25);border:1px solid rgba(29,78,216,0.4);color:#60a5fa;"><i class="bi bi-building-fill"></i></div>
                            <h4 class="text-white fw-bold mb-2" style="font-family:'EB Garamond',serif;">Company &amp; Org. Management</h4>
                            <p style="color:rgba(255,255,255,0.7);font-size:0.88rem;margin-bottom:12px;">BRELA · NGO/CSO · Tax Compliance · Microfinance · Org. Structuring</p>
                            <span style="color:#60a5fa;font-size:0.82rem;font-weight:700;">6 Services &rarr;</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ═══ INTERFACE 1: LEGAL ACTIVITIES ═══ --}}
<section id="legal" class="py-5 position-relative overflow-hidden k1-animate-on-scroll" style="background:linear-gradient(155deg,#0a1c38 0%,#112644 60%,#0e2040 100%);"><div style="position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,0.04) 1px,transparent 1px);background-size:22px 22px;pointer-events:none;"></div>
    <div class="container py-4">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-7 col-md-12 k1-animate-left k1-stagger-1">
                <span class="k1-section-badge"><i class="bi bi-journal-richtext me-2"></i>Interface One</span>
                <h2 class="display-4 fw-bold text-white mt-2 mb-3" style="font-family:'EB Garamond',serif;">Legal <span style="color:var(--gold);">Activities</span></h2>
                <p style="color:#94a3b8;font-size:1.05rem;line-height:1.85;max-width:560px;">Our legal team combines deep expertise with an approachable, client-centred philosophy. Whether you face a courtroom dispute, need a contract reviewed, or require immigration guidance — we are your dedicated legal partner.</p>
            </div>
            <div class="col-lg-5 col-md-12 k1-animate-right k1-stagger-2">
                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=700&q=80" alt="Legal" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
        <div class="row g-4">
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="#contact" class="btn btn-lg rounded-0 px-5 fw-bold text-dark" style="background:var(--gold);">Request Legal Support <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- ═══ ADDITIONAL LEGAL PRACTICE AREAS ═══ --}}
<section class="py-5 bg-white k1-animate-on-scroll">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="k1-section-badge" style="background:rgba(201,153,58,0.1);border-color:rgba(201,153,58,0.3);color:var(--gold);"><i class="bi bi-list-check me-2"></i>Comprehensive Legal Coverage</span>
            <h2 class="display-4 fw-bold mt-2" style="font-family:'EB Garamond',serif;">Full Spectrum <span style="color:var(--gold);">Legal Services</span></h2>
            <p class="text-secondary mx-auto mt-3" style="max-width:680px;">From aviation to telecommunications, we provide expert legal counsel across all major sectors and practice areas.</p>
        </div>
        <div class="row g-4">
            @foreach($additionalLegal as $i => $al)
            <div class="col-lg-3 col-md-4 col-sm-6 k1-animate-scale k1-stagger-{{ $i + 2 > 5 ? 5 : $i + 2 }}">
                <div class="p-4 rounded-3 h-100 text-center" style="background:#f8f9fa;border:1px solid #e9ecef;transition:all 0.3s ease;">
                    <div style="width:52px;height:52px;background:var(--gold);border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:1.3rem;color:white;">
                        <i class="bi {{ $al['icon'] }}"></i>
                    </div>
                    <h6 class="fw-bold mb-2" style="color:#1a202c;font-size:0.95rem;">{{ $al['title'] }}</h6>
                    <p class="text-secondary mb-0" style="font-size:0.8rem;line-height:1.5;">{{ $al['desc'] }}</p>
                </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row g-4">
                    <div class="k1-svc-icon" style="background:{{ $sv['bg'] }};color:{{ $sv['color'] }};">
                        <i class="bi {{ $sv['icon'] }}"></i>
                    </div>
                    <h5 class="fw-bold mb-2">{{ $sv['title'] }}</h5>
                    <p class="text-secondary mb-3" style="font-size:0.9rem;line-height:1.7;">{{ $sv['desc'] }}</p>
                    <a href="#contact" class="text-decoration-none fw-bold small" style="color:#0d9488;">Get Started <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="#contact" class="btn btn-lg rounded-0 px-5 fw-bold text-white" style="background:#0d9488;">Submit Research Request <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- ═══ INTERFACE 3: COMPANY & ORG MANAGEMENT ═══ --}}
<section id="company" class="py-5 position-relative overflow-hidden k1-animate-on-scroll" style="background:linear-gradient(135deg,#0f2248 0%,#1a3268 60%,#122050 100%);"><div style="position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,0.04) 1px,transparent 1px);background-size:22px 22px;pointer-events:none;"></div>
    <div class="container py-4">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-7 col-md-12 k1-animate-left k1-stagger-1">
                <span class="k1-section-badge" style="background:rgba(29,78,216,0.15);border-color:rgba(29,78,216,0.3);color:#60a5fa;"><i class="bi bi-building-fill me-2"></i>Interface Three</span>
                <h2 class="display-4 fw-bold text-white mt-2 mb-3" style="font-family:'EB Garamond',serif;">Company &amp; Organization <span style="color:#60a5fa;">Management</span></h2>
                <p style="color:#94a3b8;font-size:1.05rem;line-height:1.85;max-width:580px;">We are your trusted partner for building compliant, well-structured organizations. From the first registration to full operational compliance — we handle the complexity so you can focus on growth.</p>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    @foreach(['Startups','Joint Ventures','NGOs','Tourism Operators','Agribusinesses','Govt. Institutions'] as $cl)
                    <span class="badge rounded-0 px-3 py-2" style="background:rgba(29,78,216,0.15);color:#60a5fa;border:1px solid rgba(29,78,216,0.25);font-size:0.78rem;">{{ $cl }}</span>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 col-md-12 k1-animate-right k1-stagger-2">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=700&q=80" alt="Company" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
        <div class="row g-4">
            @foreach($ngoServices as $i => $ng)
                    <div class="ngo-service-icon">
                        <i class="bi {{ $ng['icon'] }}"></i>
                    </div>
                    <h5 class="fw-bold mb-2 text-center ngo-service-title">{{ $ng['title'] }}</h5>
                    <p class="text-secondary mb-0 text-center ngo-service-desc">{{ $ng['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
        <div class="text-center mb-5">
            <span class="k1-section-badge" style="background:rgba(251,146,60,0.15);border-color:rgba(251,146,60,0.3);color:#fb923c;"><i class="bi bi-receipt me-2"></i>Tax Compliance</span>
            <h2 class="display-4 fw-bold mt-2 text-white" style="font-family:'EB Garamond',serif;">TRA <span style="color:#fb923c;">Compliance Services</span></h2>
            <p style="color:#cbd5e1;font-size:1.05rem;line-height:1.85;max-width:680px;margin:16px auto 0;">Complete tax registration and compliance services with Tanzania Revenue Authority for individuals and businesses.</p>
        </div>
        <div class="row g-4">
            @foreach(['TIN Registration','VAT Registration','Tax Returns Filling'] as $i => $ts)
            <?php
                    <div class="tra-service-icon">
                        <i class="bi {{ $traIcons[$i] }}"></i>
                    </div>
                    <h5 class="fw-bold mb-2 tra-service-title">{{ $ts }}</h5>
                    <p class="tra-service-desc">{{ $traDescs[$i] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="#contact" class="btn btn-lg rounded-0 px-5 fw-bold text-white" style="background:#fb923c;">Get TRA Compliance Help <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- ═══ COMPANY PROFILE VISUAL ═══ --}}
<section class="py-5 overflow-hidden position-relative k1-animate-on-scroll" style="background:linear-gradient(140deg,#1e1300 0%,#2e1e06 45%,#1a1102 100%);">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background-image:linear-gradient(rgba(201,153,58,0.07) 1px,transparent 1px),linear-gradient(90deg,rgba(201,153,58,0.07) 1px,transparent 1px);background-size:38px 38px;pointer-events:none;"></div>
    <div style="position:absolute;top:-100px;right:-100px;width:460px;height:460px;background:radial-gradient(circle,rgba(201,153,58,0.28),transparent);border-radius:50%;filter:blur(60px);pointer-events:none;"></div>
    <div class="container py-4 position-relative" style="z-index:1;">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-card-text me-2"></i>About Us</span>
            <h2 class="display-4 fw-bold text-white mt-2">Company <span style="color:var(--gold);">Profile</span></h2>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-5 col-md-12 k1-animate-left k1-stagger-1">
                <div class="p-4 p-lg-5 rounded-4 h-100 d-flex flex-column justify-content-center" style="background:rgba(201,153,58,0.07);border:1px solid rgba(201,153,58,0.2);">
                    <div class="mb-4">
                        <div style="font-family:'EB Garamond',serif;font-size:2.2rem;font-weight:700;color:white;line-height:1.1;">Kasimbagu</div>
                            <div style="color:#64748b;font-size:0.75rem;">Clients</div>
                        </div>
                        <div class="text-center">
                            <div style="font-size:1.8rem;font-weight:700;color:var(--gold);font-family:'EB Garamond',serif;">2</div>
                            <div style="color:#64748b;font-size:0.75rem;">Offices</div>
                        </div>
                        <div class="text-center">
                            <div style="font-size:1.8rem;font-weight:700;color:var(--gold);font-family:'EB Garamond',serif;">18</div>
                            <div style="color:#64748b;font-size:0.75rem;">Services</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 k1-animate-right k1-stagger-2">
                <div class="row g-3 h-100">
                    <div class="col-6 col-md-6 k1-animate-scale k1-stagger-3">
                        <div class="p-4 rounded-4 h-100" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);">
                            <div style="color:var(--gold);font-size:1.5rem;margin-bottom:12px;"><i class="bi bi-building-fill"></i></div>
                            <div style="color:#94a3b8;font-size:0.75rem;letter-spacing:1px;text-transform:uppercase;font-weight:700;margin-bottom:8px;">Head Office</div>
                            <div class="text-white fw-bold mb-1">Dar es Salaam</div>
                            <div style="color:#64748b;font-size:0.83rem;">Tanzania</div>
                            <a href="tel:+255690075672" class="d-block mt-2 text-decoration-none" style="color:var(--gold);font-size:0.83rem;">+255 690 075 672</a>
                        </div>
                    </div>
                        <div class="p-4 rounded-4" style="background:rgba(201,153,58,0.05);border:1px solid rgba(201,153,58,0.15);">
                            <div style="color:#94a3b8;font-size:0.75rem;letter-spacing:1px;text-transform:uppercase;font-weight:700;margin-bottom:12px;">Areas of Practice</div>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach(['Legal Activities','Research Writing','Proposal Development','Company Registration','NGO/CSO Setup','Tax Compliance','Immigration Law','Arbitration','Business Plans','Org. Structuring'] as $area)
                                <span class="badge rounded-0 px-3 py-2" style="background:rgba(201,153,58,0.12);color:var(--gold);border:1px solid rgba(201,153,58,0.2);font-size:0.75rem;">{{ $area }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ WHY CHOOSE US ═══ --}}
<section id="why-us" class="py-5 position-relative overflow-hidden" style="background:linear-gradient(140deg,#061d1a 0%,#0c2c26 50%,#0a231e 100%);">
    <div style="position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,0.04) 1px,transparent 1px);background-size:22px 22px;pointer-events:none;"></div>
    <div style="position:absolute;top:-80px;left:-100px;width:420px;height:420px;background:radial-gradient(circle,rgba(45,212,191,0.18),transparent);border-radius:50%;filter:blur(70px);pointer-events:none;"></div>
    <div style="position:absolute;bottom:-60px;right:-80px;width:380px;height:380px;background:radial-gradient(circle,rgba(16,185,129,0.18),transparent);border-radius:50%;filter:blur(70px);pointer-events:none;"></div>
    <div class="container py-4 position-relative" style="z-index:1;">
        <div class="text-center mb-5">
            <span class="k1-section-badge" style="background:rgba(13,148,136,0.18);border-color:rgba(45,212,191,0.4);color:#2dd4bf;"><i class="bi bi-patch-check me-2"></i>Why Us</span>
            <h2 class="display-4 fw-bold text-white mt-2" style="font-family:'EB Garamond',serif;">The Kasimbagu <span style="color:#2dd4bf;">Advantage</span></h2>
            <p style="color:#94a3b8;margin:12px auto 0;max-width:550px;">Not just consultants — we are committed partners dedicated to your success.</p>
        </div>
        <div class="row g-4">
            <?php
            $whys = [
                ['icon'=>'bi-person-hearts','grad'=>'linear-gradient(135deg,#c9993a,#a07825)','title'=>'Approachable &amp; Client-Centered','desc'=>'We listen first. Every service is tailored to your unique situation — no generic answers, no one-size-fits-all solutions.'],
                ['icon'=>'bi-shield-fill-check','grad'=>'linear-gradient(135deg,#1d4ed8,#3b82f6)','title'=>'Integrity &amp; Trust','desc'=>'Complete honesty in every engagement. No hidden costs. No over-promising. Just transparent, reliable service.'],
                ['icon'=>'bi-lightning-charge-fill','grad'=>'linear-gradient(135deg,#d97706,#fbbf24)','title'=>'Speed &amp; Efficiency','desc'=>'Responses within 24 hours. Fast-tracked processing. We understand that time is critical for your goals.'],
                ['icon'=>'bi-globe2','grad'=>'linear-gradient(135deg,#047857,#10b981)','title'=>'Cross-Sector Experience','desc'=>'We have served clients across legal, academic, NGO, private sector, government, and development domains in East Africa.'],
                ['icon'=>'bi-graph-up-arrow','grad'=>'linear-gradient(135deg,#7c3aed,#a78bfa)','title'=>'Measurable Impact','desc'=>'We measure our success by yours — tracking outcomes, client growth, and the real-world impact of every engagement.'],
            ];
            ?>
            @foreach($whys as $w)
            <div class="col-lg-6 col-md-12 {{ $loop->last && $loop->count % 2 !== 0 ? 'col-lg-12' : '' }}">
                <div class="k1-why-card d-flex gap-4">
                    <div style="width:54px;height:54px;background:{{ $w['grad'] }};border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.3rem;color:white;box-shadow:0 8px 24px rgba(0,0,0,0.3);">
                        <i class="bi {{ $w['icon'] }}"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-white mb-2">{!! $w['title'] !!}</h5>
                        <p style="color:#94a3b8;font-size:0.9rem;line-height:1.75;margin:0;">{{ $w['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ TESTIMONIALS ═══ --}}
<section class="py-5" style="background:#f8f5ef;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-chat-quote me-2"></i>Client Voices</span>
            <h2 class="display-4 fw-bold mt-2" style="font-family:'EB Garamond',serif;">What Our Clients Say</h2>
        </div>
        <div class="swiper k1-testi pb-5">
            <div class="swiper-wrapper">
                <?php
                $testi = [
                    ['q'=>'Kasimbagu handled our company registration from BRELA to TIN to business license in record time. Professional, fast, and completely transparent. Highly recommended!','name'=>'Juma Mwangi','role'=>'CEO, Mwangi Enterprises, Dar es Salaam','init'=>'JM'],
                    ['q'=>'Our NGO proposal was successfully funded after Kasimbagu rewrote it. The quality of their research writing is truly exceptional. They understood our vision completely.','name'=>'Sarah Okonkwo','role'=>'Executive Director, SafeHands NGO','init'=>'SO'],
                    ['q'=>'I faced a complex land conflict that had dragged on for 3 years. Kasimbagu resolved it through mediation in 6 weeks. I cannot express my gratitude enough.','name'=>'Abdallah Hassan','role'=>'Client, Moshi, Kilimanjaro','init'=>'AH'],
                    ['q'=>'Their immigration law team got my work permit approved in two weeks — other firms said it would take months. Kasimbagu delivers on their promises.','name'=>'Chen Wei','role'=>'Business Investor, Dar es Salaam','init'=>'CW'],
                ];
                ?>
                @foreach($testi as $t)
                <div class="swiper-slide">
                    <div class="p-4 p-md-5 rounded-4 shadow-sm mx-2 h-100" style="background:white;border:1px solid #e8d9b8;">
                        <div style="color:var(--gold);font-size:3.5rem;line-height:1;font-family:'EB Garamond',serif;">&ldquo;</div>
                        <p style="font-size:1.05rem;line-height:1.85;color:#334155;font-family:'EB Garamond',serif;">{{ $t['q'] }}</p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <div style="width:48px;height:48px;background:linear-gradient(135deg,var(--gold),#a07825);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-weight:700;flex-shrink:0;font-family:'EB Garamond',serif;">{{ $t['init'] }}</div>
                            <div>
                                <div class="fw-bold" style="color:#1a202c;">{{ $t['name'] }}</div>
                                <div class="small text-secondary">{{ $t['role'] }}</div>
                            </div>
                            <div class="ms-auto" style="color:var(--gold);">
                                @for($i=0;$i<5;$i++) <i class="bi bi-star-fill"></i> @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination" style="bottom:0;"></div>
        </div>
    </div>
</section>

{{-- ═══ BLOG / INSIGHTS ═══ --}}
<section id="blog" class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-end mb-5">
            <div class="col-lg-7 col-md-12">
                <span class="k1-section-badge"><i class="bi bi-newspaper me-2"></i>Insights</span>
                <h2 class="display-4 fw-bold mt-2">Blog &amp; <span style="color:var(--gold);">Updates</span></h2>
                <p class="text-secondary mt-3">Latest insights on Tanzanian law, business compliance, and research trends.</p>
            </div>
            <div class="col-lg-5 col-md-12 text-lg-end text-center mt-3 mt-lg-0">
                <a href="{{ route('blog.index') }}" class="btn btn-lg rounded-0 px-5 fw-bold text-dark" style="background:var(--gold);">View All Blogs</a>
            </div>
                    </div>
                    <div class="p-4">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge rounded-0 px-2 py-1" style="background:rgba(201,153,58,0.1);color:var(--gold);font-size:0.72rem;">{{ $blog->category }}</span>
                            <span class="text-secondary small">{{ $blog->published_at ? $blog->published_at->format('M Y') : '' }}</span>
                        </div>
                        <h5 class="fw-bold mb-2" style="font-family:'EB Garamond',serif;font-size:1.15rem;line-height:1.4;">{{ $blog->title }}</h5>
                        <p class="text-secondary mb-3" style="font-size:0.88rem;line-height:1.7;">{{ Str::limit($blog->excerpt, 100) }}</p>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="fw-bold text-decoration-none small" style="color:var(--gold);">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-secondary">No blog posts available yet.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ═══ EVENTS ═══ --}}
<section id="events" class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-end mb-5">
            <div class="col-lg-7 col-md-12">
                <span class="k1-section-badge"><i class="bi bi-calendar-event me-2"></i>Events</span>
                <h2 class="display-4 fw-bold mt-2">Upcoming <span style="color:var(--gold);">Events</span></h2>
                <p class="text-secondary mt-3">Join us for workshops, seminars, and networking events.</p>
            </div>
            <div class="col-lg-5 col-md-12 text-lg-end text-center mt-3 mt-lg-0">
                <a href="{{ route('events.index') }}" class="btn btn-lg rounded-0 px-5 fw-bold text-dark" style="background:var(--gold);">View All Events</a>
            </div>
                ->get();
            ?>
            @forelse($upcomingEvents as $event)
            <div class="col-lg-4 col-md-6">
                <div class="k1-blog-card">
                    <div style="overflow:hidden;">
                        @if($event->image)
                        <img src="{{ $event->image }}" alt="{{ $event->title }}">
                        @else
                        <div style="height: 200px; background: linear-gradient(135deg, #0a1c38, #162c56); display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-calendar-event text-white" style="font-size: 3rem; opacity: 0.5;"></i>
                        </div>
                        @endif
                        </div>
                        <h5 class="fw-bold mb-2" style="font-family:'EB Garamond',serif;font-size:1.15rem;line-height:1.4;">{{ $event->title }}</h5>
                        <p class="text-secondary mb-3" style="font-size:0.88rem;line-height:1.7;"><i class="bi bi-geo-alt me-1"></i>{{ $event->location }}</p>
                        <a href="{{ route('events.show', $event->slug) }}" class="fw-bold text-decoration-none small" style="color:var(--gold);">View Details <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-secondary">No upcoming events scheduled.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ═══ CONTACT ═══ --}}
<section id="contact" class="py-5" style="background:#f8f5ef;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-envelope me-2"></i>Reach Out</span>
            <h2 class="display-4 fw-bold mt-2" style="font-family:'EB Garamond',serif;">Book a <span style="color:var(--gold);">Consultation</span></h2>
        </div>
        <div class="row g-5 align-items-start">
            <div class="col-lg-5 col-md-12">
                <h5 class="fw-bold mb-4">Our Offices</h5>
                        </div>
                    </div>
                    <div class="p-4 rounded-4" style="background:white;border:1px solid #e8d9b8;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width:44px;height:44px;background:linear-gradient(135deg,#1d4ed8,#3b82f6);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-building text-white"></i></div>
                            <div><div class="fw-bold" style="color:#1a202c;">Branch Office</div><div class="text-secondary small">Moshi, Kilimanjaro, Tanzania</div></div>
                        </div>
                        <div class="d-flex flex-column gap-2 ms-1" style="font-size:0.88rem;">
                            <a href="tel:+255653291058" class="text-decoration-none text-dark d-flex gap-2"><i class="bi bi-telephone-fill" style="color:#1d4ed8;"></i>+255 653 291 058</a>
                            <a href="mailto:moshi@kasimbagu.com" class="text-decoration-none text-dark d-flex gap-2"><i class="bi bi-envelope-fill" style="color:#1d4ed8;"></i>moshi@kasimbagu.com</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <a href="https://wa.me/255653291058" class="btn btn-success rounded-0 px-4 fw-semibold"><i class="bi bi-whatsapp me-2"></i>WhatsApp Us</a>
                    <a href="#" class="btn btn-outline-secondary rounded-0 px-4 fw-semibold"><i class="bi bi-linkedin me-2"></i>LinkedIn</a>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="p-4 p-md-5 rounded-4 bg-white shadow-sm" style="border:1px solid #e8d9b8;">
                    <h5 class="fw-bold mb-4" style="font-family:'EB Garamond',serif;font-size:1.4rem;">Send Us a Message</h5>
                    <form id="consultancyContactForm" action="{{ route('inquiry.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Full Name</label>
                                <input type="text" name="name" class="form-control rounded-3 py-3 border-0 bg-light text-dark" placeholder="Your full name" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Phone / WhatsApp</label>
                                <input type="text" name="phone" class="form-control rounded-3 py-3 border-0 bg-light text-dark" placeholder="+255 690 075 672">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-3 py-3 border-0 bg-light text-dark" placeholder="your@email.com" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Service Required</label>
                                <select name="service" class="form-select rounded-3 py-3 border-0 bg-light text-dark" required>
                                    <option value="">Select service area...</option>
                                    <optgroup label="Legal Activities">
                                        <option>Litigation &amp; Mediation</option>
                                        <option>Arbitration</option>
                                        <option>Contract Review</option>
                                        <option>Immigration Law</option>
                                        <option>Family Law</option>
                                        <option>Criminal Defence</option>
                                    </optgroup>
                                    <optgroup label="Research &amp; Consultancy">
                                        <option>Research Writing</option>
                                        <option>Proposal Writing</option>
                                        <option>Business Plan</option>
                                        <option>Concept Note</option>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Preferred Office</label>
                                <select name="destination" class="form-select rounded-3 py-3 border-0 bg-light text-dark">
                                    <option value="">Any office</option>
                                    <option>Dar es Salaam (Head Office)</option>
                                    <option>Moshi, Kilimanjaro (Branch)</option>
                                    <option>Online / Remote</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Your Message</label>
                                <textarea name="message" class="form-control rounded-3 border-0 bg-light text-dark" rows="4" placeholder="Describe your case, project, or inquiry..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg w-100 rounded-0 fw-bold py-3 text-dark shadow-sm" style="background:var(--gold);border-color:var(--gold);">
                                    <i class="bi bi-send-fill me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    new Swiper('.k1-hero', {
        effect: 'fade',
        loop: true,
        autoplay: { delay: 6000, disableOnInteraction: false },
        pagination: { el: '.k1-hero .swiper-pagination', clickable: true },
    });
    new Swiper('.k1-testi', {
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        pagination: { el: '.k1-testi .swiper-pagination', clickable: true },
        slidesPerView: 1,
        spaceBetween: 24,
        breakpoints: { 768: { slidesPerView: 2 } },
    });

    // Consultancy Form Submission via AJAX
    document.getElementById('consultancyContactForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const origBtnText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending Message...';

        fetch("{{ route('inquiry.submit') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not OK');
            }
            return response.json();
        })
        .then(data => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = origBtnText;
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Message Sent!',
                    text: data.message,
                    confirmButtonColor: '#c9993a'
                });
                document.getElementById('consultancyContactForm').reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to Send',
                    text: 'Something went wrong. Please try again.',
                    confirmButtonColor: '#c9993a'
                });
            }
        })
        .catch(err => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = origBtnText;
            Swal.fire({
                icon: 'error',
                title: 'Error Occurred',
                text: 'Please check your connection and try again.',
                confirmButtonColor: '#c9993a'
            });
        });
    });

    // Fallback traditional session success check
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Message Sent!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#c9993a'
    });
    @endif

    // Scroll Animation Observer
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('k1-visible');
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('.k1-animate-on-scroll, .k1-animate-left, .k1-animate-right, .k1-animate-scale').forEach(el => {
        observer.observe(el);
    });
</script>
@endsection
