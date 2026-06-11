<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} - Kasimbagu Consultancy</title>
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
        .blog-content {
            line-height: 1.8;
            font-size: 1.1rem;
        }
        .blog-content p {
            margin-bottom: 1.5rem;
        }
        .category-badge {
            background: rgba(201,153,58,0.1);
            color: var(--gold);
            border: 1px solid rgba(201,153,58,0.3);
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
                    @if($blog->image)
                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="img-fluid rounded-4 mb-4" style="width: 100%; max-height: 500px; object-fit: cover;">
                    @endif
                    
                    <div class="mb-4">
                        <span class="badge category-badge">{{ $blog->category }}</span>
                        <small class="text-secondary ms-3">
                            <i class="bi bi-calendar me-1"></i> {{ $blog->published_at ? $blog->published_at->format('F d, Y') : '' }}
                        </small>
                        @if($blog->author)
                        <small class="text-secondary ms-3">
                            <i class="bi bi-person me-1"></i> {{ $blog->author }}
                        </small>
                        @endif
                    </div>

                    <h1 class="display-4 fw-bold mb-4" style="color: var(--dark);">{{ $blog->title }}</h1>

                    <div class="p-4 bg-light rounded-4 mb-4">
                        <p class="mb-0 text-secondary fst-italic">{{ $blog->excerpt }}</p>
                    </div>

                    <div class="blog-content">
                        {!! nl2br($blog->content) !!}
                    </div>

                    <div class="mt-5 pt-4 border-top">
                        <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Back to Blog
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Newsletter</h5>
                        <div class="p-4 bg-white rounded-4" style="border: 1px solid #e8d9b8;">
                            <p class="text-secondary small mb-3">Subscribe to get the latest insights and updates.</p>
                            <form id="newsletterForm" class="d-flex gap-2">
                                <input type="email" id="newsletterEmail" class="form-control" placeholder="Your email" required>
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </form>
                            <div id="newsletterMessage" class="mt-2 small"></div>
                        </div>
                    </div>

                    @if($relatedBlogs->count() > 0)
                    <div>
                        <h5 class="fw-bold mb-3">Related Posts</h5>
                        <div class="d-flex flex-column gap-3">
                            @foreach($relatedBlogs as $related)
                            <a href="{{ route('blog.show', $related->slug) }}" class="text-decoration-none related-card">
                                @if($related->image)
                                <img src="{{ $related->image }}" alt="{{ $related->title }}" style="height: 120px; width: 100%; object-fit: cover;">
                                @else
                                <div style="height: 120px; background: linear-gradient(135deg, #0a1c38, #162c56); display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-journal-text text-white" style="font-size: 2rem; opacity: 0.5;"></i>
                                </div>
                                @endif
                                <div class="p-3">
                                    <span class="badge category-badge small">{{ $related->category }}</span>
                                    <h6 class="fw-bold mt-2 mb-1" style="color: var(--dark);">{{ $related->title }}</h6>
                                    <small class="text-secondary">{{ $related->published_at ? $related->published_at->format('M d, Y') : '' }}</small>
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
    <script>
    document.getElementById('newsletterForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('newsletterEmail').value;
        const messageDiv = document.getElementById('newsletterMessage');
        
        fetch('/newsletter/subscribe', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageDiv.innerHTML = '<span class="text-success"><i class="bi bi-check-circle me-1"></i>Subscribed successfully!</span>';
                document.getElementById('newsletterEmail').value = '';
            } else {
                messageDiv.innerHTML = '<span class="text-danger"><i class="bi bi-exclamation-circle me-1"></i>' + (data.message || 'Error subscribing') + '</span>';
            }
        })
        .catch(error => {
            messageDiv.innerHTML = '<span class="text-danger"><i class="bi bi-exclamation-circle me-1"></i>Error subscribing</span>';
        });
    });
    </script>
</body>
</html>
