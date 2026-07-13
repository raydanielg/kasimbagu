<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Category</th>
                <th>Icon</th>
                <th>Featured</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($services->count() > 0)
                @foreach($services as $service)
                <tr>
                    <td>
                        <div class="fw-bold text-dark">{{ $service->name }}</div>
                        <div class="text-muted small">{{ Str::limit($service->short_description, 50) }}</div>
                    </td>
                    <td>
                        <span class="badge" style="background: #e0f2fe; color: #0369a1;">{{ ucfirst($service->category) }}</span>
                    </td>
                    <td>
                        <i class="bi {{ $service->icon }} text-primary" style="color: {{ $service->icon_color }} !important; font-size: 1.2rem;"></i>
                    </td>
                    <td>
                        @if($service->is_featured)
                            <span class="badge badge-success">Yes</span>
                        @else
                            <span class="badge badge-warning">No</span>
                        @endif
                    </td>
                    <td>{{ $service->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-sm btn-light border" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm border" style="background: #fef3c7; color: #d97706; border-color: #fde68a !important;" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm border" style="background: #fef2f2; color: #ef4444; border-color: #fecaca !important;" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-muted py-5">
                        <i class="bi bi-inbox" style="font-size: 3rem; opacity: 0.5;"></i>
                        <p class="mt-3 mb-0">No services found matching filters.</p>
                        <a href="{{ route('admin.services.create') }}" class="btn btn-primary mt-3" style="background: var(--primary); border: none;">Add Your First Service</a>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@if($services->hasPages())
<div class="p-4 border-top" style="border-color: var(--border-color);">
    {{ $services->links('pagination::bootstrap-4') }}
</div>
@endif
