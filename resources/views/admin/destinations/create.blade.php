@extends('layouts.admin')

@section('title', 'Add Destination | Kasimbagu Admin')
@section('page_title', 'Add Destination')

@section('content')
<div class="page-header">
    <h1>Add New Destination</h1>
    <p>Create a destination for flight and visa applications.</p>
</div>

<div class="data-table">
    <div class="p-4">
        <form action="{{ route('admin.destinations.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Destination Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Dubai" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ old('country') }}" placeholder="e.g. United Arab Emirates" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Region</label>
                        <select name="region" class="form-select" required>
                            <option value="">Select Region</option>
                            <option value="Middle East">Middle East</option>
                            <option value="Europe">Europe</option>
                            <option value="Asia">Asia</option>
                            <option value="North America">North America</option>
                            <option value="Africa">Africa</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="5" placeholder="Highlight why this is a great travel and business hub..." required>{{ old('description') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Visa Type</label>
                            <input type="text" name="visa_type" class="form-control" value="{{ old('visa_type') }}" placeholder="e.g. E-Visa / Visa Required">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Flight Duration</label>
                            <input type="text" name="flight_duration" class="form-control" value="{{ old('flight_duration') }}" placeholder="e.g. 5 hours">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Best Season to Visit</label>
                        <input type="text" name="best_season" class="form-control" value="{{ old('best_season') }}" placeholder="e.g. November to March">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Destination Image URL</label>
                        <input type="url" name="image_url" class="form-control" value="{{ old('image_url') }}" placeholder="https://images.unsplash.com/...">
                        <small class="text-muted">Direct link to an Unsplash or similar image file</small>
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="visa_required" id="visa_required" style="width: 50px; height: 25px;" checked>
                            <label class="form-check-label ms-2" for="visa_required">Visa Required</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular" style="width: 50px; height: 25px;">
                            <label class="form-check-label ms-2" for="is_popular">Popular Destination</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" style="width: 50px; height: 25px;" checked>
                            <label class="form-check-label ms-2" for="is_active">Active & Visible</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" required>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary flex-grow-1" style="background: var(--primary); border: none;">Create Destination</button>
                        <a href="{{ route('admin.destinations') }}" class="btn btn-light">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
