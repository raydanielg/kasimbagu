<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Kasimbagu Consultancy</title>
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
        .blog-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e8d9b8;
        }
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .blog-card img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .category-badge {
            background: rgba(201,153,58,0.1);
            color: var(--gold);
            border: 1px solid rgba(201,153,58,0.3);
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
                    <li class="nav-item"><a class="nav-link active" href="/blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold" style="color: var(--dark);">Blog & Insights</h1>
                <p class="text-secondary">Latest news, updates, and insights from Kasimbagu</p>
            </div>

            <div class="row g-4">
                @forelse($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card h-100">
                        @if($blog->image)
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                        @else
                        <div style="height: 200px; background: linear-gradient(135deg, #0a1c38, #162c56); display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-journal-text text-white" style="font-size: 3rem; opacity: 0.5;"></i>
                        </div>
                        @endif
                        <div class="p-4">
                            <div class="mb-3">
                                <span class="badge category-badge">{{ $blog->category }}</span>
                                <small class="text-secondary ms-2">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : '' }}</small>
                            </div>
                            <h5 class="fw-bold mb-2">{{ $blog->title }}</h5>
                            <p class="text-secondary mb-3" style="font-size: 0.9rem;">{{ Str::limit($blog->excerpt, 100) }}</p>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none fw-bold" style="color: var(--gold);">
                                Read More <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-journal-x display-1 text-secondary"></i>
                    <p class="text-secondary mt-3">No blog posts available yet.</p>
                </div>
                @endforelse
            </div>

            @if($blogs->hasPages())
            <div class="mt-5">
                {{ $blogs->links('pagination::bootstrap-5') }}
            </div>
            @endif
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
