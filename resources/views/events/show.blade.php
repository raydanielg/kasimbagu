<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }} - Kasimbagu Consultancy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold: #c9993a;
            --dark: #0a1c38;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: #f8f5ef;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'EB Garamond', serif;
        }
        .navbar {
            background: linear-gradient(135deg, #0a1c38 0%, #162c56 100%);
        }
        .event-date-large {
            background: var(--gold);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            min-width: 100px;
        }
        .event-date-large .day {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
        }
        .event-date-large .month {
            font-size: 1rem;
            text-transform: uppercase;
        }
        .related-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e8d9b8;
        }
        .related-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/" style="font-family: 'EB Garamond', serif;">Kasimbagu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/consultacy">Consultancy</a></li>
                    <li class="nav-item"><a class="nav-link" href="/travel">Travel</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/events">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid rounded-4 mb-4" style="width: 100%; max-height: 500px; object-fit: cover;">
                    @endif
                    
                    <div class="d-flex gap-4 mb-4">
                        <div class="event-date-large">
                            <div class="day">{{ $event->event_date ? $event->event_date->format('d') : '-' }}</div>
                            <div class="month">{{ $event->event_date ? $event->event_date->format('M') : '-' }}</div>
                        </div>
                        <div>
                            <h1 class="display-4 fw-bold mb-2" style="color: var(--dark);">{{ $event->title }}</h1>
                            <p class="text-secondary mb-2">
                                <i class="bi bi-geo-alt me-2"></i>{{ $event->location }}
                            </p>
                            @if($event->event_time)
                            <p class="text-secondary mb-0">
                                <i class="bi bi-clock me-2"></i>{{ $event->event_time }}
                            </p>
                            @endif
                        </div>
                    </div>

                    @if($event->google_maps_link)
                    <div class="mb-4">
                        <a href="{{ $event->google_maps_link }}" target="_blank" class="btn btn-outline-primary">
                            <i class="bi bi-map me-2"></i>View on Google Maps
                        </a>
                    </div>
                    @endif

                    <div class="p-4 bg-white rounded-4 mb-4" style="border: 1px solid #e8d9b8;">
                        <h5 class="fw-bold mb-3">About This Event</h5>
                        <div style="line-height: 1.8;">{!! nl2br($event->description) !!}</div>
                    </div>

                    <div class="mt-5 pt-4 border-top">
                        <a href="{{ route('events.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Back to Events
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-4">
                        <div class="p-4 bg-white rounded-4" style="border: 1px solid #e8d9b8;">
                            <h5 class="fw-bold mb-3">Event Details</h5>
                            <div class="mb-3">
                                <small class="text-secondary">Date</small>
                                <div class="fw-bold">{{ $event->event_date ? $event->event_date->format('F d, Y') : '-' }}</div>
                            </div>
                            <div class="mb-3">
                                <small class="text-secondary">Time</small>
                                <div class="fw-bold">{{ $event->event_time ?? '-' }}</div>
                            </div>
                            <div class="mb-3">
                                <small class="text-secondary">Location</small>
                                <div class="fw-bold">{{ $event->location }}</div>
                            </div>
                        </div>
                    </div>

                    @if($upcomingEvents->count() > 0)
                    <div>
                        <h5 class="fw-bold mb-3">Upcoming Events</h5>
                        <div class="d-flex flex-column gap-3">
                            @foreach($upcomingEvents as $upcoming)
                            <a href="{{ route('events.show', $upcoming->slug) }}" class="text-decoration-none related-card">
                                @if($upcoming->image)
                                <img src="{{ $upcoming->image }}" alt="{{ $upcoming->title }}" style="height: 120px; width: 100%; object-fit: cover;">
                                @else
                                <div style="height: 120px; background: linear-gradient(135deg, #0a1c38, #162c56); display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-calendar-event text-white" style="font-size: 2rem; opacity: 0.5;"></i>
                                </div>
                                @endif
                                <div class="p-3">
                                    <small class="text-secondary">{{ $upcoming->event_date ? $upcoming->event_date->format('M d, Y') : '' }}</small>
                                    <h6 class="fw-bold mt-1 mb-0" style="color: var(--dark);">{{ $upcoming->title }}</h6>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 text-center" style="background: var(--dark); color: white;">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Kasimbagu Consultancy. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
