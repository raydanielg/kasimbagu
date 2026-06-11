<!-- Target Clients Section -->
<section class="py-5" style="background:linear-gradient(135deg,#030c1e 0%,#071528 60%,#0e2040 100%);" id="target-clients">
    <div class="container py-5">
        <div class="text-center mb-5">
            <span style="display:inline-flex;align-items:center;background:rgba(124,58,237,0.12);border:1px solid rgba(124,58,237,0.35);color:#a78bfa;padding:5px 18px;border-radius:50px;font-size:0.73rem;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;" class="mb-3 d-inline-flex">
                <i class="bi bi-people-fill me-2"></i>Who We Serve
            </span>
            <h2 class="display-5 fw-bold text-white mb-3">Our <span style="background:linear-gradient(90deg,#a78bfa,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Target Clients</span></h2>
            <p class="text-secondary" style="color:#94a3b8;max-width:600px;margin:0 auto;font-size:1.05rem;line-height:1.7;">We serve a diverse range of clients across various sectors, providing tailored legal and consultancy solutions.</p>
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
                <div class="h-100 rounded-4 p-4 kasb-client-card" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);transition:all 0.3s;">
                    <div style="width:52px;height:52px;background:{{ $client['color'] }}22;border:1px solid {{ $client['color'] }}44;border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                        <i class="bi {{ $client['icon'] }}" style="color:{{ $client['color'] }};font-size:1.4rem;"></i>
                    </div>
                    <h5 class="text-white fw-bold mb-3" style="font-size:1.05rem;">{{ $client['title'] }}</h5>
                    <p style="color:#94a3b8;line-height:1.75;font-size:0.87rem;">{{ $client['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('about') }}" class="btn btn-warning btn-lg px-5 rounded-0 fw-bold shadow-lg">
                <i class="bi bi-arrow-right-circle me-2"></i>Learn More About Us
            </a>
        </div>
    </div>
</section>

<style>
    .kasb-client-card:hover { border-color:rgba(124,58,237,0.3) !important; transform:translateY(-5px); box-shadow:0 20px 50px rgba(0,0,0,0.35); }
</style>
