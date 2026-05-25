@extends('layouts.app')

@section('title', 'Contact Us | Kasimbagu Consultancy Agency — Tanzania')
@section('description', 'Contact Kasimbagu Consultancy Agency. Offices in Dar es Salaam and Moshi, Kilimanjaro. Call, WhatsApp, or email us. We respond within 24 hours.')
@section('og_title', 'Contact Kasimbagu Consultancy Agency')
@section('og_description', 'Reach us via phone, WhatsApp, or email. Offices in Dar es Salaam and Moshi, Kilimanjaro, Tanzania.')

@section('content')

{{-- ── HERO ── --}}
<section class="position-relative overflow-hidden" style="background:linear-gradient(135deg,#030c1e 0%,#071528 60%,#0e2040 100%);padding:100px 0 70px;">
    <div style="position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,0.04) 1px,transparent 1px);background-size:28px 28px;pointer-events:none;"></div>
    <div style="position:absolute;top:-80px;right:-60px;width:400px;height:400px;background:radial-gradient(circle,rgba(16,185,129,0.15),transparent);border-radius:50%;filter:blur(70px);pointer-events:none;"></div>
    <div class="container position-relative" style="z-index:1;">
        <span style="display:inline-flex;align-items:center;background:rgba(16,185,129,0.12);border:1px solid rgba(16,185,129,0.35);color:#34d399;padding:5px 18px;border-radius:50px;font-size:0.73rem;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;" class="mb-3 d-inline-flex">
            <i class="bi bi-chat-dots-fill me-2"></i>Get In Touch
        </span>
        <h1 class="display-4 fw-bold text-white mb-3">Contact <span style="background:linear-gradient(90deg,#34d399,#10b981);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Us</span></h1>
        <p style="color:#94a3b8;font-size:1.1rem;max-width:560px;line-height:1.8;">We are always ready to help. Send a message, call, or WhatsApp us and our team will respond within 24 hours.</p>
    </div>
</section>

{{-- ── MAIN CONTENT ── --}}
<section style="background:#040d1e;">
    <div class="container py-5">
        <div class="row g-5">

            {{-- ── LEFT: CONTACT DETAILS ── --}}
            <div class="col-lg-5">

                {{-- Quick contact cards --}}
                <div class="d-flex flex-column gap-3 mb-5">
                    @foreach([
                        ['bi-telephone-fill','#3b82f6','Call Us','+255 690 075 672','tel:+255690075672','Call Now'],
                        ['bi-whatsapp','#25d366','WhatsApp','+255 653 291 058','https://wa.me/255653291058','Chat on WhatsApp'],
                        ['bi-envelope-fill','#f59e0b','Email Us','info@kasimbagu.com','mailto:info@kasimbagu.com','Send Email'],
                    ] as [$icon,$color,$label,$val,$href,$cta])
                    <div class="rounded-4 p-4 d-flex align-items-center gap-4" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
                        <div style="width:54px;height:54px;background:{{ $color }}22;border:1px solid {{ $color }}44;border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="bi {{ $icon }}" style="color:{{ $color }};font-size:1.3rem;"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div style="color:#64748b;font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:2px;">{{ $label }}</div>
                            <div class="text-white fw-semibold" style="font-size:0.95rem;">{{ $val }}</div>
                        </div>
                        <a href="{{ $href }}" target="{{ str_starts_with($href,'http') ? '_blank' : '_self' }}" class="btn btn-sm rounded-pill fw-bold flex-shrink-0" style="background:{{ $color }}22;border:1px solid {{ $color }}44;color:{{ $color }};font-size:0.78rem;white-space:nowrap;">
                            {{ $cta }}
                        </a>
                    </div>
                    @endforeach
                </div>

                {{-- Office locations --}}
                <h4 class="text-white fw-bold mb-3" style="font-size:1.1rem;">Our Offices</h4>
                <div class="d-flex flex-column gap-3">

                    <div class="rounded-4 p-4" style="background:rgba(0,74,153,0.08);border:1px solid rgba(0,74,153,0.25);">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <i class="bi bi-geo-alt-fill" style="color:#60a5fa;"></i>
                            <span class="text-white fw-bold" style="font-size:0.95rem;">Dar es Salaam</span>
                            <span style="background:rgba(0,74,153,0.2);border:1px solid rgba(0,74,153,0.4);color:#60a5fa;padding:2px 8px;border-radius:20px;font-size:0.65rem;font-weight:700;margin-left:4px;">HEAD OFFICE</span>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <div style="color:#94a3b8;font-size:0.85rem;display:flex;align-items:center;gap:8px;">
                                <i class="bi bi-envelope" style="color:#475569;width:14px;"></i>info@kasimbagu.com
                            </div>
                            <div style="color:#94a3b8;font-size:0.85rem;display:flex;align-items:center;gap:8px;">
                                <i class="bi bi-telephone" style="color:#475569;width:14px;"></i>+255 690 075 672
                            </div>
                            <div style="color:#94a3b8;font-size:0.85rem;display:flex;align-items:center;gap:8px;">
                                <i class="bi bi-clock" style="color:#475569;width:14px;"></i>Mon–Fri: 8:00am – 5:00pm · Sat: 9am–1pm
                            </div>
                        </div>
                    </div>

                    <div class="rounded-4 p-4" style="background:rgba(16,185,129,0.06);border:1px solid rgba(16,185,129,0.2);">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <i class="bi bi-geo-alt-fill" style="color:#34d399;"></i>
                            <span class="text-white fw-bold" style="font-size:0.95rem;">Moshi, Kilimanjaro</span>
                            <span style="background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.3);color:#34d399;padding:2px 8px;border-radius:20px;font-size:0.65rem;font-weight:700;margin-left:4px;">BRANCH</span>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <div style="color:#94a3b8;font-size:0.85rem;display:flex;align-items:center;gap:8px;">
                                <i class="bi bi-envelope" style="color:#475569;width:14px;"></i>moshi@kasimbagu.com
                            </div>
                            <div style="color:#94a3b8;font-size:0.85rem;display:flex;align-items:center;gap:8px;">
                                <i class="bi bi-telephone" style="color:#475569;width:14px;"></i>+255 653 291 058
                            </div>
                            <div style="color:#94a3b8;font-size:0.85rem;display:flex;align-items:center;gap:8px;">
                                <i class="bi bi-clock" style="color:#475569;width:14px;"></i>Mon–Fri: 8:00am – 5:00pm · Sat: 9am–12pm
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Social --}}
                <div class="mt-4">
                    <div style="color:#64748b;font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;">Follow Us</div>
                    <div class="d-flex gap-2">
                        @foreach([['bi-facebook','#1877f2','https://facebook.com/kasimbagu'],['bi-linkedin','#0a66c2','https://linkedin.com/company/kasimbagu'],['bi-twitter-x','#e2e8f0','https://twitter.com/kasimbagu'],['bi-instagram','#e1306c','https://instagram.com/kasimbagu']] as [$ic,$col,$link])
                        <a href="{{ $link }}" target="_blank" style="width:40px;height:40px;background:{{ $col }}18;border:1px solid {{ $col }}44;border-radius:10px;display:flex;align-items:center;justify-content:center;color:{{ $col }};text-decoration:none;font-size:1rem;transition:all 0.2s;">
                            <i class="bi {{ $ic }}"></i>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- ── RIGHT: CONTACT FORM ── --}}
            <div class="col-lg-7">
                <div class="rounded-4 p-4 p-lg-5" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);backdrop-filter:blur(10px);">

                    <div class="mb-4">
                        <h3 class="text-white fw-bold mb-1" style="font-size:1.5rem;">Send Us a Message</h3>
                        <p style="color:#64748b;font-size:0.88rem;margin:0;">Fill in the form and we will respond within <strong style="color:#fbbf24;">24 hours</strong>.</p>
                    </div>

                    @if(session('success'))
                    <div class="rounded-3 mb-4 p-3" style="background:rgba(16,185,129,0.12);border:1px solid rgba(16,185,129,0.3);color:#34d399;">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="kasb-label">Full Name</label>
                                <input type="text" name="name" class="kasb-field form-control rounded-3 py-3" placeholder="Your full name" value="{{ old('name') }}" required>
                                @error('name')<div class="kasb-error">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="kasb-label">Phone / WhatsApp</label>
                                <input type="text" name="phone" class="kasb-field form-control rounded-3 py-3" placeholder="+255 690 075 672" value="{{ old('phone') }}">
                            </div>
                            <div class="col-12">
                                <label class="kasb-label">Email Address</label>
                                <input type="email" name="email" class="kasb-field form-control rounded-3 py-3" placeholder="your@email.com" value="{{ old('email') }}" required>
                                @error('email')<div class="kasb-error">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="kasb-label">Subject</label>
                                <input type="text" name="subject" class="kasb-field form-control rounded-3 py-3" placeholder="e.g. Visa Application" value="{{ old('subject', request('service')) }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="kasb-label">Service Needed</label>
                                <select name="service" class="kasb-field form-select rounded-3 py-3">
                                    <option value="">Select a service...</option>
                                    <optgroup label="✈ Travel & Visa">
                                        <option {{ old('service') == 'Flight Booking' ? 'selected' : '' }}>Flight Booking</option>
                                        <option {{ old('service') == 'Visa Assistance' ? 'selected' : '' }}>Visa Assistance</option>
                                        <option {{ old('service') == 'Hotel Booking' ? 'selected' : '' }}>Hotel Booking</option>
                                        <option>Airport Transfer</option>
                                    </optgroup>
                                    <optgroup label="⚖ Legal & Consultancy">
                                        <option>Legal Advice / Litigation</option>
                                        <option>Contract Review</option>
                                        <option>Immigration Law</option>
                                        <option>Research & Proposal Writing</option>
                                        <option>Business Plan / Concept Note</option>
                                    </optgroup>
                                    <optgroup label="🏢 Company Registration">
                                        <option>BRELA / Business Registration</option>
                                        <option>NGO / CSO Registration</option>
                                        <option>CRB / Construction Registration</option>
                                        <option>Tax Compliance / TIN</option>
                                    </optgroup>
                                    <optgroup label="💡 Other">
                                        <option>ICT Solutions</option>
                                        <option>Other / General Inquiry</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="kasb-label">Destination <span style="color:#475569;">(if Travel)</span></label>
                                <input type="text" name="destination" class="kasb-field form-control rounded-3 py-3" placeholder="e.g. Dubai, UK, Turkey" value="{{ old('destination', request('destination')) }}">
                            </div>
                            <div class="col-12">
                                <label class="kasb-label">Your Message</label>
                                <textarea name="message" class="kasb-field form-control rounded-3" rows="5" placeholder="Tell us about your needs in detail..." required>{{ old('message') }}</textarea>
                                @error('message')<div class="kasb-error">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-warning btn-lg w-100 rounded-pill fw-bold py-3 shadow-lg" style="font-size:1rem;">
                                    <i class="bi bi-send-fill me-2"></i>Send Message
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-wrap justify-content-center gap-3">
                                    <span style="color:#475569;font-size:0.78rem;display:flex;align-items:center;gap:5px;"><i class="bi bi-shield-lock-fill" style="color:#10b981;"></i>100% Secure</span>
                                    <span style="color:#475569;font-size:0.78rem;display:flex;align-items:center;gap:5px;"><i class="bi bi-clock-fill" style="color:#3b82f6;"></i>Reply within 24h</span>
                                    <span style="color:#475569;font-size:0.78rem;display:flex;align-items:center;gap:5px;"><i class="bi bi-whatsapp" style="color:#25d366;"></i>WhatsApp Available</span>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .kasb-label { display:block;color:#94a3b8;font-size:0.8rem;font-weight:700;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:6px; }
    .kasb-field { background:rgba(255,255,255,0.06) !important; border:1px solid rgba(255,255,255,0.1) !important; color:#e2e8f0 !important; transition:all 0.25s; }
    .kasb-field::placeholder { color:#475569 !important; }
    .kasb-field:focus { background:rgba(255,255,255,0.09) !important; border-color:rgba(16,185,129,0.5) !important; box-shadow:0 0 0 3px rgba(16,185,129,0.1) !important; color:#f1f5f9 !important; outline:none; }
    .kasb-field option,.kasb-field optgroup { background:#0d1b35; color:#e2e8f0; }
    .kasb-error { color:#fca5a5; font-size:0.78rem; margin-top:4px; }
</style>
@endsection
