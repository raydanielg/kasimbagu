@extends('layouts.admin')

@section('title', 'Inquiries Management | Kasimbagu Admin')

@section('content')
<div class="page-header">
    <h1>Inquiries</h1>
    <p>Manage all customer inquiries and messages.</p>
</div>

<div class="data-table">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: var(--border-color);">
        <h5 class="mb-0">All Inquiries</h5>
        <div class="d-flex gap-2">
            <input type="text" class="form-control form-control-sm" placeholder="Search inquiries..." style="width: 250px; background: var(--card-bg); border: 1px solid var(--border-color); color: #e2e8f0;">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($inquiries->count() > 0)
                    @foreach($inquiries as $inquiry)
                    <tr>
                        <td>
                            <div class="fw-bold">{{ $inquiry->name }}</div>
                        </td>
                        <td>{{ $inquiry->email }}</td>
                        <td>{{ $inquiry->phone ?? 'N/A' }}</td>
                        <td>
                            @if($inquiry->service)
                                <span class="badge badge-info">{{ $inquiry->service }}</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $inquiry->subject ?? 'N/A' }}</td>
                        <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
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
                        <td colspan="7" class="text-center text-muted py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; opacity: 0.5;"></i>
                            <p class="mt-3 mb-0">No inquiries found.</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @if($inquiries->hasPages())
    <div class="p-4 border-top" style="border-color: var(--border-color);">
        {{ $inquiries->links() }}
    </div>
    @endif
</div>
@endsection
