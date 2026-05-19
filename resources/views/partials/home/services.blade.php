<!-- Services Section -->
<section class="py-5 bg-white overflow-hidden" id="services">
    <div class="container py-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h6 class="text-primary fw-bold text-uppercase small mb-3" style="letter-spacing:1px;">What We Offer</h6>
                <h2 class="display-5 fw-bold mb-3">Our Services.</h2>
                <p class="lead text-secondary">End-to-end solutions in consultancy, technology, and global travel services.</p>
            </div>
            <div class="col-lg-6 text-lg-end">
                <p class="text-secondary">Our expert team delivers tailor-made solutions to help you navigate business and international travel with confidence.</p>
            </div>
        </div>

        <div class="swiper packages-slider pb-5">
            <div class="swiper-wrapper">

                <!-- Business Consultancy -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden kasb-pkg-card">
                        <div class="kasb-pkg-img position-relative">
                            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=600&q=80" class="card-img-top" alt="Business Consultancy" style="height:300px;object-fit:cover;">
                            <div class="kasb-pkg-overlay d-flex flex-column justify-content-end p-4">
                                <h6 class="text-white-50 text-uppercase small mb-2">Strategy</h6>
                                <h3 class="text-white fw-bold mb-3">Business Consultancy</h3>
                                <div class="kasb-pkg-details">
                                    <p class="text-white-50 small mb-4">Strategic advisory, operational planning, and organizational development to help your business grow sustainably.</p>
                                    <a href="#cta" class="btn btn-warning btn-sm px-4 rounded-pill fw-bold">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ICT Solutions -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden kasb-pkg-card">
                        <div class="kasb-pkg-img position-relative">
                            <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80" class="card-img-top" alt="ICT Solutions" style="height:300px;object-fit:cover;">
                            <div class="kasb-pkg-overlay d-flex flex-column justify-content-end p-4">
                                <h6 class="text-white-50 text-uppercase small mb-2">Technology</h6>
                                <h3 class="text-white fw-bold mb-3">ICT Solutions</h3>
                                <div class="kasb-pkg-details">
                                    <p class="text-white-50 small mb-4">Custom software, system integration, network infrastructure, and full digital transformation services.</p>
                                    <a href="#cta" class="btn btn-warning btn-sm px-4 rounded-pill fw-bold">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flight Ticketing -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden kasb-pkg-card">
                        <div class="kasb-pkg-img position-relative">
                            <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=600&q=80" class="card-img-top" alt="Flight Ticketing" style="height:300px;object-fit:cover;">
                            <div class="kasb-pkg-overlay d-flex flex-column justify-content-end p-4">
                                <h6 class="text-white-50 text-uppercase small mb-2">Travel</h6>
                                <h3 class="text-white fw-bold mb-3">Flight Ticketing</h3>
                                <div class="kasb-pkg-details">
                                    <p class="text-white-50 small mb-4">Competitive fares on all major airlines worldwide. Economy, business class, and group travel bookings.</p>
                                    <a href="#cta" class="btn btn-warning btn-sm px-4 rounded-pill fw-bold">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visa Assistance -->
                <div class="swiper-slide h-auto">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden kasb-pkg-card">
                        <div class="kasb-pkg-img position-relative">
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=600&q=80" class="card-img-top" alt="Visa Assistance" style="height:300px;object-fit:cover;">
                            <div class="kasb-pkg-overlay d-flex flex-column justify-content-end p-4">
                                <h6 class="text-white-50 text-uppercase small mb-2">Visa</h6>
                                <h3 class="text-white fw-bold mb-3">Visa Assistance</h3>
                                <div class="kasb-pkg-details">
                                    <p class="text-white-50 small mb-4">Professional processing for UAE, UK, USA, Schengen, China, India & more. Fast approvals guaranteed.</p>
                                    <a href="#cta" class="btn btn-warning btn-sm px-4 rounded-pill fw-bold">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="text-center mt-2">
            <p class="text-secondary">Our dedicated team is always ready to guide and support you every step of the way.</p>
        </div>
    </div>
</section>

<style>
    .kasb-pkg-card { transition: all 0.3s ease; }
    .kasb-pkg-img::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(to bottom, transparent 30%, rgba(0,0,0,0.88) 100%);
        z-index: 1;
    }
    .kasb-pkg-overlay { position: absolute; inset: 0; z-index: 2; transition: all 0.3s ease; }
    .kasb-pkg-details { max-height: 0; opacity: 0; overflow: hidden; transition: all 0.5s ease; }
    .kasb-pkg-card:hover .kasb-pkg-details { max-height: 200px; opacity: 1; }
    .kasb-pkg-card:hover { transform: translateY(-10px); }
    .kasb-pkg-card:hover img { transform: scale(1.08); transition: transform 0.8s ease; }
    .packages-slider .swiper-pagination-bullet { width: 10px; height: 10px; background: #004a99; opacity: 0.3; }
    .packages-slider .swiper-pagination-bullet-active { width: 25px; border-radius: 20px; background: #004a99; opacity: 1; }
</style>
