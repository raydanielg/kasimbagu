<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ═══════════════════════════════════════════════
         PRIMARY SEO
    ═══════════════════════════════════════════════ --}}
    <title>@yield('title', 'Kasimbagu Consultancy Agency | Legal, Research & Travel Services — Tanzania')</title>
    <meta name="description" content="@yield('description', 'Kasimbagu Consultancy Agency — Expert legal services, research & consultancy, company registration (BRELA, NGO/CSO, CRB), and travel & visa assistance in Tanzania. Offices in Dar es Salaam and Moshi, Kilimanjaro.')">
    <meta name="keywords" content="@yield('keywords', 'kasimbagu consultancy, legal services Tanzania, company registration Tanzania, BRELA registration, NGO registration Tanzania, research consultancy, travel agency Tanzania, visa assistance Tanzania, Dar es Salaam lawyer, Moshi consultancy, business registration East Africa')">
    <meta name="author" content="Kasimbagu Consultancy Agency">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- ═══════════════════════════════════════════════
         GEO & LANGUAGE
    ═══════════════════════════════════════════════ --}}
    <meta name="language" content="English">
    <meta name="geo.region" content="TZ">
    <meta name="geo.placename" content="Dar es Salaam, Tanzania">
    <meta name="geo.position" content="-6.7924;39.2083">
    <meta name="ICBM" content="-6.7924, 39.2083">

    {{-- ═══════════════════════════════════════════════
         OPEN GRAPH — WhatsApp, Facebook, LinkedIn
    ═══════════════════════════════════════════════ --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Kasimbagu Consultancy Agency">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', 'Kasimbagu Consultancy Agency | Legal, Research & Travel — Tanzania')">
    <meta property="og:description" content="@yield('og_description', 'Expert legal activities, research, company registration and travel & visa services in Tanzania. Client-centred, results-driven. Ora et Labora.')">
    <meta property="og:image" content="@yield('og_image', asset('og-cover.jpg'))">
    <meta property="og:image:secure_url" content="@yield('og_image', asset('og-cover.jpg'))">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Kasimbagu Consultancy Agency — Tanzania">
    <meta property="og:locale" content="en_TZ">

    {{-- ═══════════════════════════════════════════════
         TWITTER / X CARD
    ═══════════════════════════════════════════════ --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@kasimbagu">
    <meta name="twitter:creator" content="@kasimbagu">
    <meta name="twitter:title" content="@yield('og_title', 'Kasimbagu Consultancy Agency | Tanzania')">
    <meta name="twitter:description" content="@yield('og_description', 'Expert legal, research, company registration and travel & visa services in Tanzania. Dar es Salaam & Moshi offices.')">
    <meta name="twitter:image" content="@yield('og_image', asset('og-cover.jpg'))">
    <meta name="twitter:image:alt" content="Kasimbagu Consultancy Agency">

    {{-- ═══════════════════════════════════════════════
         FAVICON & TOUCH ICONS
    ═══════════════════════════════════════════════ --}}
    <link rel="icon" type="image/png" href="{{ asset('logo_kasimbagu_agency-removebg-preview.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo_kasimbagu_agency-removebg-preview.png') }}">
    <meta name="theme-color" content="#004a99">
    <meta name="msapplication-TileColor" content="#004a99">

    {{-- ═══════════════════════════════════════════════
         STRUCTURED DATA — JSON-LD Schema.org
    ═══════════════════════════════════════════════ --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "@id": "{{ url('/') }}#organization",
                "name": "Kasimbagu Consultancy Agency",
                "alternateName": "Kasimbagu",
                "url": "{{ url('/') }}",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('logo_kasimbagu_agency-removebg-preview.png') }}",
                    "width": 300,
                    "height": 100
                },
                "image": "{{ asset('og-cover.jpg') }}",
                "description": "Kasimbagu Consultancy Agency provides expert legal activities, research & consultancy, company registration, and travel & visa services across Tanzania.",
                "slogan": "Ora et Labora",
                "email": "info@kasimbagu.com",
                "telephone": "+255700000000",
                "priceRange": "$$",
                "currenciesAccepted": "TZS, USD",
                "paymentAccepted": "Cash, Bank Transfer, M-Pesa",
                "areaServed": {
                    "@type": "Country",
                    "name": "Tanzania"
                },
                "address": [
                    {
                        "@type": "PostalAddress",
                        "addressLocality": "Dar es Salaam",
                        "addressCountry": "TZ",
                        "description": "Head Office"
                    },
                    {
                        "@type": "PostalAddress",
                        "addressLocality": "Moshi",
                        "addressRegion": "Kilimanjaro",
                        "addressCountry": "TZ",
                        "description": "Branch Office"
                    }
                ],
                "geo": {
                    "@type": "GeoCoordinates",
                    "latitude": "-6.7924",
                    "longitude": "39.2083"
                },
                "openingHoursSpecification": [
                    {
                        "@type": "OpeningHoursSpecification",
                        "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
                        "opens": "08:00",
                        "closes": "17:00"
                    },
                    {
                        "@type": "OpeningHoursSpecification",
                        "dayOfWeek": "Saturday",
                        "opens": "09:00",
                        "closes": "13:00"
                    }
                ],
                "contactPoint": [
                    {
                        "@type": "ContactPoint",
                        "telephone": "+255700000000",
                        "contactType": "customer service",
                        "availableLanguage": ["English","Swahili"],
                        "areaServed": "TZ"
                    }
                ],
                "hasOfferCatalog": {
                    "@type": "OfferCatalog",
                    "name": "Our Services",
                    "itemListElement": [
                        {"@type":"Offer","itemOffered":{"@type":"Service","name":"Legal Activities","description":"Litigation, arbitration, contract review, immigration law, family law, criminal defence"}},
                        {"@type":"Offer","itemOffered":{"@type":"Service","name":"Research & Consultancy","description":"Research writing, proposal development, business plans, concept notes"}},
                        {"@type":"Offer","itemOffered":{"@type":"Service","name":"Company Registration","description":"BRELA, TIN, NGO/CSO, CRB, microfinance registration"}},
                        {"@type":"Offer","itemOffered":{"@type":"Service","name":"Travel & Visa Assistance","description":"Flight booking, visa applications, hotel booking, airport transfers"}},
                        {"@type":"Offer","itemOffered":{"@type":"Service","name":"Business Consultancy","description":"Business strategy, operations advisory, ICT solutions, capacity training"}}
                    ]
                },
                "sameAs": [
                    "https://www.facebook.com/kasimbagu",
                    "https://www.linkedin.com/company/kasimbagu",
                    "https://twitter.com/kasimbagu",
                    "https://wa.me/255653291058"
                ]
            },
            {
                "@type": "WebSite",
                "@id": "{{ url('/') }}#website",
                "url": "{{ url('/') }}",
                "name": "Kasimbagu Consultancy Agency",
                "publisher": {"@id": "{{ url('/') }}#organization"},
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "{{ url('/') }}?q={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            },
            {
                "@type": "WebPage",
                "@id": "{{ url()->current() }}#webpage",
                "url": "{{ url()->current() }}",
                "name": "@yield('title', 'Kasimbagu Consultancy Agency | Legal, Research & Travel Services')",
                "description": "@yield('description', 'Expert legal services, research & consultancy, company registration and travel services in Tanzania.')",
                "isPartOf": {"@id": "{{ url('/') }}#website"},
                "publisher": {"@id": "{{ url('/') }}#organization"},
                "inLanguage": "en-TZ"
            }
        ]
    }
    </script>

    {{-- Custom head slot for child views --}}
    @yield('seo_head')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; }
        .letter-spacing-1 { letter-spacing: 1px; }
        .hover-lift { transition: transform 0.3s ease; }
        .hover-lift:hover { transform: translateY(-8px); }
        .btn-kasb-custom {
            background-color: #e2e8f0; color: #004a99; border: none;
            padding: 12px 25px; border-radius: 50px; font-weight: 600;
            display: inline-flex; align-items: center; gap: 15px;
            transition: all 0.3s ease; text-decoration: none;
        }
        .btn-kasb-custom:hover { background-color: #cbd5e1; transform: scale(1.05); color: #004a99; }
        .icon-circle-kasb {
            background-color: rgba(0,0,0,0.08); width: 32px; height: 32px;
            border-radius: 50%; display: flex; align-items: center;
            justify-content: center; font-size: 14px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app" class="d-flex flex-column min-vh-100">
        @include('partials.header')

        <main class="flex-grow-1">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    @if(session('success'))
    <script>
        Swal.fire({ icon: 'success', title: 'Success!', text: "{{ session('success') }}", confirmButtonColor: '#004a99', timer: 3000 });
    </script>
    @endif
    @if($errors->any())
    <script>
        Swal.fire({ icon: 'error', title: 'Oops...', text: "{{ $errors->first() }}", confirmButtonColor: '#004a99' });
    </script>
    @endif
</body>
</html>
