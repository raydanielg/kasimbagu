<div class="data-table">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
            <tr>
                <td>
                    <div class="fw-bold">{{ $blog->title }}</div>
                    <div class="text-secondary small">{{ Str::limit($blog->excerpt, 50) }}</div>
                </td>
                <td>
                    <span class="badge badge-info">{{ $blog->category }}</span>
                </td>
                <td>{{ $blog->author ?? '-' }}</td>
                <td>
                    @if($blog->is_published)
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge badge-warning">Draft</span>
                    @endif
                </td>
                <td>
                    <small class="text-secondary">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : '-' }}</small>
                </td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('admin.blogs.show', $blog->id) }}" class="btn btn-outline-secondary" title="View">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-outline-primary" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button onclick="togglePublish({{ $blog->id }})" class="btn btn-outline-{{ $blog->is_published ? 'warning' : 'success' }}" title="{{ $blog->is_published ? 'Unpublish' : 'Publish' }}">
                            <i class="bi bi-{{ $blog->is_published ? 'eye-slash' : 'check-lg' }}"></i>
                        </button>
                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
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
                <td colspan="6" class="text-center py-5">
                    <div class="text-secondary">
                        <i class="bi bi-journal-x display-4 d-block mb-2"></i>
                        <p>No blog posts found</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($blogs->hasPages())
<div class="data-table-footer">
    {{ $blogs->links('pagination::bootstrap-5') }}
</div>
@endif

<script>
function togglePublish(id) {
    fetch(`{{ route('admin.blogs.toggle', ':id') }}`.replace(':id', id), {
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
