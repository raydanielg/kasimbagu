@extends('layouts.admin')

@section('title', 'View Event')

@section('content')
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-1">View Event</h1>
            <p class="text-secondary mb-0">{{ $event->title }}</p>
        </div>
        <div class="btn-group">
            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-outline-primary">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('admin.events') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back
            </a>
        </div>
    </div>
</div>

<div class="dashboard-panel-card">
    <div class="row g-4">
        <div class="col-md-8">
            @if($event->image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid rounded-3" style="max-height: 400px; width: 100%; object-fit: cover;">
            </div>
            @endif
            <h2 class="h4 mb-3">{{ $event->title }}</h2>
            <div class="mb-3">
                @if($event->is_published)
                    <span class="badge badge-success">Published</span>
                @else
                    <span class="badge badge-warning">Draft</span>
                @endif
            </div>
            <div class="mb-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-secondary">Date</small>
                            <div class="fw-bold">{{ $event->event_date ? $event->event_date->format('F d, Y') : '-' }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-secondary">Time</small>
                            <div class="fw-bold">{{ $event->event_time ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="p-3 bg-light rounded-3">
                    <small class="text-secondary">Location</small>
                    <div class="fw-bold">{{ $event->location }}</div>
                    @if($event->google_maps_link)
                    <a href="{{ $event->google_maps_link }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                        <i class="bi bi-map me-1"></i>View on Google Maps
                    </a>
                    @endif
                </div>
            </div>
            <div class="mb-4">
                <h5 class="fw-bold mb-2">Description</h5>
                <div style="line-height: 1.8;">{!! nl2br($event->description) !!}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-stat-card p-4">
                <h5 class="fw-bold mb-3">Event Details</h5>
                <div class="mb-3">
                    <label class="text-secondary small">Slug</label>
                    <div class="fw-medium">{{ $event->slug }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Status</label>
                    <div>
                        @if($event->is_published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Event Date</label>
                    <div class="fw-medium">{{ $event->event_date ? $event->event_date->format('F d, Y H:i') : '-' }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Sort Order</label>
                    <div class="fw-medium">{{ $event->sort_order }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Created</label>
                    <div class="fw-medium">{{ $event->created_at->format('F d, Y H:i') }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">Updated</label>
                    <div class="fw-medium">{{ $event->updated_at->format('F d, Y H:i') }}</div>
                </div>
                <hr>
                <div class="d-flex gap-2">
                    <a href="{{ route('events.show', $event->slug) }}" target="_blank" class="btn btn-outline-primary flex-grow-1">
                        <i class="bi bi-box-arrow-up-right me-2"></i>View Live
                    </a>
                    <button onclick="togglePublish({{ $event->id }})" class="btn btn-outline-{{ $event->is_published ? 'warning' : 'success' }}">
                        <i class="bi bi-{{ $event->is_published ? 'eye-slash' : 'check-lg' }}"></i>
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
    fetch(`{{ route('admin.events.toggle', ':id') }}`.replace(':id', id), {
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
