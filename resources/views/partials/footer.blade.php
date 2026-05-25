<footer class="kasb-footer pt-5 pb-3">
    <div class="container">
        <div class="row gy-4">

            <!-- Brand Column -->
            <div class="col-lg-4 col-md-6">
                <div class="mb-4">
                    <span class="badge rounded-pill px-3 py-2 mb-3 shadow-sm" style="background-color:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.1);font-size:0.7rem;letter-spacing:0.5px;">
                        <i class="bi bi-globe2 text-warning me-1"></i> CONSULTANCY &amp; TRAVEL
                    </span>
                    <h3 class="fw-bold mb-3">
                        <span style="color:#60a5fa;">Kasim</span><span style="color:#fbbf24;">bagu</span>
                    </h3>
                    <p class="text-secondary small pe-lg-4" style="line-height:1.8;">
                        Kasimbagu empowers individuals and businesses across East Africa with world-class travel services, visa assistance, and strategic consultancy solutions.
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="#" class="kasb-social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="kasb-social"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="kasb-social"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="kasb-social"><i class="bi bi-instagram"></i></a>
                    <a href="https://wa.me/255653291058" class="kasb-social" style="background:#25d366;"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-4 text-uppercase small" style="letter-spacing:1px;">Quick Links</h6>
                <ul class="list-unstyled kasb-footer-links">
                    <li><a href="{{ url('/') }}"><i class="bi bi-chevron-right me-2 text-warning"></i>Home</a></li>
                    <li><a href="{{ route('services') }}"><i class="bi bi-chevron-right me-2 text-warning"></i>Services</a></li>
                    <li><a href="{{ route('destinations') }}"><i class="bi bi-chevron-right me-2 text-warning"></i>Destinations</a></li>
                    <li><a href="{{ route('about') }}#why"><i class="bi bi-chevron-right me-2 text-warning"></i>Why Us</a></li>
                    <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right me-2 text-warning"></i>Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-4 text-uppercase small" style="letter-spacing:1px;">Services</h6>
                <ul class="list-unstyled kasb-footer-links">
                    <li><a href="{{ route('contact') }}?service=Flight Booking"><i class="bi bi-chevron-right me-2 text-success"></i>Flight Booking</a></li>
                    <li><a href="{{ route('contact') }}?service=Visa Assistance"><i class="bi bi-chevron-right me-2 text-success"></i>Visa Assistance</a></li>
                    <li><a href="{{ route('contact') }}?service=Hotel Booking"><i class="bi bi-chevron-right me-2 text-success"></i>Hotel Booking</a></li>
                    <li><a href="{{ route('contact') }}?service=Legal Services"><i class="bi bi-chevron-right me-2 text-success"></i>Consultancy</a></li>
                    <li><a href="{{ route('contact') }}?service=ICT Solutions"><i class="bi bi-chevron-right me-2 text-success"></i>ICT Solutions</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div class="col-lg-2 col-6">
                <h6 class="fw-bold mb-4 text-uppercase small" style="letter-spacing:1px;">Legal</h6>
                <ul class="list-unstyled kasb-footer-links">
                    <li><a href="#"><i class="bi bi-chevron-right me-2 text-warning"></i>Privacy Policy</a></li>
                    <li><a href="#"><i class="bi bi-chevron-right me-2 text-warning"></i>Terms & Conditions</a></li>
                    <li><a href="{{ route('login') }}"><i class="bi bi-chevron-right me-2 text-warning"></i>Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="bi bi-chevron-right me-2 text-warning"></i>Register</a></li>
                </ul>
            </div>

        </div>

        <!-- Divider + Contact + Newsletter -->
        <div class="row mt-5 pt-4" style="border-top:1px solid rgba(255,255,255,0.06);">
            <div class="col-lg-4">
                <h6 class="fw-bold mb-3 small text-uppercase" style="letter-spacing:1px;">Contact Us</h6>
                <div class="kasb-footer-contact">
                    <p class="mb-2"><i class="bi bi-geo-alt-fill text-warning me-2"></i>Dar es Salaam, Tanzania</p>
                    <p class="mb-2"><i class="bi bi-envelope-fill text-warning me-2"></i><a href="mailto:info@kasimbagu.com" class="text-secondary text-decoration-none">info@kasimbagu.com</a></p>
                    <p class="mb-0"><i class="bi bi-telephone-fill text-warning me-2"></i><a href="tel:+255690075672" class="text-secondary text-decoration-none">+255 690 075 672</a></p>
                </div>
            </div>

            <div class="col-lg-8 mt-4 mt-lg-0">
                <h6 class="fw-bold mb-3 small text-uppercase" style="letter-spacing:1px;">Stay Updated</h6>
                <p class="text-secondary small mb-3">Subscribe to our newsletter for travel deals, visa tips, and business insights.</p>
                <form id="newsletterForm" class="row g-2">
                    @csrf
                    <div class="col-sm-8 col-md-9">
                        <input type="email" id="newsletterEmail" name="email" class="form-control border-0 py-2 shadow-none" placeholder="Enter your email address" style="background-color:rgba(255,255,255,0.05);color:white;" required>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <button type="submit" id="newsletterBtn" class="btn btn-primary w-100 py-2 fw-bold">
                            <i class="bi bi-send-fill me-2"></i>Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-5">
            <div class="col-12 text-center" style="color:#475569;font-size:0.88rem;">
                <p class="mb-0">
                    &copy; {{ date('Y') }} Kasimbagu. All rights reserved. &nbsp;|
                    <a href="{{ url('/') }}" class="text-secondary text-decoration-none ms-2 hover-white">Home</a> |
                    <a href="{{ route('login') }}" class="text-secondary text-decoration-none ms-2 hover-white">Login</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    .kasb-footer {
        background-color: #0b1120;
        color: #94a3b8;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }
    .kasb-footer h3, .kasb-footer h6 { color: white; }
    .kasb-footer-links a {
        color: #94a3b8;
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 12px;
        transition: all 0.3s ease;
    }
    .kasb-footer-links a:hover { color: white; transform: translateX(5px); }
    .kasb-footer-contact p { color: #94a3b8; font-size: 0.9rem; }
    .kasb-social {
        width: 36px; height: 36px;
        background-color: rgba(255,255,255,0.06);
        display: inline-flex; align-items: center; justify-content: center;
        border-radius: 50%; color: #94a3b8;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .kasb-social:hover { background-color: #004a99; color: white; transform: translateY(-3px); }
    .form-control::placeholder { color: #64748b; font-size: 0.85rem; }
    .hover-white:hover { color: white !important; }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('newsletterForm');
    const btn = document.getElementById('newsletterBtn');
    const emailInput = document.getElementById('newsletterEmail');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = emailInput.value.trim();
            if (!email) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Email Required',
                    text: 'Please enter your email address.',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false
                });
                return;
            }

            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Subscribing...';

            fetch('{{ route("newsletter.subscribe") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        toast: true,
                        position: 'top-end',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    emailInput.value = '';
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                        toast: true,
                        position: 'top-end',
                        timer: 3000,
                        showConfirmButton: false
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false
                });
            })
            .finally(() => {
                btn.disabled = false;
                btn.innerHTML = originalText;
            });
        });
    }
});
</script>
