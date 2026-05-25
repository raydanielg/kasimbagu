@extends('layouts.admin')

@section('title', 'Travel Destinations | Kasimbagu Admin')
@section('page_title', 'Travel Destinations')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>Travel Destinations</h1>
        <p>Manage destinations displayed on the travel and inquiry website.</p>
    </div>
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary" style="background: var(--primary); border: none;">
        <i class="bi bi-plus-lg me-2"></i>Add Destination
    </a>
</div>

<div class="data-table">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: var(--border-color);">
        <h5 class="mb-0 fw-bold text-dark">All Destinations</h5>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Destination</th>
                    <th>Region</th>
                    <th>Visa Status</th>
                    <th>Flight Duration</th>
                    <th>Popular</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($destinations->count() > 0)
                    @foreach($destinations as $destination)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if($destination->image_url)
                                    <img src="{{ $destination->image_url }}" alt="{{ $destination->name }}" style="width: 50px; height: 35px; object-fit: cover; border-radius: 6px;">
                                @else
                                    <div style="width: 50px; height: 35px; background: #e2e8f0; border-radius: 6px; display: flex; align-items: center; justify-content: center;"><i class="bi bi-image" style="font-size: 1rem;"></i></div>
                                @endif
                                <div>
                                    <div class="fw-bold text-dark">{{ $destination->name }}</div>
                                    <div class="text-muted small">{{ $destination->country }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge" style="background: #e0f2fe; color: #0369a1;">{{ ucfirst($destination->region) }}</span>
                        </td>
                        <td>
                            @if($destination->visa_required)
                                <span class="badge" style="background: #fef2f2; color: #ef4444; border: 1px solid #fecaca;">{{ $destination->visa_type ?? 'Visa Required' }}</span>
                            @else
                                <span class="badge badge-success">No Visa Required</span>
                            @endif
                        </td>
                        <td class="text-dark font-monospace">{{ $destination->flight_duration ?? 'N/A' }}</td>
                        <td>
                            @if($destination->is_popular)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-warning">No</span>
                            @endif
                        </td>
                        <td>
                            @if($destination->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="btn btn-sm border" style="background: #fef3c7; color: #d97706; border-color: #fde68a !important;">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this destination?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm border" style="background: #fef2f2; color: #ef4444; border-color: #fecaca !important;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center text-muted py-5">
                            <i class="bi bi-pin-map" style="font-size: 3rem; opacity: 0.5;"></i>
                            <p class="mt-3 mb-0">No destinations configured yet.</p>
                            <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary mt-3" style="background: var(--primary); border: none;">Add Your First Destination</a>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @if($destinations->hasPages())
    <div class="p-4 border-top" style="border-color: var(--border-color);">
        {{ $destinations->links() }}
    </div>
    @endif
</div>
@endsection
