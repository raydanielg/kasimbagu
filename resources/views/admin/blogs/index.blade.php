@extends('layouts.admin')

@section('title', 'Blogs Management')

@section('content')
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-1">Blogs Management</h1>
            <p class="text-secondary mb-0">Manage blog posts and articles</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>Add New Blog
        </a>
    </div>
</div>

<div class="data-table-container">
    <div class="data-table-header">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <input type="text" id="blogSearch" class="form-control" placeholder="Search blogs..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select id="blogCategory" class="form-select">
                    <option value="">All Categories</option>
                    <option value="Legal" {{ request('category') === 'Legal' ? 'selected' : '' }}>Legal</option>
                    <option value="Research" {{ request('category') === 'Research' ? 'selected' : '' }}>Research</option>
                    <option value="Compliance" {{ request('category') === 'Compliance' ? 'selected' : '' }}>Compliance</option>
                    <option value="Business" {{ request('category') === 'Business' ? 'selected' : '' }}>Business</option>
                    <option value="Travel" {{ request('category') === 'Travel' ? 'selected' : '' }}>Travel</option>
                </select>
            </div>
            <div class="col-md-3">
                <select id="blogStatus" class="form-select">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="col-md-2">
                <button id="resetFilters" class="btn btn-outline-secondary w-100">Reset</button>
            </div>
        </div>
    </div>

    <div id="blogsTableContainer">
        @include('admin.blogs.partials.table')
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('blogSearch');
    const categorySelect = document.getElementById('blogCategory');
    const statusSelect = document.getElementById('blogStatus');
    const resetButton = document.getElementById('resetFilters');

    function loadBlogs() {
        const search = searchInput.value;
        const category = categorySelect.value;
        const status = statusSelect.value;

        const url = new URL(window.location.href);
        url.searchParams.set('search', search);
        url.searchParams.set('category', category);
        url.searchParams.set('status', status);

        fetch(url.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('blogsTableContainer').innerHTML = html;
        });
    }

    let debounceTimer;
    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(loadBlogs, 500);
    });

    categorySelect.addEventListener('change', loadBlogs);
    statusSelect.addEventListener('change', loadBlogs);

    resetButton.addEventListener('click', function() {
        searchInput.value = '';
        categorySelect.value = '';
        statusSelect.value = '';
        loadBlogs();
    });
});
</script>
@endpush
