@extends('layouts.app')

@section('title', 'Our Services | Kasimbagu Consultancy Agency — Tanzania')
@section('description', 'Comprehensive services: flight booking, visa assistance, legal services, company registration, research consultancy, and ICT solutions across East Africa.')
@section('og_title', 'Our Services — Kasimbagu Consultancy Agency')
@section('og_description', 'Flight booking, visa assistance, legal services, company registration, research consultancy, and ICT solutions in Tanzania.')

@section('content')

{{-- HERO --}}
<section style="background:#000;padding:80px 0 60px;position:relative;overflow:hidden;">
    <div style="position:absolute;inset:0;background:radial-gradient(circle at 30% 50%,rgba(59,130,246,0.15),transparent 50%);"></div>
    <div style="position:absolute;inset:0;background:radial-gradient(circle at 70% 50%,rgba(245,158,11,0.1),transparent 50%);"></div>
    <div class="container position-relative" style="z-index:1;">
        <div class="row align-items-center">
            <div class="col-12">
                <span style="display:inline-flex;align-items:center;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:#fff;padding:6px 16px;border-radius:50px;font-size:0.7rem;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:20px;">
                    <i class="bi bi-lightning-charge-fill me-2" style="color:#fbbf24;"></i>Premium Services
                </span>
                <h1 class="text-white fw-bold mb-3" style="font-size:2.2rem;line-height:1.2;">
                    Expert Solutions for <br><span style="background:linear-gradient(90deg,#3b82f6,#fbbf24);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Every Need</span>
                </h1>
                <p style="color:#9ca3af;font-size:1rem;max-width:100%;line-height:1.7;margin-bottom:28px;">
                    From international travel and visa processing to legal representation, company registration, and cutting-edge ICT solutions — we deliver excellence across every domain.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#services" class="btn btn-primary px-4 py-3 rounded-pill fw-bold" style="background:#3b82f6;border:none;font-size:0.95rem;flex:1;min-width:140px;">
                        Explore Services <i class="bi bi-arrow-down ms-2"></i>
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light px-4 py-3 rounded-pill fw-bold" style="border:1px solid rgba(255,255,255,0.3);font-size:0.95rem;flex:1;min-width:140px;">
                        Get a Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CATEGORY TABS --}}
<section style="background:#0a0a0a;border-bottom:1px solid rgba(255,255,255,0.08);position:sticky;top:72px;z-index:100;">
    <div class="container">
        <div class="d-flex gap-1 overflow-x-auto py-2" style="scrollbar-width:none;">
            @php
                $cats = ['all'=>['All Services','bi-grid'], 'travel'=>['Travel & Visa','bi-airplane'], 'legal'=>['Legal','bi-bank2'], 'research'=>['Research','bi-journal-text'], 'registration'=>['Registration','bi-building-add'], 'ict'=>['ICT','bi-cpu']];
            @endphp
            @foreach($cats as $key=>[$label,$icon])
            <a href="#{{ $key === 'all' ? 'services-grid' : 'cat-'.$key }}"
               class="kasb-tab-link flex-shrink-0 d-flex align-items-center gap-2 px-3 py-2 text-decoration-none fw-semibold"
               style="color:#6b7280;font-size:0.8rem;border-bottom:2px solid transparent;transition:all 0.2s;white-space:nowrap;">
                <i class="bi {{ $icon }}"></i>{{ $label }}
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- SERVICES GRID --}}
<section id="services-grid" style="background:#0a0a0a;padding:60px 0;">

    @php
        $catMeta = [
            'travel'       => ['Travel & Visa', 'bi-airplane-fill', '#3b82f6', 'Flight bookings, visa processing, hotel reservations, and airport transfers across 50+ destinations.'],
            'legal'        => ['Legal Services', 'bi-bank2', '#ef4444', 'Expert legal representation, contract drafting, immigration law, and dispute resolution.'],
            'research'     => ['Research & Consultancy', 'bi-journal-text', '#d97706', 'Research writing, proposal development, feasibility studies, and business plans.'],
            'registration' => ['Company Registration', 'bi-building-add', '#004a99', 'BRELA, NGO/CSO, CRB, microfinance, and tax compliance registration services.'],
            'ict'          => ['ICT Solutions', 'bi-cpu-fill', '#06b6d4', 'Website development, software systems, networking, and technology consultancy.'],
        ];
    @endphp

    @foreach($services as $cat => $catServices)
    @if(isset($catMeta[$cat]))
    @php [$catLabel, $catIcon, $catColor, $catDesc] = $catMeta[$cat]; @endphp

    <div id="cat-{{ $cat }}" class="mb-5 pb-3">
        {{-- Category header --}}
        <div class="d-flex align-items-center gap-3 mb-4 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.08);">
            <div style="width:44px;height:44px;border-radius:12px;background:{{ $catColor }}22;border:1px solid {{ $catColor }}44;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="bi {{ $catIcon }}" style="color:{{ $catColor }};font-size:1.2rem;"></i>
            </div>
            <div>
                <h3 class="text-white fw-bold mb-0" style="font-size:1.15rem;">{{ $catLabel }}</h3>
                <p style="color:#6b7280;font-size:0.8rem;margin:2px 0 0;">{{ $catDesc }}</p>
            </div>
        </div>

        {{-- Service cards --}}
        <div class="row g-4">
            @foreach($catServices as $service)
            <div class="col-lg-4 col-md-6 col-6">
                <div class="h-100 rounded-3 p-4 kasb-service-card" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);transition:all 0.4s cubic-bezier(0.4,0,0.2,1);">
                    <div style="width:56px;height:56px;border-radius:14px;background:linear-gradient(135deg,{{ $service->icon_color }}22,{{ $service->icon_color }}44);border:1px solid {{ $service->icon_color }}55;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                        <i class="bi {{ $service->icon }}" style="color:{{ $service->icon_color }};font-size:1.5rem;"></i>
                    </div>
                    <h3 class="text-white fw-bold mb-2" style="font-size:1.1rem;">{{ $service->name }}</h3>
                    <p style="color:#9ca3af;line-height:1.6;margin-bottom:20px;font-size:0.9rem;">{{ $service->short_description }}</p>
                    @if($service->features)
                    <ul style="list-style:none;padding:0;margin:0 0 20px;">
                        @foreach(array_slice($service->features, 0, 4) as $feat)
                        <li style="color:#6b7280;font-size:0.85rem;padding:6px 0;border-bottom:1px solid rgba(255,255,255,0.05);display:flex;align-items:center;gap:8px;">
                            <i class="bi bi-check2-circle" style="color:{{ $service->icon_color }};font-size:0.9rem;"></i>{{ $feat }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <a href="{{ route('contact') }}?service={{ urlencode($service->name) }}" class="btn btn-sm rounded-pill fw-bold px-4 py-2 w-100" style="background:{{ $service->icon_color }}15;border:1px solid {{ $service->icon_color }}40;color:{{ $service->icon_color }};font-size:0.85rem;transition:all 0.3s;">
                        Learn More <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    @endforeach

</section>

{{-- WHY CHOOSE US --}}
<section style="background:#000;padding:60px 0;">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6 col-12">
                <span style="color:#fbbf24;font-size:0.7rem;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;">Why Choose Us</span>
                <h2 class="text-white fw-bold mt-2 mb-3" style="font-size:1.8rem;line-height:1.2;">Delivering Excellence Since 2010</h2>
                <p style="color:#9ca3af;line-height:1.7;margin-bottom:24px;font-size:0.95rem;">
                    With over a decade of experience serving clients across East Africa, we have built a reputation for reliability, professionalism, and results-driven solutions that exceed expectations.
                </p>
                <div class="d-flex flex-column gap-3">
                    @foreach([
                        ['Expert Team','Highly qualified professionals with deep industry knowledge'],
                        ['Fast Turnaround','Quick response times and efficient service delivery'],
                        ['Competitive Pricing','Transparent pricing with no hidden costs'],
                        ['24/7 Support','Always available to assist with your needs']
                    ] as $item)
                    <div class="d-flex gap-3">
                        <div style="width:40px;height:40px;background:rgba(59,130,246,0.15);border:1px solid rgba(59,130,246,0.3);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="bi bi-check-lg" style="color:#3b82f6;font-size:1rem;"></i>
                        </div>
                        <div>
                            <h4 class="text-white fw-bold mb-1" style="font-size:0.95rem;">{{ $item[0] }}</h4>
                            <p style="color:#6b7280;font-size:0.85rem;margin:0;">{{ $item[1] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="rounded-3 p-4" style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.08);">
                    <div class="row g-3">
                        @foreach([['500+','Happy Clients','bi-people-fill','#3b82f6'],['50+','Destinations','bi-globe-fill','#fbbf24'],['98%','Success Rate','bi-patch-check-fill','#10b981'],['24h','Response Time','bi-clock-fill','#8b5cf6']] as $stat)
                        <div class="col-6">
                            <div class="text-center p-3 rounded-2" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);">
                                <i class="bi {{ $stat[2] }} mb-2 d-block" style="color:{{ $stat[3] }};font-size:1.3rem;"></i>
                                <div style="color:#fff;font-weight:800;font-size:1.5rem;line-height:1;">{{ $stat[0] }}</div>
                                <div style="color:#6b7280;font-size:0.8rem;margin-top:3px;">{{ $stat[1] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="background:linear-gradient(135deg,#1e3a8a 0%,#000 100%);padding:80px 0;">
    <div class="container text-center">
        <h2 class="text-white fw-bold mb-3" style="font-size:1.8rem;">Ready to Get Started?</h2>
        <p style="color:#9ca3af;max-width:100%;margin:0 auto 32px;font-size:0.95rem;line-height:1.7;">
            Contact our team today and discover how we can help you achieve your goals with our comprehensive range of professional services.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('contact') }}" class="btn btn-warning px-5 py-3 rounded-pill fw-bold" style="font-size:1rem;flex:1;min-width:140px;">
                Contact Us <i class="bi bi-arrow-right ms-2"></i>
            </a>
            <a href="https://wa.me/255653291058" target="_blank" class="btn px-5 py-3 rounded-pill fw-bold" style="background:rgba(37,211,102,0.2);border:1px solid rgba(37,211,102,0.4);color:#34d399;font-size:1rem;flex:1;min-width:140px;">
                <i class="bi bi-whatsapp me-2"></i>WhatsApp
            </a>
        </div>
    </div>
</section>

<style>
    .kasb-service-card:hover { background:rgba(255,255,255,0.06) !important; border-color:rgba(59,130,246,0.3) !important; transform:translateY(-8px); box-shadow:0 30px 60px rgba(0,0,0,0.5); }
    .kasb-tab-link:hover { color:#fbbf24 !important; border-bottom-color:#fbbf24 !important; }
</style>
@endsection
