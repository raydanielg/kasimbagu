@extends('layouts.admin')

@section('title', 'Create Blog Post')

@section('content')
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-1">Create Blog Post</h1>
            <p class="text-secondary mb-0">Add a new blog post</p>
        </div>
        <a href="{{ route('admin.blogs') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to Blogs
        </a>
    </div>
</div>

<div class="dashboard-panel-card">
    <form action="{{ route('admin.blogs.store') }}" method="POST">
        @csrf
        <div class="row g-4">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Title *</label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Category *</label>
                    <select name="category" class="form-select" required>
                        <option value="">Select category...</option>
                        <option value="Legal" {{ old('category') === 'Legal' ? 'selected' : '' }}>Legal</option>
                        <option value="Research" {{ old('category') === 'Research' ? 'selected' : '' }}>Research</option>
                        <option value="Compliance" {{ old('category') === 'Compliance' ? 'selected' : '' }}>Compliance</option>
                        <option value="Business" {{ old('category') === 'Business' ? 'selected' : '' }}>Business</option>
                        <option value="Travel" {{ old('category') === 'Travel' ? 'selected' : '' }}>Travel</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Excerpt *</label>
                    <textarea name="excerpt" class="form-control" rows="3" required>{{ old('excerpt') }}</textarea>
                    <small class="text-secondary">Brief summary (max 500 characters)</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Content *</label>
                    <textarea name="content" class="form-control" rows="15" required>{{ old('content') }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Image URL</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image') }}">
                    <small class="text-secondary">Optional: Featured image URL</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Author</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    <small class="text-secondary">Lower numbers appear first</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Publish Date</label>
                    <input type="date" name="published_at" class="form-control" value="{{ old('published_at') }}">
                    <small class="text-secondary">Leave empty for current date</small>
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" {{ old('is_published') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Publish immediately</label>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1">
                        <i class="bi bi-check-lg me-2"></i>Create Blog
                    </button>
                    <a href="{{ route('admin.blogs') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
