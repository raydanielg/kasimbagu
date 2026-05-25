@extends('layouts.app')

@section('title', 'Destinations | Kasimbagu Travel Agency — Flights & Visa Tanzania')
@section('description', 'Explore 50+ destinations served by Kasimbagu Travel Agency. Dubai, London, Istanbul, USA, China, India, Schengen and more. Visa assistance & flight booking from Tanzania.')
@section('og_title', 'Destinations — Kasimbagu Travel Agency')
@section('og_description', 'Dubai, UK, USA, Turkey, China, India & more. Visa assistance and flight booking from Tanzania.')

@section('content')

{{-- ── HERO ── --}}
<section class="position-relative overflow-hidden" style="background:linear-gradient(135deg,#030c1e 0%,#071528 60%,#0e2040 100%);padding:100px 0 70px;">
    <div style="position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,0.04) 1px,transparent 1px);background-size:28px 28px;pointer-events:none;"></div>
    <div style="position:absolute;bottom:-60px;left:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(16,185,129,0.15),transparent);border-radius:50%;filter:blur(70px);pointer-events:none;"></div>
    <div class="container position-relative" style="z-index:1;">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span style="display:inline-flex;align-items:center;background:rgba(59,130,246,0.12);border:1px solid rgba(59,130,246,0.35);color:#60a5fa;padding:5px 18px;border-radius:50px;font-size:0.73rem;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;" class="mb-3">
                    <i class="bi bi-globe-americas me-2"></i>Worldwide Destinations
                </span>
                <h1 class="display-4 fw-bold text-white mb-3">Explore the <span style="background:linear-gradient(90deg,#60a5fa,#3b82f6);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">World</span></h1>
                <p style="color:#94a3b8;font-size:1.1rem;max-width:580px;line-height:1.8;">We book flights and process visas to 50+ destinations worldwide. Wherever you want to go, Kasimbagu gets you there.</p>
            </div>
        </div>

        {{-- Region filter --}}
        <div class="mt-4">
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('destinations') }}" class="kasb-region-pill {{ $region === 'all' ? 'active' : '' }}">All Regions</a>
                @foreach($regions as $r)
                <a href="{{ route('destinations', ['region' => $r]) }}" class="kasb-region-pill {{ $region === $r ? 'active' : '' }}">{{ $r }}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ── POPULAR ── --}}
@if($popular->count() && $region === 'all')
<section style="background:#040d1e;border-bottom:1px solid rgba(255,255,255,0.06);">
    <div class="container py-5">
        <div class="d-flex align-items-center gap-3 mb-4">
            <span style="display:inline-flex;align-items:center;background:rgba(245,158,11,0.12);border:1px solid rgba(245,158,11,0.3);color:#fbbf24;padding:4px 14px;border-radius:50px;font-size:0.73rem;font-weight:700;letter-spacing:1px;text-transform:uppercase;">
                <i class="bi bi-fire me-1"></i>Most Popular
            </span>
            <div style="flex:1;height:1px;background:rgba(255,255,255,0.06);"></div>
        </div>
        <div class="row g-4">
            @foreach($popular as $d)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="kasb-dest-card rounded-4 overflow-hidden position-relative" style="height:280px;">
                    <img src="{{ $d->image_url }}" alt="{{ $d->name }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s;">
                    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(3,8,20,0.95) 0%,rgba(3,8,20,0.3) 55%,transparent 100%);"></div>
                    <div style="position:absolute;bottom:0;left:0;right:0;padding:20px;">
                        <div class="d-flex align-items-end justify-content-between">
                            <div>
                                <h5 class="text-white fw-bold mb-0" style="font-size:1.05rem;">{{ $d->name }}</h5>
                                <div style="color:#94a3b8;font-size:0.78rem;display:flex;align-items:center;gap:4px;margin-top:2px;">
                                    <i class="bi bi-geo-alt-fill" style="color:#fbbf24;font-size:0.65rem;"></i>{{ $d->country }}
                                </div>
                            </div>
                            <div>
                                @if($d->visa_required)
                                <span style="background:rgba(239,68,68,0.2);border:1px solid rgba(239,68,68,0.3);color:#fca5a5;padding:3px 8px;border-radius:20px;font-size:0.68rem;font-weight:700;">Visa Req.</span>
                                @else
                                <span style="background:rgba(16,185,129,0.2);border:1px solid rgba(16,185,129,0.3);color:#34d399;padding:3px 8px;border-radius:20px;font-size:0.68rem;font-weight:700;">Visa-free</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ── ALL DESTINATIONS ── --}}
<section style="background:#040d1e;">
    <div class="container py-5">
        <div class="d-flex align-items-center gap-3 mb-4">
            <h3 class="text-white fw-bold mb-0" style="font-size:1.2rem;">
                {{ $region === 'all' ? 'All Destinations' : $region }} 
                <span style="color:#64748b;font-size:0.85rem;font-weight:500;">({{ $destinations->count() }})</span>
            </h3>
            <div style="flex:1;height:1px;background:rgba(255,255,255,0.06);"></div>
        </div>

        <div class="row g-4">
            @forelse($destinations as $d)
            <div class="col-lg-4 col-md-6">
                <div class="kasb-dest-detail-card h-100 rounded-4 overflow-hidden" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);transition:all 0.3s;">
                    {{-- Image --}}
                    <div style="height:200px;overflow:hidden;position:relative;">
                        <img src="{{ $d->image_url }}" alt="{{ $d->name }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s;">
                        <div style="position:absolute;top:12px;right:12px;">
                            @if($d->visa_required)
                            <span style="background:rgba(0,0,0,0.7);backdrop-filter:blur(4px);border:1px solid rgba(239,68,68,0.4);color:#fca5a5;padding:3px 10px;border-radius:20px;font-size:0.7rem;font-weight:700;">
                                <i class="bi bi-passport me-1"></i>Visa Required
                            </span>
                            @else
                            <span style="background:rgba(0,0,0,0.7);backdrop-filter:blur(4px);border:1px solid rgba(16,185,129,0.4);color:#34d399;padding:3px 10px;border-radius:20px;font-size:0.7rem;font-weight:700;">
                                <i class="bi bi-check-circle me-1"></i>Visa-free
                            </span>
                            @endif
                        </div>
                        @if($d->is_popular)
                        <div style="position:absolute;top:12px;left:12px;">
                            <span style="background:rgba(245,158,11,0.9);color:#000;padding:3px 10px;border-radius:20px;font-size:0.68rem;font-weight:800;">🔥 Popular</span>
                        </div>
                        @endif
                    </div>
                    {{-- Content --}}
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h4 class="text-white fw-bold mb-0" style="font-size:1.1rem;">{{ $d->name }}</h4>
                                <div style="color:#64748b;font-size:0.82rem;display:flex;align-items:center;gap:4px;margin-top:2px;">
                                    <i class="bi bi-geo-alt-fill" style="color:#fbbf24;font-size:0.65rem;"></i>{{ $d->country }} · {{ $d->region }}
                                </div>
                            </div>
                        </div>
                        <p style="color:#94a3b8;font-size:0.88rem;line-height:1.65;margin-bottom:14px;">{{ Str::limit($d->description, 110) }}</p>

                        {{-- Meta row --}}
                        <div class="d-flex gap-3 mb-3" style="flex-wrap:wrap;">
                            @if($d->flight_duration)
                            <span style="color:#64748b;font-size:0.78rem;display:flex;align-items:center;gap:4px;">
                                <i class="bi bi-airplane" style="color:#60a5fa;"></i>{{ $d->flight_duration }}
                            </span>
                            @endif
                            @if($d->best_season)
                            <span style="color:#64748b;font-size:0.78rem;display:flex;align-items:center;gap:4px;">
                                <i class="bi bi-sun" style="color:#fbbf24;"></i>{{ $d->best_season }}
                            </span>
                            @endif
                            @if($d->visa_type)
                            <span style="color:#64748b;font-size:0.78rem;display:flex;align-items:center;gap:4px;">
                                <i class="bi bi-passport" style="color:#a78bfa;"></i>{{ $d->visa_type }}
                            </span>
                            @endif
                        </div>

                        {{-- Highlights --}}
                        @if($d->highlights)
                        <div class="d-flex flex-wrap gap-1 mb-4">
                            @foreach(array_slice($d->highlights, 0, 3) as $h)
                            <span style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.08);color:#94a3b8;padding:2px 10px;border-radius:20px;font-size:0.72rem;">{{ $h }}</span>
                            @endforeach
                        </div>
                        @endif

                        <a href="{{ route('contact') }}?destination={{ urlencode($d->name) }}" class="btn btn-sm w-100 rounded-pill fw-bold" style="background:rgba(59,130,246,0.12);border:1px solid rgba(59,130,246,0.3);color:#60a5fa;font-size:0.85rem;padding:8px;">
                            <i class="bi bi-send-fill me-1"></i>Book / Apply Visa
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-globe" style="font-size:3rem;color:#1e293b;"></i>
                <p style="color:#475569;margin-top:12px;">No destinations found for this region.</p>
                <a href="{{ route('destinations') }}" class="btn btn-outline-secondary rounded-pill mt-2">View All</a>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ── CTA ── --}}
<section class="py-5" style="background:linear-gradient(135deg,#030c1e 0%,#071528 100%);">
    <div class="container py-3 text-center">
        <h3 class="text-white fw-bold mb-2">Your destination is not listed?</h3>
        <p style="color:#94a3b8;margin-bottom:28px;">We serve 50+ destinations worldwide. Contact us and we will handle your travel from Tanzania.</p>
        <a href="{{ route('contact') }}" class="btn btn-warning btn-lg px-5 rounded-pill fw-bold shadow-lg">
            <i class="bi bi-chat-dots-fill me-2"></i>Ask About Any Destination
        </a>
    </div>
</section>

<style>
    .kasb-region-pill { display:inline-flex;align-items:center;padding:6px 18px;border-radius:50px;font-size:0.82rem;font-weight:600;color:#64748b;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);text-decoration:none;transition:all 0.2s; }
    .kasb-region-pill:hover,.kasb-region-pill.active { background:rgba(59,130,246,0.15);border-color:rgba(59,130,246,0.4);color:#60a5fa; }
    .kasb-dest-card:hover img { transform:scale(1.06); }
    .kasb-dest-detail-card:hover { border-color:rgba(59,130,246,0.3) !important; transform:translateY(-5px); box-shadow:0 20px 50px rgba(0,0,0,0.35); }
    .kasb-dest-detail-card:hover img { transform:scale(1.05); }
</style>
@endsection
