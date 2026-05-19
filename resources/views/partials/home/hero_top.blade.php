<style>
    .hero-slider { width: 100%; height: 620px; position: relative; }
    .hero-slide { background-size: cover; background-position: center; position: relative; display: flex; align-items: center; }
    .hero-slide::before { content: ''; position: absolute; inset: 0; background: linear-gradient(rgba(0,74,153,0.68), rgba(0,30,80,0.45)); z-index: 1; }
    .hero-content { position: relative; z-index: 2; color: white; }
    .floating-badge { background: rgba(255,193,7,0.92); color: #1a1a1a; padding: 6px 18px; border-radius: 50px; display: inline-block; font-weight: 700; font-size: 0.85rem; margin-bottom: 22px; letter-spacing: 0.5px; }
    .hero-pagination { bottom: 24px !important; }
    .hero-pagination .swiper-pagination-bullet { width: 12px; height: 12px; background: #fff; opacity: 0.5; transition: all 0.3s ease; }
    .hero-pagination .swiper-pagination-bullet-active { width: 32px; border-radius: 20px; background: #ffc107; opacity: 1; }
    @media (max-width: 768px) { .hero-slider { height: 480px; } }
</style>

<div class="swiper hero-slider">
    <div class="swiper-wrapper">

        <!-- Slide 1: Business Consultancy -->
        <div class="swiper-slide hero-slide" style="background-image:url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1600&q=80');">
            <div class="container hero-content">
                <div class="row">
                    <div class="col-lg-7">
                        <span class="floating-badge animate__animated animate__fadeInDown">Business Consultancy</span>
                        <h1 class="display-2 fw-bold mb-4 animate__animated animate__fadeInUp" style="animation-delay:0.2s;">
                            Expert Advice <span class="text-warning">That Drives Growth</span>
                        </h1>
                        <p class="lead mb-5 animate__animated animate__fadeInUp" style="animation-delay:0.4s;opacity:0.9;">
                            We partner with organizations to deliver strategic consulting, ICT solutions, and operational excellence across East Africa.
                        </p>
                        <div class="d-flex flex-wrap gap-3 animate__animated animate__fadeInUp" style="animation-delay:0.6s;">
                            <a href="#cta" class="btn btn-warning btn-lg px-5 rounded-pill fw-bold shadow">Get a Consultation</a>
                            <a href="#services" class="btn btn-outline-light btn-lg px-5 rounded-pill">Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2: Flight & Travel -->
        <div class="swiper-slide hero-slide" style="background-image:url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1600&q=80');">
            <div class="container hero-content text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <span class="floating-badge animate__animated animate__fadeInDown">Flight Ticketing</span>
                        <h1 class="display-2 fw-bold mb-4 animate__animated animate__fadeInUp" style="animation-delay:0.2s;">
                            Fly Anywhere, <span class="text-warning">Hassle-Free</span>
                        </h1>
                        <p class="lead mb-5 animate__animated animate__fadeInUp" style="animation-delay:0.4s;opacity:0.9;">
                            Competitive fares on all major airlines. Business, economy, and group travel booking to 50+ worldwide destinations.
                        </p>
                        <a href="#cta" class="btn btn-warning btn-lg px-5 rounded-pill fw-bold shadow animate__animated animate__fadeInUp" style="animation-delay:0.6s;">Book a Flight</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3: Visa Assistance -->
        <div class="swiper-slide hero-slide" style="background-image:url('https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=1600&q=80');">
            <div class="container hero-content text-end">
                <div class="row justify-content-end">
                    <div class="col-lg-7">
                        <span class="floating-badge animate__animated animate__fadeInDown">Visa Assistance</span>
                        <h1 class="display-2 fw-bold mb-4 animate__animated animate__fadeInUp" style="animation-delay:0.2s;">
                            Visa Approved, <span class="text-warning">Faster</span>
                        </h1>
                        <p class="lead mb-5 animate__animated animate__fadeInUp" style="animation-delay:0.4s;opacity:0.9;">
                            Professional processing for UAE, UK, USA, Schengen, China, India & more. We handle the paperwork — you focus on your journey.
                        </p>
                        <a href="#cta" class="btn btn-warning btn-lg px-5 rounded-pill fw-bold shadow animate__animated animate__fadeInUp" style="animation-delay:0.6s;">Apply for Visa</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="swiper-pagination hero-pagination"></div>
</div>
