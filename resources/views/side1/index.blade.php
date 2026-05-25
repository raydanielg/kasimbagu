@extends('side1.layout')

@section('content')

{{-- ════════════════════════════════════════════════════
     HERO SLIDER
════════════════════════════════════════════════════ --}}
<style>
    /* ── Hero ── */
    .k1-hero { height: 860px; }
    .k1-hero .swiper-slide { background-size:cover; background-position:center; display:flex; align-items:center; position:relative; }
    .k1-hero .swiper-slide::before { content:''; position:absolute; inset:0; background:linear-gradient(120deg,rgba(6,16,38,0.93) 38%,rgba(6,16,38,0.28)); z-index:1; }
    .k1-hero-content { position:relative; z-index:2; }
    .k1-hero-badge { background:rgba(201,153,58,0.18); border:1px solid rgba(201,153,58,0.4); color:#e8c97a; padding:6px 18px; border-radius:50px; display:inline-block; font-size:0.75rem; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; margin-bottom:20px; }
    .k1-hero .swiper-pagination-bullet { width:10px; height:10px; background:rgba(255,255,255,0.4); }
    .k1-hero .swiper-pagination-bullet-active { width:30px; border-radius:20px; background:var(--gold); opacity:1; }
    @media(max-width:768px){ .k1-hero { height:560px; } }
    /* ── Interface cards ── */
    .k1-iface-card { border-radius:20px; overflow:hidden; position:relative; height:360px; cursor:pointer; }
    .k1-iface-card img { width:100%; height:100%; object-fit:cover; transition:transform 0.6s ease; }
    .k1-iface-card:hover img { transform:scale(1.06); }
    .k1-iface-card .overlay { position:absolute; inset:0; background:linear-gradient(to top,rgba(4,10,26,0.97) 0%,rgba(4,10,26,0.42) 55%,transparent 100%); transition:all 0.4s; }
    .k1-iface-card:hover .overlay { background:linear-gradient(to top,rgba(4,10,26,0.98) 0%,rgba(4,10,26,0.65) 70%,rgba(4,10,26,0.1) 100%); }
    .k1-iface-card .card-content { position:absolute; bottom:0; left:0; right:0; padding:28px; }
    .k1-iface-card .card-icon { width:50px; height:50px; border-radius:14px; display:flex; align-items:center; justify-content:center; font-size:1.3rem; margin-bottom:14px; }
    /* ── Service cards ── */
    .k1-svc-card { background:#fff; border:1px solid #f1f5f9; border-radius:16px; padding:24px; transition:all 0.3s ease; height:100%; }
    .k1-svc-card:hover { transform:translateY(-6px); box-shadow:0 20px 50px rgba(0,0,0,0.1); border-color:var(--gold); }
    .k1-svc-icon { width:52px; height:52px; border-radius:14px; display:flex; align-items:center; justify-content:center; margin-bottom:16px; font-size:1.25rem; }
    /* ── Section divider ── */
    .k1-section-divider { height:4px; background:linear-gradient(90deg,var(--gold),transparent); border-radius:2px; width:60px; margin:16px auto 0; }
    /* ── Why cards ── */
    .k1-why-card { background:rgba(255,255,255,0.04); border:1px solid rgba(201,153,58,0.12); border-radius:18px; padding:28px; transition:all 0.3s; }
    .k1-why-card:hover { background:rgba(201,153,58,0.06); border-color:rgba(201,153,58,0.3); transform:translateY(-5px); }
    /* ── Blog cards ── */
    .k1-blog-card { border-radius:16px; overflow:hidden; border:1px solid #f1f5f9; transition:all 0.3s; }
    .k1-blog-card:hover { transform:translateY(-6px); box-shadow:0 20px 50px rgba(0,0,0,0.1); }
    .k1-blog-card img { height:200px; object-fit:cover; width:100%; transition:transform 0.5s; }
    .k1-blog-card:hover img { transform:scale(1.04); }
    /* ── Value cards ── */
    .k1-value-card { background:#fff; border:1px solid #f1f5f9; border-radius:16px; padding:28px 20px; text-align:center; transition:all 0.3s; }
    .k1-value-card:hover { transform:translateY(-5px); box-shadow:0 15px 40px rgba(0,0,0,0.08); border-color:var(--gold); }
    /* ── Teal section overrides ── */
    #why-us .k1-why-card { background:rgba(255,255,255,0.04); border:1px solid rgba(45,212,191,0.14); }
    #why-us .k1-why-card:hover { background:rgba(45,212,191,0.07); border-color:rgba(45,212,191,0.32); transform:translateY(-5px); }
    /* ── Section accent line ── */
    .k1-accent-line { height:3px; background:linear-gradient(90deg,var(--gold),rgba(201,153,58,0)); border-radius:2px; width:48px; margin-top:10px; }
</style>
{{-- ═══ HERO ═══ --}}
<div class="swiper k1-hero">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1600&q=80');">
            <div class="container k1-hero-content">
                <div class="col-lg-7">
                    <span class="k1-hero-badge"><i class="bi bi-journal-richtext me-2"></i>Legal Activities</span>
                    <h1 class="display-2 fw-bold text-white mb-4" style="line-height:1.1;font-family:'EB Garamond',serif;">Justice. Clarity. <span style="color:var(--gold);">Results.</span></h1>
                    <p class="lead text-white mb-5" style="opacity:0.85;font-size:1.15rem;">Litigation, arbitration, contract review, immigration law, and full legal representation — approachable, client-centred, and results-driven.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#contact" class="btn btn-lg px-5 rounded-pill fw-bold text-dark shadow" style="background:var(--gold);">Get a Free Consultation</a>
                        <a href="#legal" class="btn btn-outline-light btn-lg px-5 rounded-pill">Explore Services</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=1600&q=80');">
            <div class="container k1-hero-content text-center">
                <div class="col-lg-8 mx-auto">
                    <span class="k1-hero-badge"><i class="bi bi-search me-2"></i>Research &amp; Consultancy</span>
                    <h1 class="display-2 fw-bold text-white mb-4" style="line-height:1.1;font-family:'EB Garamond',serif;">Research That <span style="color:var(--gold);">Creates Impact.</span></h1>
                    <p class="lead text-white mb-5" style="opacity:0.85;font-size:1.15rem;">Research writing, proposal development, concept notes, business plans — bridging academic knowledge with real-world results for NGOs, institutions, and researchers.</p>
                    <a href="#contact" class="btn btn-lg px-5 rounded-pill fw-bold text-dark" style="background:var(--gold);">Submit a Research Request</a>
                </div>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1600&q=80');">
            <div class="container k1-hero-content">
                <div class="col-lg-7 ms-auto text-end">
                    <span class="k1-hero-badge"><i class="bi bi-building-fill me-2"></i>Company Management</span>
                    <h1 class="display-2 fw-bold text-white mb-4" style="line-height:1.1;font-family:'EB Garamond',serif;">Register. Comply. <span style="color:var(--gold);">Thrive.</span></h1>
                    <p class="lead text-white mb-5" style="opacity:0.85;font-size:1.15rem;">BRELA, TIN, NGO/CSO, CRB, microfinance registration, tax compliance and full organizational structuring — all handled expertly from start to finish.</p>
                    <a href="#contact" class="btn btn-lg px-5 rounded-pill fw-bold text-dark" style="background:var(--gold);">Start Registration Journey</a>
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
<section class="py-5 position-relative overflow-hidden" style="background:linear-gradient(160deg,#091730 0%,#0f2246 60%,#152a52 100%);">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-eye me-2"></i>Our Purpose</span>
            <h2 class="display-4 fw-bold text-white mt-2">Vision &amp; Mission</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="p-4 p-lg-5 rounded-4 h-100" style="background:rgba(201,153,58,0.07);border:1px solid rgba(201,153,58,0.2);">
                    <div style="width:56px;height:56px;background:linear-gradient(135deg,var(--gold),#a07825);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:white;margin-bottom:20px;">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h3 class="fw-bold text-white mb-3">Our Vision</h3>
                    <p style="color:#94a3b8;font-size:1.05rem;line-height:1.85;font-family:'EB Garamond',serif;">To be the most trusted and impactful consultancy firm in East Africa, known for transforming individuals, organizations, and communities through excellence in legal services, research, and corporate governance.</p>
                </div>
            </div>
            <div class="col-lg-6">
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
            @php
            $values = [
                ['icon'=>'bi-shield-fill-check','color'=>'#c9993a','bg'=>'rgba(201,153,58,0.1)','title'=>'Integrity','desc'=>'We operate with complete honesty, transparency, and ethical standards in every client engagement.'],
                ['icon'=>'bi-award-fill','color'=>'#1d4ed8','bg'=>'rgba(29,78,216,0.08)','title'=>'Excellence','desc'=>'We are committed to delivering the highest quality of work, always exceeding expectations.'],
                ['icon'=>'bi-lightbulb-fill','color'=>'#d97706','bg'=>'rgba(217,119,6,0.08)','title'=>'Innovation','desc'=>'We embrace creative, modern approaches to solve complex legal and business challenges.'],
                ['icon'=>'bi-people-fill','color'=>'#047857','bg'=>'rgba(4,120,87,0.08)','title'=>'Client Focus','desc'=>'Our clients are at the heart of everything we do — approachable, responsive, and relationship-driven.'],
                ['icon'=>'bi-check2-circle','color'=>'#7c3aed','bg'=>'rgba(124,58,237,0.08)','title'=>'Accountability','desc'=>'We take full responsibility for our work and stand behind every service we deliver.'],
                ['icon'=>'bi-globe2','color'=>'#dc2626','bg'=>'rgba(220,38,38,0.08)','title'=>'Impact','desc'=>'We measure our success by the tangible difference we make in clients\' lives and organizations.'],
            ];
            @endphp
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
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-grid-fill me-2"></i>Our Expertise</span>
            <h2 class="display-4 fw-bold mt-2">Three Pillars of Service</h2>
            <p class="text-secondary mx-auto mt-3" style="max-width:580px;">Click to explore each area of specialisation in depth.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
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
            <div class="col-lg-4">
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
            <div class="col-lg-4">
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
<section id="legal" class="py-5 position-relative overflow-hidden" style="background:linear-gradient(155deg,#0a1c38 0%,#112644 60%,#0e2040 100%);"><div style="position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,0.04) 1px,transparent 1px);background-size:22px 22px;pointer-events:none;"></div>
    <div class="container py-4">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-7">
                <span class="k1-section-badge"><i class="bi bi-journal-richtext me-2"></i>Interface One</span>
                <h2 class="display-4 fw-bold text-white mt-2 mb-3" style="font-family:'EB Garamond',serif;">Legal <span style="color:var(--gold);">Activities</span></h2>
                <p style="color:#94a3b8;font-size:1.05rem;line-height:1.85;max-width:560px;">Our legal team combines deep expertise with an approachable, client-centred philosophy. Whether you face a courtroom dispute, need a contract reviewed, or require immigration guidance — we are your dedicated legal partner.</p>
            </div>
            <div class="col-lg-5">
                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=700&q=80" alt="Legal" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
        <div class="row g-4">
            @php
            $legal = [
                ['icon'=>'bi-bank','color'=>'#c9993a','title'=>'Litigation &amp; Mediation','desc'=>'Professional representation in court proceedings and skilled mediation to resolve disputes efficiently and cost-effectively.'],
                ['icon'=>'bi-file-earmark-ruled','color'=>'#e8b84b','title'=>'Arbitration &amp; Business Formation','desc'=>'Expert arbitration services and legal guidance for business formation, partnerships, and joint ventures.'],
                ['icon'=>'bi-file-earmark-text-fill','color'=>'#c9993a','title'=>'Contract Review','desc'=>'Thorough review, drafting, and negotiation of contracts to protect your interests and ensure enforceability.'],
                ['icon'=>'bi-airplane-fill','color'=>'#e8b84b','title'=>'Immigration Law','desc'=>'Work permits, residence permits, citizenship applications, and full immigration advisory services for individuals and companies.'],
                ['icon'=>'bi-house-heart-fill','color'=>'#c9993a','title'=>'Family Law Support','desc'=>'Compassionate guidance on divorce, child custody, inheritance, and all family law matters with sensitivity and discretion.'],
                ['icon'=>'bi-shield-fill-exclamation','color'=>'#e8b84b','title'=>'Criminal Defence &amp; Land Conflicts','desc'=>'Strong criminal defence representation and resolution of land disputes, boundary conflicts, and property rights cases.'],
                ['icon'=>'bi-people-fill','color'=>'#c9993a','title'=>'Legal Consultations &amp; Representation','desc'=>'General legal consultations, advisory sessions, and full court representation across civil, commercial, and administrative matters.'],
            ];
            @endphp
            @foreach($legal as $i => $sv)
            <div class="col-lg-4 col-md-6 {{ $i===6 ? 'col-lg-12' : '' }}">
                <div class="k1-svc-card" style="background:rgba(201,153,58,0.05);border-color:rgba(201,153,58,0.12);">
                    <div class="k1-svc-icon" style="background:rgba(201,153,58,0.12);color:{{ $sv['color'] }};">
                        <i class="bi {{ $sv['icon'] }}"></i>
                    </div>
                    <h5 class="fw-bold mb-2">{!! $sv['title'] !!}</h5>
                    <p class="text-secondary mb-3" style="font-size:0.9rem;line-height:1.7;">{{ $sv['desc'] }}</p>
                    <a href="#contact" class="text-decoration-none fw-bold small" style="color:var(--gold);">Request Support <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="#contact" class="btn btn-lg rounded-pill px-5 fw-bold text-dark" style="background:var(--gold);">Request Legal Support <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- ═══ INTERFACE 2: RESEARCH & CONSULTANCY ═══ --}}
<section id="research" class="py-5" style="background:#f8f5ef;">
    <div class="container py-4">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-5">
                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=700&q=80" alt="Research" class="img-fluid rounded-4 shadow-lg">
            </div>
            <div class="col-lg-7">
                <span class="k1-section-badge" style="background:rgba(13,148,136,0.1);border-color:rgba(13,148,136,0.3);color:#0d9488;"><i class="bi bi-search me-2"></i>Interface Two</span>
                <h2 class="display-4 fw-bold mt-2 mb-3" style="font-family:'EB Garamond',serif;">Research &amp; <span style="color:#0d9488;">Consultancy</span></h2>
                <p class="text-secondary" style="font-size:1.05rem;line-height:1.85;max-width:560px;">We bridge the gap between academic knowledge and real-world impact. From graduate researchers to international NGOs, we craft compelling, rigorous research documents that open doors and drive change.</p>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    @foreach(['Academic Researchers','Graduate Students','NGOs','International Development Partners','Government Institutions'] as $cl)
                    <span class="badge rounded-pill px-3 py-2" style="background:rgba(13,148,136,0.1);color:#0d9488;border:1px solid rgba(13,148,136,0.25);font-size:0.78rem;">{{ $cl }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row g-4">
            @php
            $research = [
                ['icon'=>'bi-journal-text','color'=>'#0d9488','bg'=>'rgba(13,148,136,0.08)','title'=>'Research Writing','desc'=>'Full academic and applied research writing services — from literature review to data analysis, findings, and recommendations.'],
                ['icon'=>'bi-file-earmark-check-fill','color'=>'#047857','bg'=>'rgba(4,120,87,0.08)','title'=>'Proposal Writing','desc'=>'Winning funding proposals for NGOs, development projects, academic grants, and government tenders.'],
                ['icon'=>'bi-card-text','color'=>'#0d9488','bg'=>'rgba(13,148,136,0.08)','title'=>'Research Synopsis','desc'=>'Concise, well-structured research synopses for academic institutions, thesis committees, and funding bodies.'],
                ['icon'=>'bi-lightbulb-fill','color'=>'#047857','bg'=>'rgba(4,120,87,0.08)','title'=>'Concept Notes','desc'=>'Impactful concept notes that introduce project ideas to donors, partners, and development organizations.'],
                ['icon'=>'bi-graph-up-arrow','color'=>'#0d9488','bg'=>'rgba(13,148,136,0.08)','title'=>'Business Plans','desc'=>'Comprehensive, investment-ready business plans for startups, SMEs, and organizations seeking financing.'],
            ];
            @endphp
            @foreach($research as $sv)
            <div class="col-lg-4 col-md-6">
                <div class="k1-svc-card">
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
            <a href="#contact" class="btn btn-lg rounded-pill px-5 fw-bold text-white" style="background:#0d9488;">Submit Research Request <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- ═══ INTERFACE 3: COMPANY & ORG MANAGEMENT ═══ --}}
<section id="company" class="py-5 position-relative overflow-hidden" style="background:linear-gradient(135deg,#0f2248 0%,#1a3268 60%,#122050 100%);"><div style="position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,0.04) 1px,transparent 1px);background-size:22px 22px;pointer-events:none;"></div>
    <div class="container py-4">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-7">
                <span class="k1-section-badge" style="background:rgba(29,78,216,0.15);border-color:rgba(29,78,216,0.3);color:#60a5fa;"><i class="bi bi-building-fill me-2"></i>Interface Three</span>
                <h2 class="display-4 fw-bold text-white mt-2 mb-3" style="font-family:'EB Garamond',serif;">Company &amp; Organization <span style="color:#60a5fa;">Management</span></h2>
                <p style="color:#94a3b8;font-size:1.05rem;line-height:1.85;max-width:580px;">We are your trusted partner for building compliant, well-structured organizations. From the first registration to full operational compliance — we handle the complexity so you can focus on growth.</p>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    @foreach(['Startups','Joint Ventures','NGOs','Tourism Operators','Agribusinesses','Govt. Institutions'] as $cl)
                    <span class="badge rounded-pill px-3 py-2" style="background:rgba(29,78,216,0.15);color:#60a5fa;border:1px solid rgba(29,78,216,0.25);font-size:0.78rem;">{{ $cl }}</span>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=700&q=80" alt="Company" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
        <div class="row g-4">
            @php
            $company = [
                ['icon'=>'bi-building-fill-check','color'=>'#60a5fa','bg'=>'rgba(29,78,216,0.12)','title'=>'Company Registration','desc'=>'Full BRELA registration, TIN, Business License, VAT, and all statutory requirements for new companies and partnerships.'],
                ['icon'=>'bi-heart-pulse-fill','color'=>'#34d399','bg'=>'rgba(16,185,129,0.08)','title'=>'NGO / CSO / CBO Registration','desc'=>'Complete registration and compliance setup for non-governmental organizations, civil society organizations, and community-based organizations.'],
                ['icon'=>'bi-hammer','color'=>'#fbbf24','bg'=>'rgba(251,191,36,0.08)','title'=>'Construction Company Registration','desc'=>'CRB, OSHA, NSSF, WCF registration and full compliance for construction and engineering firms operating in Tanzania.'],
                ['icon'=>'bi-currency-dollar','color'=>'#f87171','bg'=>'rgba(239,68,68,0.08)','title'=>'Microfinance Institution Registration','desc'=>'Full regulatory registration and compliance advisory for microfinance, SACCO, and savings group institutions.'],
                ['icon'=>'bi-receipt-cutoff','color'=>'#a78bfa','bg'=>'rgba(124,58,237,0.08)','title'=>'Tax Compliance &amp; Auditing','desc'=>'TRA compliance, annual returns, tax planning, audit support, and full financial regulatory compliance services.'],
                ['icon'=>'bi-diagram-3-fill','color'=>'#60a5fa','bg'=>'rgba(29,78,216,0.12)','title'=>'Organizational Structuring','desc'=>'Designing governance frameworks, constitutions, by-laws, org charts, and operational policies for sustainable organizations.'],
            ];
            @endphp
            @foreach($company as $sv)
            <div class="col-lg-4 col-md-6">
                <div class="k1-svc-card" style="background:rgba(255,255,255,0.04);border-color:rgba(255,255,255,0.08);">
                    <div class="k1-svc-icon" style="background:{{ $sv['bg'] }};color:{{ $sv['color'] }};">
                        <i class="bi {{ $sv['icon'] }}"></i>
                    </div>
                    <h5 class="fw-bold text-white mb-2">{!! $sv['title'] !!}</h5>
                    <p style="color:#94a3b8;font-size:0.9rem;line-height:1.7;margin-bottom:16px;">{{ $sv['desc'] }}</p>
                    <a href="#contact" class="text-decoration-none fw-bold small" style="color:#60a5fa;">Start Now <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="#contact" class="btn btn-lg rounded-pill px-5 fw-bold text-white" style="background:#1d4ed8;border-color:#1d4ed8;">Start Your Registration Journey <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- ═══ COMPANY PROFILE VISUAL ═══ --}}
<section class="py-5 overflow-hidden position-relative" style="background:linear-gradient(140deg,#1e1300 0%,#2e1e06 45%,#1a1102 100%);">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background-image:linear-gradient(rgba(201,153,58,0.07) 1px,transparent 1px),linear-gradient(90deg,rgba(201,153,58,0.07) 1px,transparent 1px);background-size:38px 38px;pointer-events:none;"></div>
    <div style="position:absolute;top:-100px;right:-100px;width:460px;height:460px;background:radial-gradient(circle,rgba(201,153,58,0.28),transparent);border-radius:50%;filter:blur(60px);pointer-events:none;"></div>
    <div class="container py-4 position-relative" style="z-index:1;">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-card-text me-2"></i>About Us</span>
            <h2 class="display-4 fw-bold text-white mt-2">Company <span style="color:var(--gold);">Profile</span></h2>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-5">
                <div class="p-4 p-lg-5 rounded-4 h-100 d-flex flex-column justify-content-center" style="background:rgba(201,153,58,0.07);border:1px solid rgba(201,153,58,0.2);">
                    <div class="mb-4">
                        <div style="font-family:'EB Garamond',serif;font-size:2.2rem;font-weight:700;color:white;line-height:1.1;">Kasimbagu</div>
                        <div style="font-family:'EB Garamond',serif;font-size:1rem;color:var(--gold);font-style:italic;margin-top:4px;">Consultancy Agency</div>
                        <div style="width:50px;height:3px;background:var(--gold);margin-top:12px;border-radius:2px;"></div>
                    </div>
                    <p style="color:#94a3b8;font-size:0.95rem;line-height:1.9;font-family:'EB Garamond',serif;font-size:1.05rem;">"A multi-disciplinary consultancy firm dedicated to providing exceptional legal, research, and organizational management services. We operate with integrity, innovation, and an unwavering commitment to client success across East Africa."</p>
                    <div class="mt-4 d-flex gap-3">
                        <div class="text-center">
                            <div style="font-size:1.8rem;font-weight:700;color:var(--gold);font-family:'EB Garamond',serif;">10+</div>
                            <div style="color:#64748b;font-size:0.75rem;">Years</div>
                        </div>
                        <div class="text-center">
                            <div style="font-size:1.8rem;font-weight:700;color:var(--gold);font-family:'EB Garamond',serif;">500+</div>
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
            <div class="col-lg-7">
                <div class="row g-3 h-100">
                    <div class="col-6">
                        <div class="p-4 rounded-4 h-100" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);">
                            <div style="color:var(--gold);font-size:1.5rem;margin-bottom:12px;"><i class="bi bi-building-fill"></i></div>
                            <div style="color:#94a3b8;font-size:0.75rem;letter-spacing:1px;text-transform:uppercase;font-weight:700;margin-bottom:8px;">Head Office</div>
                            <div class="text-white fw-bold mb-1">Dar es Salaam</div>
                            <div style="color:#64748b;font-size:0.83rem;">Tanzania</div>
                            <a href="tel:+255690075672" class="d-block mt-2 text-decoration-none" style="color:var(--gold);font-size:0.83rem;">+255 690 075 672</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 rounded-4 h-100" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);">
                            <div style="color:#60a5fa;font-size:1.5rem;margin-bottom:12px;"><i class="bi bi-building"></i></div>
                            <div style="color:#94a3b8;font-size:0.75rem;letter-spacing:1px;text-transform:uppercase;font-weight:700;margin-bottom:8px;">Branch Office</div>
                            <div class="text-white fw-bold mb-1">Moshi, Kilimanjaro</div>
                            <div style="color:#64748b;font-size:0.83rem;">Tanzania</div>
                            <a href="tel:+255653291058" class="d-block mt-2 text-decoration-none" style="color:#60a5fa;font-size:0.83rem;">+255 653 291 058</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-4 rounded-4" style="background:rgba(201,153,58,0.05);border:1px solid rgba(201,153,58,0.15);">
                            <div style="color:#94a3b8;font-size:0.75rem;letter-spacing:1px;text-transform:uppercase;font-weight:700;margin-bottom:12px;">Areas of Practice</div>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach(['Legal Activities','Research Writing','Proposal Development','Company Registration','NGO/CSO Setup','Tax Compliance','Immigration Law','Arbitration','Business Plans','Org. Structuring'] as $area)
                                <span class="badge rounded-pill px-3 py-2" style="background:rgba(201,153,58,0.12);color:var(--gold);border:1px solid rgba(201,153,58,0.2);font-size:0.75rem;">{{ $area }}</span>
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
            @php
            $whys = [
                ['icon'=>'bi-person-hearts','grad'=>'linear-gradient(135deg,#c9993a,#a07825)','title'=>'Approachable &amp; Client-Centered','desc'=>'We listen first. Every service is tailored to your unique situation — no generic answers, no one-size-fits-all solutions.'],
                ['icon'=>'bi-shield-fill-check','grad'=>'linear-gradient(135deg,#1d4ed8,#3b82f6)','title'=>'Integrity &amp; Trust','desc'=>'Complete honesty in every engagement. No hidden costs. No over-promising. Just transparent, reliable service.'],
                ['icon'=>'bi-lightning-charge-fill','grad'=>'linear-gradient(135deg,#d97706,#fbbf24)','title'=>'Speed &amp; Efficiency','desc'=>'Responses within 24 hours. Fast-tracked processing. We understand that time is critical for your goals.'],
                ['icon'=>'bi-globe2','grad'=>'linear-gradient(135deg,#047857,#10b981)','title'=>'Cross-Sector Experience','desc'=>'We have served clients across legal, academic, NGO, private sector, government, and development domains in East Africa.'],
                ['icon'=>'bi-graph-up-arrow','grad'=>'linear-gradient(135deg,#7c3aed,#a78bfa)','title'=>'Measurable Impact','desc'=>'We measure our success by yours — tracking outcomes, client growth, and the real-world impact of every engagement.'],
            ];
            @endphp
            @foreach($whys as $w)
            <div class="col-lg-6 {{ $loop->last && $loop->count % 2 !== 0 ? 'col-lg-12' : '' }}">
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
                @php
                $testi = [
                    ['q'=>'Kasimbagu handled our company registration from BRELA to TIN to business license in record time. Professional, fast, and completely transparent. Highly recommended!','name'=>'Juma Mwangi','role'=>'CEO, Mwangi Enterprises, Dar es Salaam','init'=>'JM'],
                    ['q'=>'Our NGO proposal was successfully funded after Kasimbagu rewrote it. The quality of their research writing is truly exceptional. They understood our vision completely.','name'=>'Sarah Okonkwo','role'=>'Executive Director, SafeHands NGO','init'=>'SO'],
                    ['q'=>'I faced a complex land conflict that had dragged on for 3 years. Kasimbagu resolved it through mediation in 6 weeks. I cannot express my gratitude enough.','name'=>'Abdallah Hassan','role'=>'Client, Moshi, Kilimanjaro','init'=>'AH'],
                    ['q'=>'Their immigration law team got my work permit approved in two weeks — other firms said it would take months. Kasimbagu delivers on their promises.','name'=>'Chen Wei','role'=>'Business Investor, Dar es Salaam','init'=>'CW'],
                ];
                @endphp
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
            <div class="col-lg-7">
                <span class="k1-section-badge"><i class="bi bi-newspaper me-2"></i>Insights</span>
                <h2 class="display-4 fw-bold mt-2">Blog &amp; <span style="color:var(--gold);">Updates</span></h2>
                <p class="text-secondary mt-3">Latest insights on Tanzanian law, business compliance, and research trends.</p>
            </div>
            <div class="col-lg-5 text-lg-end">
                <a href="#contact" class="btn btn-lg rounded-pill px-5 fw-bold text-dark" style="background:var(--gold);">Subscribe to Updates</a>
            </div>
        </div>
        <div class="row g-4">
            @php
            $blogs = [
                ['cat'=>'Legal','catColor'=>'#c9993a','catBg'=>'rgba(201,153,58,0.1)','img'=>'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=600&q=80','date'=>'May 2025','title'=>'Key Changes to Tanzania\'s Business Registration Act 2024','excerpt'=>'An overview of the latest amendments to the Business Registrations and Licensing Agency (BRELA) regulations and what they mean for entrepreneurs.'],
                ['cat'=>'Research','catColor'=>'#0d9488','catBg'=>'rgba(13,148,136,0.1)','img'=>'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80','date'=>'Apr 2025','title'=>'Writing a Winning Research Proposal: 7 Critical Elements','excerpt'=>'Learn the essential components that distinguish a funded research proposal from the ones that don\'t make the cut — with Tanzanian examples.'],
                ['cat'=>'Compliance','catColor'=>'#1d4ed8','catBg'=>'rgba(29,78,216,0.1)','img'=>'https://images.unsplash.com/photo-1560179707-f14e90ef3623?w=600&q=80','date'=>'Mar 2025','title'=>'NGO Registration in Tanzania: A Step-by-Step 2025 Guide','excerpt'=>'From the NGO Act to TRA registration — a practical, updated guide for civil society organizations looking to operate in Tanzania.'],
            ];
            @endphp
            @foreach($blogs as $b)
            <div class="col-lg-4">
                <div class="k1-blog-card">
                    <div style="overflow:hidden;">
                        <img src="{{ $b['img'] }}" alt="{{ $b['title'] }}">
                    </div>
                    <div class="p-4">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge rounded-pill px-2 py-1" style="background:{{ $b['catBg'] }};color:{{ $b['catColor'] }};font-size:0.72rem;">{{ $b['cat'] }}</span>
                            <span class="text-secondary small">{{ $b['date'] }}</span>
                        </div>
                        <h5 class="fw-bold mb-2" style="font-family:'EB Garamond',serif;font-size:1.15rem;line-height:1.4;">{{ $b['title'] }}</h5>
                        <p class="text-secondary mb-3" style="font-size:0.88rem;line-height:1.7;">{{ $b['excerpt'] }}</p>
                        <a href="#contact" class="fw-bold text-decoration-none small" style="color:var(--gold);">Read More <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
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
            <div class="col-lg-5">
                <h5 class="fw-bold mb-4">Our Offices</h5>
                <div class="d-flex flex-column gap-3 mb-5">
                    <div class="p-4 rounded-4" style="background:white;border:1px solid #e8d9b8;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width:44px;height:44px;background:linear-gradient(135deg,var(--gold),#a07825);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-building-fill text-white"></i></div>
                            <div><div class="fw-bold" style="color:#1a202c;">Head Office</div><div class="text-secondary small">Dar es Salaam, Tanzania</div></div>
                        </div>
                        <div class="d-flex flex-column gap-2 ms-1" style="font-size:0.88rem;">
                            <a href="tel:+255690075672" class="text-decoration-none text-dark d-flex gap-2"><i class="bi bi-telephone-fill text-gold"></i>+255 690 075 672</a>
                            <a href="mailto:info@kasimbagu.com" class="text-decoration-none text-dark d-flex gap-2"><i class="bi bi-envelope-fill text-gold"></i>info@kasimbagu.com</a>
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
                    <a href="https://wa.me/255653291058" class="btn btn-success rounded-pill px-4 fw-semibold"><i class="bi bi-whatsapp me-2"></i>WhatsApp Us</a>
                    <a href="#" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold"><i class="bi bi-linkedin me-2"></i>LinkedIn</a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="p-4 p-md-5 rounded-4 bg-white shadow-sm" style="border:1px solid #e8d9b8;">
                    @if(session('status'))
                        <div class="alert alert-success rounded-3 mb-4">{{ session('status') }}</div>
                    @endif
                    <h5 class="fw-bold mb-4" style="font-family:'EB Garamond',serif;font-size:1.4rem;">Send Us a Message</h5>
                    <form action="{{ route('inquiry.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Full Name</label>
                                <input type="text" name="name" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="Your full name" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Phone / WhatsApp</label>
                                <input type="text" name="phone" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="+255 690 075 672">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="your@email.com" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Service Required</label>
                                <select name="service" class="form-select rounded-3 py-3 border-0 bg-light" required>
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
                                    </optgroup>
                                    <optgroup label="Company Management">
                                        <option>Company Registration</option>
                                        <option>NGO/CSO Registration</option>
                                        <option>Tax Compliance</option>
                                        <option>Org. Structuring</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Preferred Office</label>
                                <select name="destination" class="form-select rounded-3 py-3 border-0 bg-light">
                                    <option value="">Any office</option>
                                    <option>Dar es Salaam (Head Office)</option>
                                    <option>Moshi, Kilimanjaro (Branch)</option>
                                    <option>Online / Remote</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Your Message</label>
                                <textarea name="message" class="form-control rounded-3 border-0 bg-light" rows="4" placeholder="Describe your case, project, or inquiry..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg w-100 rounded-pill fw-bold py-3 text-dark shadow-sm" style="background:var(--gold);border-color:var(--gold);">
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
</script>
@endsection
