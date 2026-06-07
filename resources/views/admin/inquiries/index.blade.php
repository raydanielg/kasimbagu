@extends('layouts.admin')

@section('title', 'Inquiries Management | Kasimbagu Admin')
@section('page_title', 'Inquiries')

@section('content')
<div class="page-header">
    <h1>Inquiries</h1>
    <p>Manage all customer inquiries and messages.</p>
</div>

<div class="data-table">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: var(--border-color);">
        <h5 class="mb-0 fw-bold text-dark"><i class="bi bi-envelope-fill me-2 text-primary"></i>All Inquiries</h5>
        <div class="d-flex gap-2">
            <input type="text" id="searchFilter" class="form-control form-control-sm" placeholder="Search inquiries..." style="width: 250px;">
        </div>
    </div>
    
    <div id="inquiriesTableContainer">
        @include('admin.inquiries.partials.table')
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchFilter');
        const container = document.getElementById('inquiriesTableContainer');

        let timeout = null;

        function fetchInquiries(page = 1) {
            container.style.opacity = '0.5';
            
            const params = new URLSearchParams({
                page: page,
                search: searchInput.value
            });

            fetch(`{{ route('admin.inquiries') }}?${params.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => {
                if (!res.ok) throw new Error('Failed to fetch inquiries');
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
                    fetchInquiries(page);
                });
            });
        }

        searchInput.addEventListener('keyup', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                fetchInquiries(1);
            }, 300);
        });

        // Initial bind for page-load pagination links
        bindPagination();
    });
</script>
@endpush
