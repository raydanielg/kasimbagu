@extends('layouts.admin')

@section('title', 'Create Service | Kasimbagu Admin')

@section('content')
<div class="page-header">
    <h1>Create New Service</h1>
    <p>Add a new service to the Kasimbagu offerings.</p>
</div>

<div class="data-table">
    <div class="p-4">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Service Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Category</label>
                        <select name="category" class="form-select" required>
                            <option value="">Select Category</option>
                            <option value="travel">Travel & Visa</option>
                            <option value="legal">Legal Services</option>
                            <option value="research">Research & Consultancy</option>
                            <option value="registration">Company Registration</option>
                            <option value="ict">ICT Solutions</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Short Description</label>
                        <textarea name="short_description" class="form-control" rows="2" required>{{ old('short_description') }}</textarea>
                        <small class="text-muted">Max 500 characters</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Full Description</label>
                        <textarea name="description" class="form-control" rows="6" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Features (one per line)</label>
                        <textarea name="features[]" class="form-control" rows="4" placeholder="Feature 1&#10;Feature 2&#10;Feature 3">{{ old('features') }}</textarea>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Icon (Bootstrap Icons class)</label>
                        <input type="text" name="icon" class="form-control" value="{{ old('icon', 'bi-gear-fill') }}" required>
                        <small class="text-muted">e.g., bi-gear-fill, bi-airplane-fill</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Icon Color</label>
                        <input type="color" name="icon_color" class="form-control form-control-color" value="{{ old('icon_color', '#3b82f6') }}" style="height: 50px;" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">CTA Button Text</label>
                        <input type="text" name="cta_text" class="form-control" value="{{ old('cta_text', 'Learn More') }}" required>
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" style="width: 50px; height: 25px;" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">Featured Service</label>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary flex-grow-1" style="background: var(--primary);">Create Service</button>
                        <a href="{{ route('admin.services') }}" class="btn btn-light">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
