@extends('layouts.admin')

@section('title', 'Create Event')

@section('content')
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-1">Create Event</h1>
            <p class="text-secondary mb-0">Add a new event</p>
        </div>
        <a href="{{ route('admin.events') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Back to Events
        </a>
    </div>
</div>

<div class="dashboard-panel-card">
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Title *</label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description *</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Location *</label>
                    <input type="text" name="location" class="form-control" required value="{{ old('location') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Google Maps Link</label>
                    <input type="url" name="google_maps_link" class="form-control" value="{{ old('google_maps_link') }}">
                    <small class="text-secondary">Optional: Google Maps URL for the location</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Event Date *</label>
                    <input type="date" name="event_date" class="form-control" required value="{{ old('event_date') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Event Time</label>
                    <input type="text" name="event_time" class="form-control" value="{{ old('event_time') }}" placeholder="e.g., 2:00 PM">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Event Image</label>
                    <input type="file" name="image" id="eventImage" class="form-control" accept="image/*">
                    <small class="text-secondary">Optional: Upload an event image (JPG, PNG, GIF, WebP max 2MB)</small>
                    <div id="imagePreview" class="mt-3 d-none">
                        <img src="" alt="Preview" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    <small class="text-secondary">Lower numbers appear first</small>
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" {{ old('is_published') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Publish immediately</label>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1">
                        <i class="bi bi-check-lg me-2"></i>Create Event
                    </button>
                    <a href="{{ route('admin.events') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('eventImage')?.addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    const img = preview?.querySelector('img');
    if (e.target.files && e.target.files[0] && img) {
        img.src = URL.createObjectURL(e.target.files[0]);
        preview.classList.remove('d-none');
    }
});
</script>
@endpush
