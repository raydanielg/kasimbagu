{{-- Contact Section — Clean & Simple --}}
<section id="cta" style="background:#0a0f1a;padding:80px 0;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-white fw-bold" style="font-size:2.2rem;">Contact <span style="color:#fbbf24;">Us</span></h2>
            <p style="color:#64748b;max-width:500px;margin:12px auto 0;">Send us a message and we will respond within 24 hours.</p>
        </div>

        <div class="row g-5">
            {{-- Left: Contact Info --}}
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-4">
                    @foreach([
                        ['bi-telephone-fill','+255 690 075 672','tel:+255690075672'],
                        ['bi-envelope-fill','info@kasimbagu.com','mailto:info@kasimbagu.com'],
                        ['bi-geo-alt-fill','Dar es Salaam, Tanzania','#'],
                        ['bi-whatsapp','+255 653 291 058','https://wa.me/255653291058']
                    ] as $item)
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:48px;height:48px;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="bi {{ $item[0] }}" style="color:#fbbf24;font-size:1.2rem;"></i>
                        </div>
                        <a href="{{ $item[2] }}" target="{{ str_starts_with($item[2],'http') ? '_blank' : '_self' }}" class="text-decoration-none" style="color:#e2e8f0;font-size:0.95rem;">{{ $item[1] }}</a>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Right: Form --}}
            <div class="col-lg-8">
                <div class="rounded-4 p-4 p-md-5" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);">
                    @if(session('success'))
                        <div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('inquiry.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-white fw-semibold" style="font-size:0.85rem;">Full Name</label>
                                <input type="text" name="name" class="form-control rounded-3 py-2" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:#e2e8f0;" placeholder="Your name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white fw-semibold" style="font-size:0.85rem;">Phone</label>
                                <input type="text" name="phone" class="form-control rounded-3 py-2" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:#e2e8f0;" placeholder="+255 690 075 672" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white fw-semibold" style="font-size:0.85rem;">Email</label>
                                <input type="email" name="email" class="form-control rounded-3 py-2" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:#e2e8f0;" placeholder="your@email.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white fw-semibold" style="font-size:0.85rem;">Service</label>
                                <select name="service" class="form-select rounded-3 py-2" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:#e2e8f0;">
                                    <option value="">Select service...</option>
                                    <option>Flight Booking</option>
                                    <option>Visa Assistance</option>
                                    <option>Legal Services</option>
                                    <option>Company Registration</option>
                                    <option>Research & Consultancy</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white fw-semibold" style="font-size:0.85rem;">Destination</label>
                                <input type="text" name="destination" class="form-control rounded-3 py-2" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:#e2e8f0;" placeholder="e.g. Dubai">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white fw-semibold" style="font-size:0.85rem;">Message</label>
                                <textarea name="message" class="form-control rounded-3" rows="4" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:#e2e8f0;" placeholder="Your message..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning w-100 rounded-pill fw-bold py-2">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
