@extends('layouts.admin')

@section('title', 'View Inquiry | Kasimbagu Admin')
@section('page_title', 'Inquiry Details')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>Inquiry Details</h1>
        <p>View customer inquiry information.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="mailto:{{ $inquiry->email }}" class="btn btn-primary" style="background: var(--primary); border: none;">
            <i class="bi bi-envelope me-2"></i>Reply via Email
        </a>
        <a href="{{ route('admin.inquiries') }}" class="btn btn-light border">
            <i class="bi bi-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="data-table">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0 fw-bold text-dark">Customer Information</h5>
            </div>
            <div class="p-4">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small fw-semibold">Full Name</label>
                        <div class="text-dark fw-bold">{{ $inquiry->name }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small fw-semibold">Email</label>
                        <div class="text-dark">
                            <a href="mailto:{{ $inquiry->email }}" class="text-decoration-none fw-semibold" style="color: var(--primary);">{{ $inquiry->email }}</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small fw-semibold">Phone</label>
                        <div class="text-dark fw-semibold">{{ $inquiry->phone ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small fw-semibold">Service</label>
                        <div>
                            @if($inquiry->service)
                                <span class="badge" style="background: #e0f2fe; color: #0369a1;">{{ $inquiry->service }}</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small fw-semibold">Destination</label>
                        <div class="text-dark fw-semibold">{{ $inquiry->destination ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small fw-semibold">Subject</label>
                        <div class="text-dark fw-semibold">{{ $inquiry->subject ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="data-table mt-4">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0 fw-bold text-dark">Message</h5>
            </div>
            <div class="p-4">
                <div class="text-dark" style="white-space: pre-wrap; line-height: 1.8;">{{ $inquiry->message }}</div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="data-table">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0 fw-bold text-dark">Inquiry Details</h5>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Inquiry ID</label>
                    <div class="text-dark fw-bold">#{{ $inquiry->id }}</div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Source</label>
                    <div class="text-dark fw-semibold">{{ $inquiry->source ?? 'Direct' }}</div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small fw-semibold">Submitted At</label>
                    <div class="text-dark fw-semibold">{{ $inquiry->created_at->format('M d, Y - g:i A') }}</div>
                </div>

                <div class="mb-0">
                    <label class="text-muted small fw-semibold">Status</label>
                    <div class="mt-1">
                        <span class="badge badge-warning">New</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="data-table mt-4">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0 fw-bold text-dark">Quick Actions</h5>
            </div>
            <div class="p-4">
                <div class="d-flex flex-column gap-2">
                    <a href="mailto:{{ $inquiry->email }}" class="btn btn-primary" style="background: var(--primary); border: none;">
                        <i class="bi bi-envelope me-2"></i>Send Email
                    </a>
                    <a href="https://wa.me/255653291058" target="_blank" class="btn" style="background: rgba(37, 211, 102, 0.1); color: #047857; border: 1px solid rgba(37, 211, 102, 0.2);">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn w-100 border" style="background: #fef2f2; color: #ef4444; border-color: #fecaca !important;">
                            <i class="bi bi-trash me-2"></i>Delete Inquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
