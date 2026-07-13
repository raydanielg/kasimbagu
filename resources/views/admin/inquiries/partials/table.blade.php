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
                        <div class="fw-bold text-dark">{{ $inquiry->name }}</div>
                    </td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->phone ?? 'N/A' }}</td>
                    <td>
                        @if($inquiry->service)
                            <span class="badge bg-light text-dark" style="background: #e0f2fe !important; color: #0369a1 !important; border: 1px solid #bae6fd !important;">{{ $inquiry->service }}</span>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>{{ $inquiry->subject ?? 'N/A' }}</td>
                    <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="btn btn-sm btn-light border" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
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
                    <td colspan="7" class="text-center text-muted py-5">
                        <i class="bi bi-inbox" style="font-size: 3rem; opacity: 0.5;"></i>
                        <p class="mt-3 mb-0">No inquiries found matching search criteria.</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@if($inquiries->hasPages())
<div class="p-4 border-top" style="border-color: var(--border-color);">
    {{ $inquiries->links('pagination::bootstrap-4') }}
</div>
@endif
