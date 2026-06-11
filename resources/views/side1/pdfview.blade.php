{{-- ═══ PDF VIEWER SECTION ═══ --}}
<section id="pdf-viewer" class="py-5 position-relative overflow-hidden" style="background:linear-gradient(140deg,#0a1c38 0%,#112644 60%,#0e2040 100%);">
    <div style="position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,0.04) 1px,transparent 1px);background-size:22px 22px;pointer-events:none;"></div>
    <div class="container py-4 position-relative" style="z-index:1;">
        <div class="text-center mb-5">
            <span class="k1-section-badge"><i class="bi bi-file-earmark-pdf-fill me-2"></i>Document</span>
            <h2 class="display-4 fw-bold text-white mt-2" style="font-family:'EB Garamond',serif;">Company <span style="color:var(--gold);">Profile</span></h2>
            <p style="color:#94a3b8;margin:12px auto 0;max-width:600px;">View our complete company profile document below.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="rounded-4 overflow-hidden" style="background:rgba(255,255,255,0.03);border:1px solid rgba(201,153,58,0.2);box-shadow:0 20px 60px rgba(0,0,0,0.4);">
                    <div style="height:800px;">
                        <iframe src="{{ asset('KASIMBAGU COMPANY PROFILE.pdf') }}"
                                style="width:100%;height:100%;border:none;"
                                title="Kasimbagu Company Profile"
                                loading="lazy">
                            <div style="padding:40px;text-align:center;color:#94a3b8;">
                                <i class="bi bi-file-earmark-pdf-fill" style="font-size:3rem;color:var(--gold);margin-bottom:20px;display:block;"></i>
                                <p style="font-size:1.1rem;margin-bottom:20px;">Your browser does not support PDF viewing.</p>
                                <a href="{{ asset('KASIMBAGU COMPANY PROFILE.pdf') }}" download
                                   class="btn btn-lg rounded-0 px-5 fw-bold text-dark"
                                   style="background:var(--gold);">
                                    <i class="bi bi-download me-2"></i>Download PDF
                                </a>
                            </div>
                        </iframe>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ asset('KASIMBAGU COMPANY PROFILE.pdf') }}" download
                       class="btn btn-lg rounded-0 px-5 fw-bold text-dark"
                       style="background:rgba(201,153,58,0.15);border:1px solid rgba(201,153,58,0.4);color:var(--gold);">
                        <i class="bi bi-download me-2"></i>Download Company Profile
                    </a>
                    <a href="#contact" class="btn btn-lg rounded-0 px-5 fw-bold text-dark ms-3" style="background:var(--gold);">
                        <i class="bi bi-chat-dots me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
