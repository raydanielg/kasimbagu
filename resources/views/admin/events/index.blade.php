@extends('layouts.admin')

@section('title', 'Events Management')

@section('content')
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-1">Events Management</h1>
            <p class="text-secondary mb-0">Manage events and activities</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>Add New Event
        </a>
    </div>
</div>

<div class="data-table-container">
    <div class="data-table-header">
        <div class="row g-3 align-items-center">
            <div class="col-md-6">
                <input type="text" id="eventSearch" class="form-control" placeholder="Search events..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select id="eventStatus" class="form-select">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="col-md-3">
                <button id="resetFilters" class="btn btn-outline-secondary w-100">Reset</button>
            </div>
        </div>
    </div>

    <div id="eventsTableContainer">
        @include('admin.events.partials.table')
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('eventSearch');
    const statusSelect = document.getElementById('eventStatus');
    const resetButton = document.getElementById('resetFilters');

    function loadEvents() {
        const search = searchInput.value;
        const status = statusSelect.value;

        const url = new URL(window.location.href);
        url.searchParams.set('search', search);
        url.searchParams.set('status', status);

        fetch(url.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('eventsTableContainer').innerHTML = html;
        });
    }

    let debounceTimer;
    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(loadEvents, 500);
    });

    statusSelect.addEventListener('change', loadEvents);

    resetButton.addEventListener('click', function() {
        searchInput.value = '';
        statusSelect.value = '';
        loadEvents();
    });
});
</script>
@endpush
