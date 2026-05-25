@extends('layouts.admin')

@section('title', 'Newsletter Subscribers | Kasimbagu Admin')

@section('content')
<div class="page-header">
    <h1>Newsletter Subscribers</h1>
    <p>Manage all newsletter subscribers.</p>
</div>

<div class="data-table">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: var(--border-color);">
        <h5 class="mb-0">All Subscribers</h5>
        <div class="d-flex gap-2">
            <input type="text" class="form-control form-control-sm" placeholder="Search subscribers..." style="width: 250px; background: var(--card-bg); border: 1px solid var(--border-color); color: #e2e8f0;">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Status</th>
                    <th>IP Address</th>
                    <th>Subscribed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($newsletters->count() > 0)
                    @foreach($newsletters as $newsletter)
                    <tr>
                        <td>
                            <div class="fw-bold">{{ $newsletter->email }}</div>
                        </td>
                        <td>
                            @if($newsletter->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $newsletter->ip_address ?? 'N/A' }}</td>
                        <td>{{ $newsletter->subscribed_at->format('M d, Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="mailto:{{ $newsletter->email }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-envelope"></i>
                                </a>
                                @if($newsletter->is_active)
                                <form action="{{ route('admin.newsletters.toggle', $newsletter->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm" style="background: rgba(245, 158, 11, 0.2); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.3);" title="Deactivate">
                                        <i class="bi bi-pause"></i>
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('admin.newsletters.toggle', $newsletter->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm" style="background: rgba(16, 185, 129, 0.2); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.3);" title="Activate">
                                        <i class="bi bi-play"></i>
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subscriber?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" style="background: rgba(239, 68, 68, 0.2); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.3);">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">
                            <i class="bi bi-newspaper" style="font-size: 3rem; opacity: 0.5;"></i>
                            <p class="mt-3 mb-0">No subscribers found.</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @if($newsletters->hasPages())
    <div class="p-4 border-top" style="border-color: var(--border-color);">
        {{ $newsletters->links() }}
    </div>
    @endif
</div>
@endsection
