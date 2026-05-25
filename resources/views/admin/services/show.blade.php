@extends('layouts.admin')

@section('title', 'View Service | Kasimbagu Admin')
@section('page_title', 'View Service')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>{{ $service->name }}</h1>
        <p>View service details.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-light border" style="background: #fef3c7; color: #d97706; border-color: #fde68a !important;">
            <i class="bi bi-pencil me-2"></i>Edit
        </a>
        <a href="{{ route('admin.services') }}" class="btn btn-light border">
            <i class="bi bi-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="data-table">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0 fw-bold text-dark">Service Information</h5>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Service Name</label>
                    <div class="text-dark fw-bold" style="font-size: 1.1rem;">{{ $service->name }}</div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Category</label>
                    <div><span class="badge" style="background: #e0f2fe; color: #0369a1;">{{ ucfirst($service->category) }}</span></div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Short Description</label>
                    <div class="text-dark">{{ $service->short_description }}</div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Full Description</label>
                    <div class="text-dark" style="white-space: pre-wrap; line-height: 1.7;">{{ $service->description }}</div>
                </div>

                @if($service->features && count($service->features) > 0)
                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Features</label>
                    <ul class="list-unstyled mb-0 mt-2">
                        @foreach($service->features as $feature)
                        <li class="text-dark py-2 d-flex align-items-center gap-2" style="border-bottom: 1px solid #f1f5f9;">
                            <i class="bi bi-check2-circle text-success" style="font-size: 1.1rem;"></i>{{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="data-table">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0 fw-bold text-dark">Service Settings</h5>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Icon</label>
                    <div class="d-flex align-items-center gap-3 mt-2">
                        <div style="width: 48px; height: 48px; border-radius: 12px; background: {{ $service->icon_color }}15; border: 1px solid {{ $service->icon_color }}33; display: flex; align-items: center; justify-content: center;">
                            <i class="bi {{ $service->icon }}" style="color: {{ $service->icon_color }}; font-size: 1.5rem;"></i>
                        </div>
                        <code class="text-dark fw-bold">{{ $service->icon }}</code>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Icon Color</label>
                    <div class="d-flex align-items-center gap-3 mt-2">
                        <div style="width: 48px; height: 48px; border-radius: 8px; background: {{ $service->icon_color }}; border: 1px solid var(--border-color);"></div>
                        <code class="text-dark fw-bold">{{ $service->icon_color }}</code>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small fw-semibold">CTA Button Text</label>
                    <div class="text-dark fw-bold">{{ $service->cta_text }}</div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Featured</label>
                    <div class="mt-1">
                        @if($service->is_featured)
                            <span class="badge badge-success">Yes</span>
                        @else
                            <span class="badge badge-warning">No</span>
                        @endif
                    </div>
                </div>

                <div class="mb-0">
                    <label class="text-muted small fw-semibold">Created At</label>
                    <div class="text-dark mt-1">{{ $service->created_at->format('M d, Y - g:i A') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
