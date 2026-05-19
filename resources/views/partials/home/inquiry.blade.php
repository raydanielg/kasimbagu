<!-- Inquiry / Contact Section -->
<section class="py-5 bg-white overflow-hidden" id="cta">
    <div class="container py-5">
        <div class="row g-5 align-items-center">

            <!-- Left: Info -->
            <div class="col-lg-5">
                <h6 class="text-primary fw-bold text-uppercase small mb-3" style="letter-spacing:1px;">Get In Touch</h6>
                <h2 class="display-5 fw-bold mb-4">Ready to Travel or Grow Your Business?</h2>
                <p class="text-secondary lead mb-5">Fill in the form and our team will get back to you within 24 hours. We handle everything &mdash; from flight bookings to visa applications to business consulting.</p>

                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center text-white" style="width:48px;height:48px;background:#004a99;flex-shrink:0;">
                            <i class="bi bi-envelope-fill fs-5"></i>
                        </div>
                        <div>
                            <p class="fw-bold mb-0 small text-uppercase" style="letter-spacing:1px;color:#94a3b8;">Email</p>
                            <a href="mailto:info@kasimbagu.com" class="text-dark fw-semibold text-decoration-none">info@kasimbagu.com</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center text-white" style="width:48px;height:48px;background:#25d366;flex-shrink:0;">
                            <i class="bi bi-whatsapp fs-5"></i>
                        </div>
                        <div>
                            <p class="fw-bold mb-0 small text-uppercase" style="letter-spacing:1px;color:#94a3b8;">WhatsApp</p>
                            <a href="https://wa.me/255700000000" class="text-dark fw-semibold text-decoration-none">+255 700 000 000</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center text-white" style="width:48px;height:48px;background:#f59e0b;flex-shrink:0;">
                            <i class="bi bi-geo-alt-fill fs-5"></i>
                        </div>
                        <div>
                            <p class="fw-bold mb-0 small text-uppercase" style="letter-spacing:1px;color:#94a3b8;">Location</p>
                            <span class="text-dark fw-semibold">Dar es Salaam, Tanzania</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Form -->
            <div class="col-lg-7">
                <div class="p-4 p-md-5 rounded-4 shadow-sm" style="border:1px solid #f1f5f9;">
                    @if(session('success'))
                        <div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
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
                                <input type="text" name="phone" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="+255 700 000 000" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="your@email.com" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Service Needed</label>
                                <select name="service" class="form-select rounded-3 py-3 border-0 bg-light" required>
                                    <option value="">Select a service...</option>
                                    <option>Flight Booking</option>
                                    <option>Visa Assistance</option>
                                    <option>Hotel Booking</option>
                                    <option>Business Consultancy</option>
                                    <option>ICT Solutions</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small">Destination (if Travel)</label>
                                <input type="text" name="destination" class="form-control rounded-3 py-3 border-0 bg-light" placeholder="e.g. Dubai, UK, Turkey">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Message</label>
                                <textarea name="message" class="form-control rounded-3 border-0 bg-light" rows="4" placeholder="Tell us more about your needs..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg w-100 rounded-pill fw-bold py-3 shadow-sm text-white" style="background:#004a99;border-color:#004a99;">
                                    <i class="bi bi-send-fill me-2"></i>Send Inquiry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
