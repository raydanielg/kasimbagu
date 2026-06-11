@extends('layouts.app')

@section('title', 'About Us | Kasimbagu Consultancy Agency — Tanzania')
@section('description', 'Learn about Kasimbagu Consultancy Agency — our story, vision, mission, values, and the expert team serving clients across Tanzania and East Africa since 2010.')
@section('og_title', 'About Kasimbagu Consultancy Agency')
@section('og_description', 'Our story, vision, mission, core values, and the expert team behind Kasimbagu — Tanzania\'s trusted consultancy and travel agency.')

@section('content')

{{-- ── HERO ── --}}
<section class="position-relative overflow-hidden" style="background:linear-gradient(135deg,#030c1e 0%,#071528 60%,#0e2040 100%);padding:100px 0 70px;">
    <div style="position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,0.04) 1px,transparent 1px);background-size:28px 28px;pointer-events:none;"></div>
    <div style="position:absolute;top:-80px;right:-60px;width:400px;height:400px;background:radial-gradient(circle,rgba(124,58,237,0.18),transparent);border-radius:50%;filter:blur(70px);pointer-events:none;"></div>
    <div class="container position-relative" style="z-index:1;">
        <span style="display:inline-flex;align-items:center;background:rgba(124,58,237,0.12);border:1px solid rgba(124,58,237,0.35);color:#a78bfa;padding:5px 18px;border-radius:50px;font-size:0.73rem;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;" class="mb-3 d-inline-flex">
            <i class="bi bi-building me-2"></i>Who We Are
        </span>
        <h1 class="display-4 fw-bold text-white mb-3">About <span style="background:linear-gradient(90deg,#a78bfa,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Kasimbagu</span></h1>
        <p style="color:#94a3b8;font-size:1.1rem;max-width:620px;line-height:1.8;">
            A trusted Tanzanian consultancy and travel agency built on the motto <em style="color:#fbbf24;font-weight:600;">"Ora et Labora"</em> — pray and work. We deliver excellence in legal services, research, company registration, and travel.
        </p>
    </div>
</section>

{{-- ── OUR STORY ── --}}
<section style="background:#040d1e;">
    <div class="container py-5">
        <div class="row g-5 align-items-center py-3">
            <div class="col-lg-6">
                <span style="display:inline-flex;align-items:center;background:rgba(245,158,11,0.12);border:1px solid rgba(245,158,11,0.3);color:#fbbf24;padding:4px 14px;border-radius:50px;font-size:0.73rem;font-weight:700;letter-spacing:1px;text-transform:uppercase;" class="mb-3 d-inline-flex">
                    <i class="bi bi-book-half me-2"></i>Our Story
                </span>
                <h2 class="text-white fw-bold mb-4" style="font-size:2rem;line-height:1.3;">From a Small Office to <span style="color:#fbbf24;">East Africa's Trusted Partner</span></h2>
                <p style="color:#94a3b8;font-size:0.95rem;line-height:1.85;margin-bottom:16px;">
                    Kasimbagu Consultancy Agency was founded with a simple but powerful vision: to make professional legal, consultancy, and travel services accessible to every Tanzanian — individuals, businesses, and organizations alike.
                </p>
                <p style="color:#94a3b8;font-size:0.95rem;line-height:1.85;margin-bottom:16px;">
                    Starting from Dar es Salaam with a small but passionate team, we have grown to serve hundreds of clients annually — from registering startups with BRELA to processing visas for the UAE, UK, Schengen and beyond.
                </p>
                <p style="color:#94a3b8;font-size:0.95rem;line-height:1.85;margin-bottom:28px;">
                    Today, with offices in Dar es Salaam and Moshi (Kilimanjaro), we operate as a full-service agency — guided always by our motto: <strong style="color:#fbbf24;">Ora et Labora</strong>.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    @foreach([['2010','Founded'],['500+','Clients Served'],['13+','Services Offered'],['2','Office Locations']] as $s)
                    <div class="text-center rounded-3 px-4 py-3" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);min-width:100px;">
                        <div style="font-size:1.5rem;font-weight:800;color:#fbbf24;line-height:1;">{{ $s[0] }}</div>
                        <div style="color:#64748b;font-size:0.75rem;margin-top:3px;">{{ $s[1] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=700&q=80" alt="Kasimbagu Team" class="rounded-4 w-100" style="height:420px;object-fit:cover;box-shadow:0 20px 60px rgba(0,0,0,0.5);">
                    <div class="position-absolute bottom-0 start-0 m-4 rounded-3 p-3" style="background:rgba(3,8,20,0.85);backdrop-filter:blur(8px);border:1px solid rgba(245,158,11,0.25);">
                        <div style="color:#fbbf24;font-size:1.3rem;font-weight:800;line-height:1;">Ora et Labora</div>
                        <div style="color:#64748b;font-size:0.78rem;margin-top:2px;">Pray and Work — Our Motto</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── VISION, MISSION, VALUES ── --}}
<section style="background:#030c1e;border-top:1px solid rgba(255,255,255,0.05);">
    <div class="container py-5">
        <div class="row g-4 py-3">
            {{-- Vision --}}
            <div class="col-lg-4">
                <div class="h-100 rounded-4 p-4" style="background:rgba(29,78,216,0.07);border:1px solid rgba(29,78,216,0.2);">
                    <div style="width:54px;height:54px;background:rgba(29,78,216,0.15);border:1px solid rgba(29,78,216,0.3);border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                        <i class="bi bi-eye-fill" style="color:#60a5fa;font-size:1.4rem;"></i>
                    </div>
                    <h4 class="text-white fw-bold mb-3">Our Vision</h4>
                    <p style="color:#94a3b8;line-height:1.8;font-size:0.93rem;">To be the leading consultancy and travel agency in East Africa — recognized for excellence, integrity, and transformative impact on the lives and businesses we serve.</p>
                </div>
            </div>
            {{-- Mission --}}
            <div class="col-lg-4">
                <div class="h-100 rounded-4 p-4" style="background:rgba(245,158,11,0.07);border:1px solid rgba(245,158,11,0.2);">
                    <div style="width:54px;height:54px;background:rgba(245,158,11,0.15);border:1px solid rgba(245,158,11,0.3);border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                        <i class="bi bi-bullseye" style="color:#fbbf24;font-size:1.4rem;"></i>
                    </div>
                    <h4 class="text-white fw-bold mb-3">Our Mission</h4>
                    <p style="color:#94a3b8;line-height:1.8;font-size:0.93rem;">To deliver accessible, client-centred, and results-driven consultancy and travel services through competent professionals guided by faith, diligence, and the highest ethical standards.</p>
                </div>
            </div>
            {{-- Values --}}
            <div class="col-lg-4">
                <div class="h-100 rounded-4 p-4" style="background:rgba(16,185,129,0.07);border:1px solid rgba(16,185,129,0.2);">
                    <div style="width:54px;height:54px;background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.3);border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                        <i class="bi bi-patch-check-fill" style="color:#34d399;font-size:1.4rem;"></i>
                    </div>
                    <h4 class="text-white fw-bold mb-3">Core Values</h4>
                    <ul style="list-style:none;padding:0;margin:0;" class="d-flex flex-column gap-2">
                        @foreach(['Integrity & Transparency','Client-First Mindset','Excellence & Diligence','Speed & Reliability','Innovation & Growth'] as $v)
                        <li style="color:#94a3b8;font-size:0.9rem;display:flex;align-items:center;gap:8px;">
                            <i class="bi bi-check-circle-fill" style="color:#34d399;font-size:0.7rem;flex-shrink:0;"></i>{{ $v }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── TEAM ── --}}
<section style="background:#040d1e;border-top:1px solid rgba(255,255,255,0.05);">
    <div class="container py-5">
        <div class="text-center mb-5">
            <span style="display:inline-flex;align-items:center;background:rgba(124,58,237,0.12);border:1px solid rgba(124,58,237,0.3);color:#a78bfa;padding:5px 18px;border-radius:50px;font-size:0.73rem;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;" class="mb-3 d-inline-flex">
                <i class="bi bi-people-fill me-2"></i>Meet the Team
            </span>
            <h2 class="text-white fw-bold" style="font-size:2rem;">The People Behind <span style="color:#a78bfa;">Kasimbagu</span></h2>
            <p style="color:#64748b;max-width:500px;margin:10px auto 0;font-size:0.93rem;line-height:1.7;">Dedicated professionals committed to delivering exceptional service in every interaction.</p>
        </div>

        <div class="row g-4">
            @foreach($team as $member)
            <div class="col-lg-4 col-md-6">
                <div class="kasb-team-card h-100 rounded-4 overflow-hidden" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);transition:all 0.3s;">
                    <div style="position:relative;height:220px;overflow:hidden;">
                        <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" style="width:100%;height:100%;object-fit:cover;object-position:top;transition:transform 0.5s;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(3,8,20,0.85) 0%,transparent 60%);"></div>
                        @if($member->department)
                        <div style="position:absolute;top:12px;right:12px;">
                            <span style="background:rgba(0,0,0,0.7);backdrop-filter:blur(4px);color:#a78bfa;border:1px solid rgba(124,58,237,0.3);padding:3px 10px;border-radius:20px;font-size:0.68rem;font-weight:700;">{{ $member->department }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h5 class="text-white fw-bold mb-1" style="font-size:1rem;">{{ $member->name }}</h5>
                        <div style="color:#a78bfa;font-size:0.82rem;font-weight:600;margin-bottom:12px;">{{ $member->title }}</div>
                        @if($member->bio)
                        <p style="color:#64748b;font-size:0.85rem;line-height:1.7;margin-bottom:16px;">{{ Str::limit($member->bio, 120) }}</p>
                        @endif
                        <div class="d-flex gap-2">
                            @if($member->email)
                            <a href="mailto:{{ $member->email }}" style="width:34px;height:34px;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#94a3b8;text-decoration:none;transition:all 0.2s;" title="Email">
                                <i class="bi bi-envelope-fill" style="font-size:0.8rem;"></i>
                            </a>
                            @endif
                            @if($member->linkedin_url)
                            <a href="{{ $member->linkedin_url }}" target="_blank" style="width:34px;height:34px;background:rgba(10,102,194,0.15);border:1px solid rgba(10,102,194,0.3);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#60a5fa;text-decoration:none;transition:all 0.2s;" title="LinkedIn">
                                <i class="bi bi-linkedin" style="font-size:0.8rem;"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── OFFICES ── --}}
<section style="background:#030c1e;border-top:1px solid rgba(255,255,255,0.05);">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="text-white fw-bold" style="font-size:1.8rem;">Our <span style="color:#fbbf24;">Offices</span></h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach([['Dar es Salaam','Head Office','bi-building-fill','#004a99','Dar es Salaam, Tanzania','info@kasimbagu.com','+255 690 075 672','Mon–Fri: 8am–5pm · Sat: 9am–1pm'],['Moshi, Kilimanjaro','Branch Office','bi-geo-alt-fill','#10b981','Moshi, Kilimanjaro, Tanzania','moshi@kasimbagu.com','+255 653 291 058','Mon–Fri: 8am–5pm · Sat: 9am–12pm']] as [$city,$type,$icon,$color,$addr,$email,$phone,$hours])
            <div class="col-lg-5">
                <div class="rounded-4 p-4 p-lg-5" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div style="width:52px;height:52px;background:{{ $color }}22;border:1px solid {{ $color }}44;border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="bi {{ $icon }}" style="color:{{ $color }};font-size:1.3rem;"></i>
                        </div>
                        <div>
                            <h4 class="text-white fw-bold mb-0" style="font-size:1.1rem;">{{ $city }}</h4>
                            <span style="color:{{ $color }};font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">{{ $type }}</span>
                        </div>
                    </div>
                    @foreach([['bi-geo-alt-fill',$addr],['bi-envelope-fill',$email],['bi-telephone-fill',$phone],['bi-clock-fill',$hours]] as [$ico,$val])
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <i class="bi {{ $ico }}" style="color:#475569;font-size:0.9rem;margin-top:3px;flex-shrink:0;"></i>
                        <span style="color:#94a3b8;font-size:0.88rem;">{{ $val }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── TARGET CLIENTS ── --}}
<section style="background:#040d1e;border-top:1px solid rgba(255,255,255,0.05);">
    <div class="container py-5">
        <div class="text-center mb-5">
            <span style="display:inline-flex;align-items:center;background:rgba(124,58,237,0.12);border:1px solid rgba(124,58,237,0.35);color:#a78bfa;padding:5px 18px;border-radius:50px;font-size:0.73rem;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;" class="mb-3 d-inline-flex">
                <i class="bi bi-people-fill me-2"></i>Who We Serve
            </span>
            <h2 class="text-white fw-bold" style="font-size:2rem;">Our <span style="color:#a78bfa;">Target Clients</span></h2>
            <p style="color:#64748b;max-width:600px;margin:10px auto 0;font-size:0.93rem;line-height:1.7;">We serve a diverse range of clients across various sectors, providing tailored legal and consultancy solutions.</p>
        </div>

        <div class="row g-4">
            @foreach([
                ['icon'=>'bi-building-fill-add','color'=>'#7c3aed','title'=>'Joint Venture Companies','desc'=>'Whether local or international, joint ventures often face complex registration and compliance challenges. We can help partners align legally, draft clear agreements, and navigate multi-party obligations with confidence.'],
                ['icon'=>'bi-handshake-fill','color'=>'#f59e0b','title'=>'General Partnerships','desc'=>'Many partnerships operate informally and risk legal exposure. We can support you in formalizing structure, registering with BRELA, and setting up tax compliance—so you can focus on growing together.'],
                ['icon'=>'bi-file-earmark-text-fill','color'=>'#10b981','title'=>'Limited Liability Partnerships (LLPs)','desc'=>'These hybrid entities need careful documentation and legal clarity. Our expertise in contract drafting and regulatory compliance makes us the ideal advisor for LLPs seeking structure and protection.'],
                ['icon'=>'bi-globe-fill','color'=>'#3b82f6','title'=>'International Collaborations','desc'=>'Cross-border partnerships often struggle with local legal frameworks. We can bridge the gap by offering tailored legal aid, registration services, and compliance support for foreign entities working in Tanzania.'],
                ['icon'=>'bi-houses-fill','color'=>'#ef4444','title'=>'Construction & Real Estate Partnerships','desc'=>'These ventures require strong legal foundations to manage risk and investment. Our services in contract drafting, tax setup, and business licensing are essential for smooth operations.'],
                ['icon'=>'bi-lightbulb-fill','color'=>'#8b5cf6','title'=>'Research & Innovation Collaboratives','desc'=>'Universities, NGOs, and private firms often team up for joint research or pilot programs. We can support you with MoUs, concept notes, and legal frameworks that protect intellectual property and clarify roles.'],
                ['icon'=>'bi-people-circle-fill','color'=>'#06b6d4','title'=>'Community-Based Organizations (CBOs)','desc'=>'CBOs are bound to navigate registration, compliance, and governance structures. Our tailored support will empower your organization to formalize work and access funding.'],
                ['icon'=>'bi-bank-fill','color'=>'#dc2626','title'=>'Government Institutions','desc'=>'With the dynamic changes the country is having on its legal sphere, government institutions are also bound to ensure strictly compliance. Our Firm will always be ready to offer assistance whenever being engaged.'],
                ['icon'=>'bi-mortarboard-fill','color'=>'#059669','title'=>'Academic Researchers & Graduate Students','desc'=>'Whether you\'re drafting proposals, concept notes, or business plans, our research and writing services are a lifeline for scholars aiming to publish, apply for grants, or launch initiatives.'],
                ['icon'=>'bi-rocket-fill','color'=>'#d97706','title'=>'Startups & Small Business Owners','desc'=>'From company registration to tax compliance and business licensing, we\'re the go-to partner for entrepreneurs who want to build legally sound and scalable ventures.'],
                ['icon'=>'bi-airplane-fill','color'=>'#0891b2','title'=>'Tourism Operators & Travel Startups','desc'=>'With our expertise in securing TALA licenses, BRELA registration, and tax setup, we\'re perfectly positioned to support Tanzania\'s growing tourism sector.'],
                ['icon'=>'bi-globe-americas-fill','color'=>'#7c3aed','title'=>'International Development Partners','desc'=>'Organizations working in Tanzania need local legal insight and gender-responsive frameworks. Our consultancy bridges the gap between global goals and local realities.'],
                ['icon'=>'bi-box-seam-fill','color'=>'#2563eb','title'=>'Import/Export & Logistics Companies','desc'=>'Navigating TRA, BRELA, and licensing requirements can be a maze. We\'re the guide you need to stay compliant and competitive in cross-border trade.'],
                ['icon'=>'bi-flower1-fill','color'=>'#16a34a','title'=>'Agribusiness & Food Processing Companies','desc'=>'From cooperatives to private processors, these businesses benefit from our support in registration, compliance, and business planning—especially when scaling or seeking funding.'],
                ['icon'=>'bi-cart-fill','color'=>'#ea580c','title'=>'Retail & Wholesale Traders','desc'=>'From small shops to large distributors, many traders struggle with business licensing and tax setup. We can help you formalize operations and grow sustainably.']
            ] as $client)
            <div class="col-lg-4 col-md-6">
                <div class="h-100 rounded-4 p-4" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);transition:all 0.3s;">
                    <div style="width:52px;height:52px;background:{{ $client['color'] }}22;border:1px solid {{ $client['color'] }}44;border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                        <i class="bi {{ $client['icon'] }}" style="color:{{ $client['color'] }};font-size:1.4rem;"></i>
                    </div>
                    <h5 class="text-white fw-bold mb-3" style="font-size:1.05rem;">{{ $client['title'] }}</h5>
                    <p style="color:#94a3b8;line-height:1.75;font-size:0.87rem;">{{ $client['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .col-lg-4:hover .rounded-4 { border-color:rgba(124,58,237,0.3) !important; transform:translateY(-5px); box-shadow:0 20px 50px rgba(0,0,0,0.35); }
</style>

{{-- ── CTA ── }}--}}
<section class="py-5" style="background:#040d1e;border-top:1px solid rgba(255,255,255,0.05);">
    <div class="container py-3 text-center">
        <h3 class="text-white fw-bold mb-2">Ready to work with us?</h3>
        <p style="color:#94a3b8;margin-bottom:28px;">Join hundreds of satisfied clients across Tanzania and East Africa.</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('contact') }}" class="btn btn-warning btn-lg px-5 rounded-0 fw-bold shadow-lg">
                <i class="bi bi-send-fill me-2"></i>Get in Touch
            </a>
            <a href="{{ route('services') }}" class="btn btn-lg px-5 rounded-0 fw-bold" style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);color:#e2e8f0;">
                <i class="bi bi-grid me-2"></i>View Services
            </a>
        </div>
    </div>
</section>

<style>
    .kasb-team-card:hover { border-color:rgba(124,58,237,0.3) !important; transform:translateY(-5px); box-shadow:0 20px 50px rgba(0,0,0,0.35); }
    .kasb-team-card:hover img { transform:scale(1.04); }
</style>
@endsection
