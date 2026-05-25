@extends('side2.layout')

@section('content')

{{-- ══════════════════════════════════════════
     HERO SLIDER
══════════════════════════════════════════ --}}
<style>
    .k2-hero { height: 650px; }
    .k2-hero .swiper-slide { background-size: cover; background-position: center; display: flex; align-items: center; position: relative; }
    .k2-hero .swiper-slide::before { content:''; position:absolute; inset:0; background:linear-gradient(120deg,rgba(1,12,28,0.78) 40%,rgba(1,12,28,0.3)); z-index:1; }
    .k2-hero-content { position:relative; z-index:2; }
    .k2-hero-badge { background:rgba(56,189,248,0.18); border:1px solid rgba(56,189,248,0.4); color:#7dd3fc; padding:6px 18px; border-radius:50px; display:inline-block; font-size:0.78rem; font-weight:700; letter-spacing:1px; text-transform:uppercase; margin-bottom:20px; }
    .k2-hero .swiper-pagination-bullet { width:12px; height:12px; background:#fff; opacity:0.4; }
    .k2-hero .swiper-pagination-bullet-active { width:32px; border-radius:20px; background:#38bdf8; opacity:1; }
    .k2-hero-arrow { position:absolute; top:50%; transform:translateY(-50%); z-index:10; width:46px; height:46px; background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.2); color:white; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; backdrop-filter:blur(4px); transition:all 0.3s; }
    .k2-hero-arrow:hover { background:rgba(56,189,248,0.5); }
    .k2-hero-prev { left:20px; } .k2-hero-next { right:20px; }
    @media(max-width:768px){ .k2-hero { height:500px; } }
</style>
<div class="swiper k2-hero position-relative">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1600&q=80');">
            <div class="container k2-hero-content">
                <div class="col-lg-7">
                    <span class="k2-hero-badge"><i class="bi bi-airplane-fill me-2"></i>Flight Ticketing</span>
                    <h1 class="display-2 fw-bold text-white mb-4 animate__animated animate__fadeInUp" style="line-height:1.1;">Your Journey <span style="background:linear-gradient(90deg,#38bdf8,#22c55e);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Starts Here</span></h1>
                    <p class="lead text-white mb-5" style="opacity:0.88;">Same-day flight tickets, competitive fares, and full booking support for 50+ global destinations.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#contact" class="btn btn-lg px-5 rounded-pill fw-bold shadow text-dark" style="background:#38bdf8;">Book a Flight</a>
                        <a href="#destinations" class="btn btn-outline-light btn-lg px-5 rounded-pill">View Destinations</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=1600&q=80');">
            <div class="container k2-hero-content text-center">
                <div class="col-lg-8 mx-auto">
                    <span class="k2-hero-badge"><i class="bi bi-globe2 me-2"></i>Visa Assistance</span>
                    <h1 class="display-2 fw-bold text-white mb-4" style="line-height:1.1;">Visa Approved. <span style="color:#38bdf8;">Stress-Free.</span></h1>
                    <p class="lead text-white mb-5" style="opacity:0.88;">Expert visa processing for UAE, UK, USA, Schengen, China, India, Turkey and more — fast, accurate, and hassle-free.</p>
                    <a href="#contact" class="btn btn-lg px-5 rounded-pill fw-bold shadow text-dark" style="background:#38bdf8;">Apply for Visa</a>
                </div>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=1600&q=80');">
            <div class="container k2-hero-content">
                <div class="col-lg-7 ms-auto text-end">
                    <span class="k2-hero-badge"><i class="bi bi-map-fill me-2"></i>Tour Packages</span>
                    <h1 class="display-2 fw-bold text-white mb-4" style="line-height:1.1;">Explore the <span style="color:#38bdf8;">World</span> With Us</h1>
                    <p class="lead text-white mb-5" style="opacity:0.88;">Curated international tour packages with hotel, transport, and guide — tailored to your budget and interests.</p>
                    <a href="#contact" class="btn btn-lg px-5 rounded-pill fw-bold shadow text-dark" style="background:#38bdf8;">Get a Package Quote</a>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination" style="bottom:28px;"></div>
    <div class="k2-hero-prev k2-hero-arrow"><i class="bi bi-chevron-left"></i></div>
    <div class="k2-hero-next k2-hero-arrow"><i class="bi bi-chevron-right"></i></div>
</div>

{{-- ══════════════════════════════════════════
     STATS BAR
══════════════════════════════════════════ --}}
<div style="background:#020c1d;border-bottom:1px solid rgba(255,255,255,0.06);">
    <div class="container py-4">
        <div class="row g-3 text-center">
            @foreach([['50+','Destinations'],['500+','Happy Travellers'],['100%','Visa Success Rate'],['24/7','Support']] as $s)
            <div class="col-6 col-md-3">
                <div class="py-2">
                    <div class="fw-bold" style="font-size:2rem;color:#38bdf8;line-height:1;">{{ $s[0] }}</div>
                    <div style="color:#64748b;font-size:0.82rem;margin-top:4px;">{{ $s[1] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     DESTINATIONS
══════════════════════════════════════════ --}}
<section class="py-5 overflow-hidden" id="destinations" style="background:#f0f9ff;">
    <div class="container py-4">
        <div class="row align-items-end mb-5">
            <div class="col-lg-6">
                <span class="badge rounded-pill px-3 py-2 mb-3" style="background:rgba(2,132,199,0.1);color:#0284c7;font-size:0.73rem;letter-spacing:1px;font-weight:700;">POPULAR DESTINATIONS</span>
                <h2 class="display-5 fw-bold mb-3">Where Do You <br>Want to Go?</h2>
                <p class="text-secondary lead">50+ destinations — all bookings handled from Dar es Salaam.</p>
            </div>
            <div class="col-lg-6 text-lg-end">
                <a href="#contact" class="btn btn-lg rounded-pill px-5 fw-bold text-white" style="background:#0284c7;">Get Visa Quote <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="row g-4">
            @php
            $dests = [
                ['flag'=>'🇦🇪','city'=>'Dubai','country'=>'United Arab Emirates','img'=>'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=600&q=80','visa'=>'Visa on Arrival'],
                ['flag'=>'🇹🇷','city'=>'Istanbul','country'=>'Turkey','img'=>'https://images.unsplash.com/photo-1524231757912-21f4fe3a7200?w=600&q=80','visa'=>'E-Visa'],
                ['flag'=>'🇬🇧','city'=>'London','country'=>'United Kingdom','img'=>'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=600&q=80','visa'=>'UK Visa Required'],
                ['flag'=>'🇺🇸','city'=>'New York','country'=>'United States','img'=>'https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=600&q=80','visa'=>'B1/B2 Visa'],
                ['flag'=>'🇨🇳','city'=>'Beijing','country'=>'China','img'=>'https://images.unsplash.com/photo-1508804185872-d7badad00f7d?w=600&q=80','visa'=>'China Visa'],
                ['flag'=>'🇮🇳','city'=>'New Delhi','country'=>'India','img'=>'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600&q=80','visa'=>'E-Visa'],
            ];
            @endphp
            @foreach($dests as $d)
            <div class="col-lg-4 col-md-6">
                <div class="k2-dest-card rounded-4 overflow-hidden position-relative shadow-sm" style="height:260px;">
                    <img src="{{ $d['img'] }}" alt="{{ $d['city'] }}" class="w-100 h-100 k2-dest-img" style="object-fit:cover;transition:transform 0.5s ease;">
                    <div class="position-absolute inset-0 top-0 start-0 w-100 h-100" style="background:linear-gradient(to top,rgba(1,12,28,0.85) 0%,rgba(1,12,28,0.1) 60%);"></div>
                    <div class="position-absolute bottom-0 start-0 p-4 w-100">
                        <div class="d-flex align-items-end justify-content-between">
                            <div>
                                <div style="font-size:1.8rem;line-height:1;margin-bottom:4px;">{{ $d['flag'] }}</div>
                                <h5 class="text-white fw-bold mb-0">{{ $d['city'] }}</h5>
                                <div style="color:rgba(255,255,255,0.65);font-size:0.8rem;">{{ $d['country'] }}</div>
                            </div>
                            <span class="badge rounded-pill px-3 py-2" style="background:rgba(56,189,248,0.25);border:1px solid rgba(56,189,248,0.4);color:#7dd3fc;font-size:0.7rem;">{{ $d['visa'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<style>
    .k2-dest-card:hover .k2-dest-img { transform: scale(1.07); }
    .k2-dest-card { cursor: pointer; transition: box-shadow 0.3s; }
    .k2-dest-card:hover { box-shadow: 0 20px 50px rgba(0,0,0,0.18) !important; }
</style>

{{-- ══════════════════════════════════════════
     SERVICES
══════════════════════════════════════════ --}}
<section class="py-5 bg-white" id="services">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-3 py-2 mb-3" style="background:rgba(2,132,199,0.1);color:#0284c7;font-size:0.73rem;letter-spacing:1px;font-weight:700;">WHAT WE OFFER</span>
            <h2 class="display-5 fw-bold mb-3">Complete Travel Services</h2>
            <p class="text-secondary mx-auto" style="max-width:560px;">Everything you need for a perfect trip — from booking to landing.</p>
        </div>
        <div class="row g-4 justify-content-center">
            @php
            $svcs = [
                ['icon'=>'bi-airplane-fill','color'=>'#0284c7','bg'=>'rgba(2,132,199,0.08)','title'=>'Flight Tickets','desc'=>'Domestic and international flight bookings across all major airlines. Best rates, same-day issuance, flexible options.'],
                ['icon'=>'bi-passport-fill','color'=>'#7c3aed','bg'=>'rgba(124,58,237,0.08)','title'=>'Visa Assistance','desc'=>'Expert documentation guidance and processing for UAE, UK, USA, Schengen, China, India, Turkey and 40+ countries.'],
                ['icon'=>'bi-building','color'=>'#047857','bg'=>'rgba(4,120,87,0.08)','title'=>'Hotel Booking','desc'=>'Wide selection of hotels, lodges, and resorts at competitive prices — from budget-friendly to luxury stays worldwide.'],
                ['icon'=>'bi-map-fill','color'=>'#d97706','bg'=>'rgba(217,119,6,0.08)','title'=>'Tour Packages','desc'=>'Curated local and international tour packages with accommodation, transport, guided tours, and itinerary planning.'],
                ['icon'=>'bi-car-front-fill','color'=>'#dc2626','bg'=>'rgba(220,38,38,0.08)','title'=>'Airport Pickup','desc'=>'Reliable airport transfers and on-ground support. We ensure a seamless arrival experience at your destination.'],
            ];
            @endphp
            @foreach($svcs as $i => $sv)
            <div class="col-lg-4 col-md-6 {{ $i===4 ? 'col-lg-8' : '' }}">
                <div class="p-4 rounded-4 h-100 k2-svc-card" style="background:{{ $sv['bg'] }};border:1px solid transparent;">
                    <div style="width:52px;height:52px;background:{{ $sv['color'] }};border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:18px;box-shadow:0 4px 15px rgba(0,0,0,0.15);">
                        <i class="bi {{ $sv['icon'] }} text-white" style="font-size:1.25rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color:#1a202c;">{{ $sv['title'] }}</h5>
                    <p class="text-secondary mb-3" style="font-size:0.91rem;line-height:1.7;">{{ $sv['desc'] }}</p>
                    <a href="#contact" class="fw-bold text-decoration-none small" style="color:{{ $sv['color'] }};">Book Now <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<style>
    .k2-svc-card { transition: all 0.3s ease; }
    .k2-svc-card:hover { transform: translateY(-7px); border-color: rgba(2,132,199,0.25) !important; box-shadow: 0 20px 50px rgba(0,0,0,0.08); }
</style>

{{-- ══════════════════════════════════════════
     WHY CHOOSE US
══════════════════════════════════════════ --}}
<section class="position-relative overflow-hidden py-5" id="why-us" style="background:#020c1d;">
    <div style="position:absolute;top:-80px;left:-120px;width:450px;height:450px;background:radial-gradient(circle,#0284c7,transparent);border-radius:50%;filter:blur(80px);opacity:0.18;pointer-events:none;"></div>
    <div style="position:absolute;bottom:-60px;right:-80px;width:380px;height:380px;background:radial-gradient(circle,#22c55e,transparent);border-radius:50%;filter:blur(80px);opacity:0.15;pointer-events:none;"></div>
    <div class="container py-4 position-relative" style="z-index:1;">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <span class="badge rounded-pill px-3 py-2 mb-3" style="background:rgba(56,189,248,0.12);color:#7dd3fc;border:1px solid rgba(56,189,248,0.25);font-size:0.73rem;letter-spacing:1px;font-weight:700;">WHY TRAVEL WITH US</span>
                <h2 class="display-4 fw-bold text-white mb-4">Your Trip. <span style="background:linear-gradient(90deg,#38bdf8,#22c55e);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Our Promise.</span></h2>
                <p style="color:#94a3b8;font-size:1rem;line-height:1.8;margin-bottom:2rem;">We don't just book trips. We craft seamless travel experiences backed by expertise, speed, and personal service from first inquiry to safe return.</p>
                <a href="#contact" class="btn btn-lg rounded-pill px-5 fw-bold text-dark" style="background:#38bdf8;">Plan My Trip <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
            <div class="col-lg-7">
                <div class="row g-3">
                    @php
                    $whys = [
                        ['icon'=>'bi-lightning-charge-fill','color'=>'#38bdf8','title'=>'Same-Day Ticketing','desc'=>'Flight tickets issued the same day. No delays, no excuses.'],
                        ['icon'=>'bi-shield-fill-check','color'=>'#22c55e','title'=>'100% Visa Success','desc'=>'Our visa applications have a near-perfect approval track record.'],
                        ['icon'=>'bi-headset','color'=>'#a78bfa','title'=>'24/7 Support','desc'=>'We are reachable around the clock via WhatsApp, call and email.'],
                        ['icon'=>'bi-cash-coin','color'=>'#fbbf24','title'=>'Best Price Guarantee','desc'=>'Competitive fares and packages — no hidden fees, ever.'],
                        ['icon'=>'bi-globe2','color'=>'#34d399','title'=>'50+ Destinations','desc'=>'Flights and visas to over 50 countries across all continents.'],
                        ['icon'=>'bi-person-check-fill','color'=>'#f87171','title'=>'Dedicated Agent','desc'=>'One personal agent handles your booking end-to-end.'],
                    ];
                    @endphp
                    @foreach($whys as $w)
                    <div class="col-sm-6">
                        <div class="d-flex gap-3 p-3 rounded-3 k2-why-mini">
                            <div style="width:42px;height:42px;background:rgba(255,255,255,0.06);border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.1rem;color:{{ $w['color'] }};">
                                <i class="bi {{ $w['icon'] }}"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-white" style="font-size:0.92rem;margin-bottom:3px;">{{ $w['title'] }}</div>
                                <div style="color:#64748b;font-size:0.8rem;line-height:1.5;">{{ $w['desc'] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .k2-why-mini { background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.06); transition:all 0.3s; }
    .k2-why-mini:hover { background:rgba(56,189,248,0.07); border-color:rgba(56,189,248,0.2); transform:translateY(-3px); }
</style>

{{-- ══════════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════════ --}}
<section class="py-5" style="background:#f0f9ff;" id="testimonials">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-3 py-2 mb-3" style="background:rgba(2,132,199,0.1);color:#0284c7;font-size:0.73rem;letter-spacing:1px;font-weight:700;">TESTIMONIALS</span>
            <h2 class="display-5 fw-bold mb-3">What Our Travellers Say</h2>
        </div>
        <div class="swiper k2-testi pb-5">
            <div class="swiper-wrapper">
                @php
                $testimonials = [
                    ['quote'=>'Kasimbagu sorted my Dubai visa in 2 days and booked the best hotel deal I could find. Absolutely seamless from start to finish!','name'=>'Amina Juma','role'=>'Business Traveller, Dar es Salaam','init'=>'AJ'],
                    ['quote'=>'I was worried about my UK visa but the team guided me perfectly. Everything was approved without a single problem. Highly recommended!','name'=>'Hassan Mwangi','role'=>'Student, Nairobi','init'=>'HM'],
                    ['quote'=>'We used them for our company retreat to Istanbul. The tour package, hotels and flights were all handled flawlessly. Will use again!','name'=>'Grace Kimani','role'=>'HR Manager, Mombasa','init'=>'GK'],
                    ['quote'=>'Same-day ticket to London when I had an emergency. I didn\'t think it was possible but Kasimbagu made it happen. Lifesavers!','name'=>'Omar Rashid','role'=>'Entrepreneur, Zanzibar','init'=>'OR'],
                ];
                @endphp
                @foreach($testimonials as $t)
                <div class="swiper-slide">
                    <div class="p-4 p-md-5 rounded-4 shadow-sm mx-2" style="background:white;border:1px solid #e0f2fe;">
                        <div class="mb-4" style="color:#38bdf8;font-size:3rem;line-height:1;">&ldquo;</div>
                        <p class="mb-4" style="font-size:1.05rem;line-height:1.8;color:#334155;">{{ $t['quote'] }}</p>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:48px;height:48px;background:linear-gradient(135deg,#0284c7,#38bdf8);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-weight:700;flex-shrink:0;">{{ $t['init'] }}</div>
                            <div>
                                <div class="fw-bold" style="color:#1a202c;">{{ $t['name'] }}</div>
                                <div class="small text-secondary">{{ $t['role'] }}</div>
                            </div>
                            <div class="ms-auto" style="color:#fbbf24;font-size:0.9rem;">
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

{{-- ══════════════════════════════════════════
     CONTACT / BOOKING FORM
══════════════════════════════════════════ --}}
<section class="py-5 bg-white" id="contact">
    <div class="container py-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <span class="badge rounded-pill px-3 py-2 mb-3" style="background:rgba(2,132,199,0.1);color:#0284c7;font-size:0.73rem;letter-spacing:1px;font-weight:700;">BOOK YOUR TRIP</span>
                <h2 class="display-5 fw-bold mb-4">Ready to <br><span style="color:#0284c7;">Take Off?</span></h2>
                <p class="text-secondary lead mb-5">Tell us your destination, dates, and requirements. We'll get back to you with a full quote within a few hours.</p>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:46px;height:46px;background:#0284c7;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-envelope-fill text-white"></i></div>
                        <div>
                            <div class="small fw-bold text-uppercase" style="color:#94a3b8;letter-spacing:1px;">Email</div>
                            <a href="mailto:travel@kasimbagu.com" class="text-dark fw-semibold text-decoration-none">travel@kasimbagu.com</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:46px;height:46px;background:#25d366;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-whatsapp text-white"></i></div>
                        <div>
                            <div class="small fw-bold text-uppercase" style="color:#94a3b8;letter-spacing:1px;">WhatsApp</div>
                            <a href="https://wa.me/255653291058" class="text-dark fw-semibold text-decoration-none">+255 653 291 058</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:46px;height:46px;background:#f59e0b;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-geo-alt-fill text-white"></i></div>
                        <div>
                            <div class="small fw-bold text-uppercase" style="color:#94a3b8;letter-spacing:1px;">Office</div>
                            <span class="text-dark fw-semibold">Dar es Salaam, Tanzania</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="p-4 p-md-5 rounded-4 shadow-sm" style="border:1px solid #e0f2fe;">
                    @if(session('status'))
                        <div class="alert alert-success rounded-3 mb-4">{{ session('status') }}</div>
                    @endif
                    <form action="{{ route('inquiry.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Full Name</label>
                                <input type="text" name="name" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="Your full name" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Phone / WhatsApp</label>
                                <input type="text" name="phone" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="+255 690 075 672" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="your@email.com" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Service Required</label>
                                <select name="service" class="form-select rounded-3 py-3 border-0 bg-light" required>
                                    <option value="">Select service...</option>
                                    <option>Flight Ticket</option>
                                    <option>Visa Assistance</option>
                                    <option>Hotel Booking</option>
                                    <option>Tour Package</option>
                                    <option>Airport Pickup</option>
                                    <option>Multiple Services</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Destination</label>
                                <input type="text" name="destination" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="e.g. Dubai, London...">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Additional Details</label>
                                <textarea name="message" class="form-control rounded-3 border-0 bg-light" rows="4" placeholder="Travel dates, number of passengers, any special requirements..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg w-100 rounded-pill fw-bold py-3 text-white shadow-sm" style="background:#0284c7;border-color:#0284c7;">
                                    <i class="bi bi-send-fill me-2"></i>Send Booking Request
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
    new Swiper('.k2-hero', {
        loop: true,
        autoplay: { delay: 5500, disableOnInteraction: false },
        pagination: { el: '.k2-hero .swiper-pagination', clickable: true },
        navigation: { nextEl: '.k2-hero-next', prevEl: '.k2-hero-prev' },
    });
    new Swiper('.k2-testi', {
        loop: true,
        autoplay: { delay: 4500, disableOnInteraction: false },
        pagination: { el: '.k2-testi .swiper-pagination', clickable: true },
        slidesPerView: 1,
        spaceBetween: 24,
        breakpoints: { 768: { slidesPerView: 2 } },
    });
</script>
@endsection
