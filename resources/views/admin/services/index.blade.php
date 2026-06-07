@extends('layouts.admin')

@section('title', 'Services Management | Kasimbagu Admin')
@section('page_title', 'Services')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>Services</h1>
        <p>Manage all services offered by Kasimbagu.</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary" style="background: var(--primary); border: none;">
        <i class="bi bi-plus-lg me-2"></i>Add New Service
    </a>
</div>

<div class="data-table">
    <div class="p-4 border-bottom d-flex flex-wrap gap-3 justify-content-between align-items-center" style="border-color: var(--border-color);">
        <h5 class="mb-0 fw-bold text-dark"><i class="bi bi-gear-fill me-2 text-primary"></i>All Services</h5>
        <div class="d-flex flex-wrap gap-2 align-items-center">
            <input type="text" id="searchFilter" class="form-control form-control-sm" placeholder="Search services..." style="width: 200px;">
            <select id="categoryFilter" class="form-select form-select-sm" style="width: 160px;">
                <option value="">All Categories</option>
                <option value="legal">Legal</option>
                <option value="research">Research</option>
                <option value="company management">Company Management</option>
            </select>
            <select id="featuredFilter" class="form-select form-select-sm" style="width: 140px;">
                <option value="">All Featured</option>
                <option value="yes">Featured</option>
                <option value="no">Not Featured</option>
            </select>
            <button id="resetFilters" class="btn btn-sm btn-light border py-2 px-3" title="Reset Filters">
                <i class="bi bi-arrow-counterclockwise"></i>
            </button>
        </div>
    </div>
    
    <div id="servicesTableContainer">
        @include('admin.services.partials.table')
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchFilter');
        const categorySelect = document.getElementById('categoryFilter');
        const featuredSelect = document.getElementById('featuredFilter');
        const resetButton = document.getElementById('resetFilters');
        const container = document.getElementById('servicesTableContainer');

        let timeout = null;

        function fetchServices(page = 1) {
            container.style.opacity = '0.5';
            
            const params = new URLSearchParams({
                page: page,
                search: searchInput.value,
                category: categorySelect.value,
                is_featured: featuredSelect.value
            });

            fetch(`{{ route('admin.services') }}?${params.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => {
                if (!res.ok) throw new Error('Failed to fetch services');
                return res.text();
            })
            .then(html => {
                container.innerHTML = html;
                container.style.opacity = '1';
                bindPagination();
            })
            .catch(err => {
                console.error(err);
                container.style.opacity = '1';
            });
        }

        function bindPagination() {
            container.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = new URL(this.href);
                    const page = url.searchParams.get('page') || 1;
                    fetchServices(page);
                });
            });
        }

        searchInput.addEventListener('keyup', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                fetchServices(1);
            }, 300);
        });

        categorySelect.addEventListener('change', () => fetchServices(1));
        featuredSelect.addEventListener('change', () => fetchServices(1));

        resetButton.addEventListener('click', function() {
            searchInput.value = '';
            categorySelect.value = '';
            featuredSelect.value = '';
            fetchServices(1);
        });

        // Initial bind for page-load pagination links
        bindPagination();
    });
</script>
@endpush
