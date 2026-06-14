@extends('side1.layout')

@section('content')

<style>
    /* ══ HERO ══ */
    .team-hero {
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0a1f3d 100%);
        position: relative; overflow: hidden;
        padding: 100px 0 80px;
    }
    .team-hero-grid {
        position: absolute; inset: 0;
        background-image:
            linear-gradient(rgba(201,153,58,0.04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(201,153,58,0.04) 1px, transparent 1px);
        background-size: 60px 60px; pointer-events: none;
    }
    .team-hero::before {
        content: ''; position: absolute; inset: 0;
        background:
            radial-gradient(ellipse 60% 50% at 85% 50%, rgba(201,153,58,0.09) 0%, transparent 70%),
            radial-gradient(ellipse 40% 60% at 10% 80%, rgba(13,148,136,0.05) 0%, transparent 70%);
        pointer-events: none;
    }
    .team-hero::after {
        content: ''; position: absolute;
        bottom: 0; left: 0; right: 0; height: 1px;
        background: linear-gradient(90deg, transparent, rgba(201,153,58,0.5), transparent);
    }

    /* ══ TEAM CARDS ══ */
    .team-section { padding: 80px 0 90px; background: #f4f2ee; }

    .tcard {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(9,22,40,0.08);
        border: 1px solid rgba(201,153,58,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }
    .tcard:hover {
        transform: translateY(-10px);
        box-shadow: 0 24px 56px rgba(9,22,40,0.15);
    }

    /* Gold top bar */
    .tcard-bar {
        height: 4px;
        background: linear-gradient(90deg, var(--gold), var(--gold-light));
    }

    /* Photo */
    .tcard-img {
        width: 100%;
        height: 340px;
        object-fit: cover;
        object-position: center top;
        display: block;
        transition: transform 0.5s ease;
    }
    .tcard:hover .tcard-img { transform: scale(1.04); }

    .tcard-img-wrap {
        overflow: hidden;
        position: relative;
    }
    .tcard-img-wrap::after {
        content: '';
        position: absolute; bottom: 0; left: 0; right: 0;
        height: 90px;
        background: linear-gradient(to top, rgba(9,22,40,0.55) 0%, transparent 100%);
        pointer-events: none;
    }

    /* Badge */
    .tcard-badge {
        position: absolute;
        top: 16px; right: 16px;
        background: linear-gradient(135deg, var(--gold), var(--gold-light));
        color: var(--navy);
        font-size: 0.62rem; font-weight: 800;
        letter-spacing: 1.2px; text-transform: uppercase;
        padding: 4px 12px; border-radius: 50px;
        z-index: 2;
    }

    /* Body */
    .tcard-body { padding: 22px 24px 28px; text-align: center; }

    .tcard-name {
        font-family: 'EB Garamond', Georgia, serif;
        font-size: 1.25rem; font-weight: 700;
        color: var(--navy); line-height: 1.3; margin-bottom: 8px;
    }

    .tcard-rule {
        width: 36px; height: 2px;
        background: linear-gradient(90deg, var(--gold), var(--gold-light));
        border-radius: 2px;
        margin: 0 auto 10px;
    }

    .tcard-role {
        font-size: 0.75rem; font-weight: 700;
        letter-spacing: 1px; text-transform: uppercase;
        color: var(--gold); line-height: 1.5; margin-bottom: 14px;
    }

    .tcard-dept {
        display: inline-flex; align-items: center; gap: 6px;
        font-size: 0.78rem; color: #64748b;
        background: rgba(201,153,58,0.07);
        border: 1px solid rgba(201,153,58,0.18);
        padding: 4px 14px; border-radius: 50px;
    }
    .tcard-dept i { color: var(--gold); font-size: 0.75rem; }

    /* ══ STATS ══ */
    .team-stats {
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
        padding: 70px 0; position: relative; overflow: hidden;
    }
    .team-stats::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse 50% 80% at 50% 50%, rgba(201,153,58,0.06) 0%, transparent 70%);
    }
    .stat-box { text-align: center; }
    .stat-num {
        font-family: 'EB Garamond', serif;
        font-size: 3rem; font-weight: 800;
        color: var(--gold); line-height: 1; display: block;
    }
    .stat-label {
        font-size: 0.75rem; color: rgba(255,255,255,0.5);
        text-transform: uppercase; letter-spacing: 1.2px; margin-top: 8px;
    }

    /* ══ VALUES ══ */
    .team-values { padding: 90px 0; background: #fff; }
    .value-card {
        text-align: center; padding: 38px 22px;
        border-radius: 18px; background: #f8f6f1;
        border: 1px solid rgba(201,153,58,0.1);
        transition: box-shadow 0.3s, transform 0.3s;
    }
    .value-card:hover { box-shadow: 0 12px 40px rgba(9,22,40,0.09); transform: translateY(-4px); }
    .value-icon {
        width: 56px; height: 56px;
        background: linear-gradient(135deg, rgba(201,153,58,0.13), rgba(201,153,58,0.05));
        border: 1px solid rgba(201,153,58,0.25); border-radius: 14px;
        display: inline-flex; align-items: center; justify-content: center;
        margin-bottom: 18px; font-size: 1.4rem; color: var(--gold);
    }
    .value-card h6 {
        font-family: 'EB Garamond', serif;
        font-size: 1.1rem; font-weight: 700;
        color: var(--navy); margin-bottom: 8px;
    }
    .value-card p { font-size: 0.83rem; color: #64748b; line-height: 1.75; margin: 0; }

    /* ══ RESPONSIVE ══ */
    @media (max-width: 576px) {
        .tcard-img { height: 280px; }
        .team-hero { padding: 75px 0 65px; }
    }
</style>

<!-- ══ HERO ══ -->
<section class="team-hero">
    <div class="team-hero-grid"></div>
    <div class="container position-relative text-center" style="z-index:2;">
        <div class="k1-section-badge mb-3"><i class="bi bi-people-fill me-2"></i>Our People</div>
        <h1 class="display-4 fw-bold text-white mb-3" style="letter-spacing:-0.5px;">
            Meet the <span style="color:var(--gold);">Team</span>
        </h1>
        <p class="text-white mx-auto" style="max-width:540px;opacity:0.6;font-size:1rem;line-height:1.9;">
            Dedicated professionals united by one mission — delivering expert legal, research, and consultancy services across Tanzania.
        </p>
        <nav aria-label="breadcrumb" class="mt-4">
            <ol class="breadcrumb justify-content-center mb-0" style="font-size:0.82rem;">
                <li class="breadcrumb-item">
                    <a href="{{ route('consultacy') }}" style="color:rgba(255,255,255,0.45);text-decoration:none;">Home</a>
                </li>
                <li class="breadcrumb-item active" style="color:var(--gold);">Our Team</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ══ TEAM CARDS ══ -->
<section class="team-section">
    <div class="container">

        <div class="text-center mb-5">
            <div class="k1-section-badge mb-3"><i class="bi bi-star-fill me-2"></i>Leadership</div>
            <h2 class="fw-bold" style="font-family:'EB Garamond',serif;font-size:2rem;color:var(--navy);">Our Leadership Team</h2>
            <p class="text-muted mt-2" style="font-size:0.9rem;max-width:480px;margin:0 auto;">
                Guiding the agency with vision, integrity, and decades of professional experience.
            </p>
        </div>

        <div class="row justify-content-center g-4">

            <!-- 1. Richard Gaspary Anselemi -->
            <div class="col-lg-4 col-md-6">
                <div class="tcard">
                    <div class="tcard-badge">Founder</div>
                    <div class="tcard-bar"></div>
                    <div class="tcard-img-wrap">
                        <img class="tcard-img" src="{{ asset('team/ceo.jpeg') }}" alt="Mr Richard Gaspary Anselemi">
                    </div>
                    <div class="tcard-body">
                        <div class="tcard-name">Mr Richard Gaspary Anselemi</div>
                        <div class="tcard-rule"></div>
                        <div class="tcard-role">Founder &amp; Head of Business,<br>Research and Legal Consultancy</div>
                        <div class="tcard-dept"><i class="bi bi-briefcase-fill"></i> Executive Leadership</div>
                    </div>
                </div>
            </div>

            <!-- 2. Yusra Mussa Hassan -->
            <div class="col-lg-4 col-md-6">
                <div class="tcard">
                    <div class="tcard-badge">Head of Ops</div>
                    <div class="tcard-bar"></div>
                    <div class="tcard-img-wrap">
                        <img class="tcard-img" src="{{ asset('team/Y3.jpg.jpeg') }}" alt="Ms Yusra Mussa Hassan">
                    </div>
                    <div class="tcard-body">
                        <div class="tcard-name">Ms Yusra Mussa Hassan</div>
                        <div class="tcard-rule"></div>
                        <div class="tcard-role">Head of Operations and<br>Itinerary Services</div>
                        <div class="tcard-dept"><i class="bi bi-diagram-3-fill"></i> Operations</div>
                    </div>
                </div>
            </div>

            <!-- 3. Shabani Ibrahim Shabani -->
            <div class="col-lg-4 col-md-6">
                <div class="tcard">
                    <div class="tcard-badge">Manager</div>
                    <div class="tcard-bar"></div>
                    <div class="tcard-img-wrap">
                        <img class="tcard-img" src="{{ asset('team/legal.jpeg') }}" alt="Mr Shabani Ibrahim Shabani">
                    </div>
                    <div class="tcard-body">
                        <div class="tcard-name">Mr Shabani Ibrahim Shabani</div>
                        <div class="tcard-rule"></div>
                        <div class="tcard-role">Manager and Head of<br>Legal Affairs</div>
                        <div class="tcard-dept"><i class="bi bi-journal-richtext"></i> Legal Affairs</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ══ STATS ══ -->
<section class="team-stats">
    <div class="container position-relative" style="z-index:1;">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3 stat-box">
                <span class="stat-num">3+</span>
                <div class="stat-label">Key Leaders</div>
            </div>
            <div class="col-6 col-md-3 stat-box">
                <span class="stat-num">25+</span>
                <div class="stat-label">Years Combined Exp.</div>
            </div>
            <div class="col-6 col-md-3 stat-box">
                <span class="stat-num">5</span>
                <div class="stat-label">Practice Areas</div>
            </div>
            <div class="col-6 col-md-3 stat-box">
                <span class="stat-num">2</span>
                <div class="stat-label">Office Locations</div>
            </div>
        </div>
    </div>
</section>

<!-- ══ VALUES ══ -->
<section class="team-values">
    <div class="container">
        <div class="text-center mb-5">
            <div class="k1-section-badge mb-3"><i class="bi bi-shield-check me-2"></i>What Drives Us</div>
            <h2 class="fw-bold" style="font-family:'EB Garamond',serif;font-size:2rem;color:var(--navy);">Our Core Values</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-shield-fill-check"></i></div>
                    <h6>Integrity</h6>
                    <p>We uphold the highest ethical standards in every matter we handle.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-lightbulb-fill"></i></div>
                    <h6>Excellence</h6>
                    <p>Quality work, thorough research, and precise execution on every case.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-person-heart"></i></div>
                    <h6>Client First</h6>
                    <p>Your goals are our priority — approachable, responsive, and results-driven.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-globe-americas"></i></div>
                    <h6>Community</h6>
                    <p>Empowering Tanzanian businesses, organisations, and individuals to thrive.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══ CTA ══ -->
<section style="padding:80px 0;background:var(--navy);position:relative;overflow:hidden;">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse 50% 80% at 50% 50%,rgba(201,153,58,0.08) 0%,transparent 70%);pointer-events:none;"></div>
    <div class="container text-center position-relative" style="z-index:1;">
        <h2 class="fw-bold text-white mb-3" style="font-family:'EB Garamond',serif;font-size:2rem;">
            Ready to Work With Us?
        </h2>
        <p class="text-white mb-5" style="opacity:0.55;max-width:460px;margin:0 auto 32px;font-size:0.95rem;line-height:1.9;">
            Our team is here to guide you through every step. Get in touch today for a consultation.
        </p>
        <a href="{{ route('consultacy') }}#contact" class="btn rounded-0 px-5 py-3 fw-bold text-dark" style="background:var(--gold);font-size:0.93rem;">
            <i class="bi bi-calendar-check me-2"></i>Book a Consultation
        </a>
    </div>
</section>

@endsection
