@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-1">Edit Event</h1>
            <p class="text-secondary mb-0">Edit: {{ $event->title }}</p>
        </div>
        <a href="{{ route('admin.events') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to Events
        </a>
    </div>
</div>

<div class="dashboard-panel-card">
    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-4">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Title *</label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title', $event->title) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description *</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ old('description', $event->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Location *</label>
                    <input type="text" name="location" class="form-control" required value="{{ old('location', $event->location) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Google Maps Link</label>
                    <input type="url" name="google_maps_link" class="form-control" value="{{ old('google_maps_link', $event->google_maps_link) }}">
                    <small class="text-secondary">Optional: Google Maps URL for the location</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Event Date *</label>
                    <input type="date" name="event_date" class="form-control" required value="{{ old('event_date', $event->event_date ? $event->event_date->format('Y-m-d') : '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Event Time</label>
                    <input type="text" name="event_time" class="form-control" value="{{ old('event_time', $event->event_time) }}" placeholder="e.g., 2:00 PM">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Event Image</label>
                    <input type="file" name="image" id="eventImage" class="form-control" accept="image/*">
                    <small class="text-secondary">Optional: Upload new image to replace current (JPG, PNG, GIF, WebP max 2MB)</small>
                    <div id="imagePreview" class="mt-3 {{ $event->image ? '' : 'd-none' }}">
                        <img src="{{ $event->image ? asset('storage/' . $event->image) : '' }}" alt="Event image" class="img-fluid rounded border" style="max-height: 200px; object-fit: cover;">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $event->sort_order) }}">
                    <small class="text-secondary">Lower numbers appear first</small>
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" {{ old('is_published', $event->is_published) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1">
                        <i class="bi bi-check-lg me-2"></i>Update Event
                    </button>
                    <a href="{{ route('admin.events') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
