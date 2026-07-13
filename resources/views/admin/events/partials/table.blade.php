<div class="data-table">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Location</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr>
                <td>
                    <div class="fw-bold">{{ $event->title }}</div>
                    <div class="text-secondary small">{{ Str::limit($event->description, 50) }}</div>
                </td>
                <td>
                    <div>{{ $event->event_date ? $event->event_date->format('M d, Y') : '-' }}</div>
                    <small class="text-secondary">{{ $event->event_time ?? '' }}</small>
                </td>
                <td>{{ $event->location }}</td>
                <td>
                    @if($event->is_published)
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge badge-warning">Draft</span>
                    @endif
                </td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-outline-secondary" title="View">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-outline-primary" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button onclick="togglePublish({{ $event->id }})" class="btn btn-outline-{{ $event->is_published ? 'warning' : 'success' }}" title="{{ $event->is_published ? 'Unpublish' : 'Publish' }}">
                            <i class="bi bi-{{ $event->is_published ? 'eye-slash' : 'check-lg' }}"></i>
                        </button>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-5">
                    <div class="text-secondary">
                        <i class="bi bi-calendar-x display-4 d-block mb-2"></i>
                        <p>No events found</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($events->hasPages())
<div class="data-table-footer">
    {{ $events->links('pagination::bootstrap-4') }}
</div>
@endif

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
