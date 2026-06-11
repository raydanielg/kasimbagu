@extends('layouts.admin')

@section('title', 'View Blog Post')

@section('content')
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-1">View Blog Post</h1>
            <p class="text-secondary mb-0">{{ $blog->title }}</p>
        </div>
        <div class="btn-group">
            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-outline-primary">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('admin.blogs') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back
            </a>
        </div>
    </div>
</div>

<div class="dashboard-panel-card">
    <div class="row g-4">
        <div class="col-md-8">
            @if($blog->image)
            <div class="mb-4">
                <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="img-fluid rounded-3" style="max-height: 400px; width: 100%; object-fit: cover;">
            </div>
            @endif
            <h2 class="h4 mb-3">{{ $blog->title }}</h2>
            <div class="mb-3">
                <span class="badge badge-info">{{ $blog->category }}</span>
                @if($blog->is_published)
                    <span class="badge badge-success ms-2">Published</span>
                @else
                    <span class="badge badge-warning ms-2">Draft</span>
                @endif
            </div>
            <div class="mb-4">
                <p class="text-secondary small">
                    <i class="bi bi-person me-1"></i> {{ $blog->author ?? 'Unknown' }}
                    @if($blog->published_at)
                        <span class="ms-3"><i class="bi bi-calendar me-1"></i> {{ $blog->published_at->format('F d, Y') }}</span>
                    @endif
                </p>
            </div>
            <div class="mb-4 p-3 bg-light rounded-3">
                <strong class="text-secondary">Excerpt:</strong>
                <p class="mb-0">{{ $blog->excerpt }}</p>
            </div>
            <div class="blog-content" style="line-height: 1.8;">
                {!! nl2br($blog->content) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-stat-card p-4">
                <h5 class="fw-bold mb-3">Blog Details</h5>
                <div class="mb-3">
                    <label class="text-secondary small">Slug</label>
                    <div class="fw-medium">{{ $blog->slug }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Category</label>
                    <div class="fw-medium">{{ $blog->category }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Author</label>
                    <div class="fw-medium">{{ $blog->author ?? '-' }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Status</label>
                    <div>
                        @if($blog->is_published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Published Date</label>
                    <div class="fw-medium">{{ $blog->published_at ? $blog->published_at->format('F d, Y H:i') : '-' }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Sort Order</label>
                    <div class="fw-medium">{{ $blog->sort_order }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Created</label>
                    <div class="fw-medium">{{ $blog->created_at->format('F d, Y H:i') }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Updated</label>
                    <div class="fw-medium">{{ $blog->updated_at->format('F d, Y H:i') }}</div>
                </div>
                <hr>
                <div class="d-flex gap-2">
                    <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-outline-primary flex-grow-1">
                        <i class="bi bi-box-arrow-up-right me-2"></i>View Live
                    </a>
                    <button onclick="togglePublish({{ $blog->id }})" class="btn btn-outline-{{ $blog->is_published ? 'warning' : 'success' }}">
                        <i class="bi bi-{{ $blog->is_published ? 'eye-slash' : 'check-lg' }}"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePublish(id) {
    fetch(`{{ route('admin.blogs.toggle', ':id') }}`.replace(':id', id), {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}
</script>
@endpush
