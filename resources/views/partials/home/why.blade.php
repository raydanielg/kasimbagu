{{-- Why Choose Us — Clean & Simple --}}
<section id="why" style="background:#0a0f1a;padding:80px 0;">
    <div class="container">
        <div class="text-center mb-5">
            <span style="color:#fbbf24;font-size:0.75rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;">Why Choose Us</span>
            <h2 class="text-white fw-bold mt-2" style="font-size:2.2rem;">Why <span style="color:#fbbf24;">Kasimbagu</span></h2>
            <p style="color:#64748b;max-width:500px;margin:12px auto 0;">Trusted by 500+ clients across East Africa for travel, legal, and consultancy services.</p>
        </div>

        <div class="row g-4">
            @foreach([
                ['bi-patch-check-fill','#3b82f6','Trusted','Licensed professionals, no hidden fees, fully transparent pricing.'],
                ['bi-lightning-charge-fill','#f59e0b','Fast','Same-day tickets, express visas in 24-72h, proposals within 24h.'],
                ['bi-globe-americas','#10b981','Global','50+ destinations, all major airlines, visa coverage worldwide.'],
                ['bi-headset','#8b5cf6','Support','WhatsApp, call & email. We are with you from inquiry to destination.']
            ] as $item)
            <div class="col-lg-3 col-md-6">
                <div class="kasb-why-card h-100 p-4 text-center" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:16px;transition:all 0.3s;">
                    <div style="width:56px;height:56px;background:{{ $item[1] }}22;border:1px solid {{ $item[1] }}44;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                        <i class="bi {{ $item[0] }}" style="color:{{ $item[1] }};font-size:1.4rem;"></i>
                    </div>
                    <h4 class="text-white fw-bold mb-2" style="font-size:1.1rem;">{{ $item[2] }}</h4>
                    <p style="color:#64748b;font-size:0.88rem;line-height:1.6;margin:0;">{{ $item[3] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="#cta" class="btn btn-warning px-5 py-3 rounded-pill fw-bold" style="font-size:1rem;">
                Get Started <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .kasb-why-card:hover { background:rgba(255,255,255,0.06) !important; border-color:rgba(255,255,255,0.12) !important; transform:translateY(-4px); }
</style>
