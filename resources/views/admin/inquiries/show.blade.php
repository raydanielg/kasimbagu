@extends('layouts.admin')

@section('title', 'View Inquiry | Kasimbagu Admin')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>Inquiry Details</h1>
        <p>View customer inquiry information.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="mailto:{{ $inquiry->email }}" class="btn btn-primary">
            <i class="bi bi-envelope me-2"></i>Reply via Email
        </a>
        <a href="{{ route('admin.inquiries') }}" class="btn" style="background: var(--card-bg); border: 1px solid var(--border-color); color: #e2e8f0;">
            <i class="bi bi-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="data-table">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0">Customer Information</h5>
            </div>
            <div class="p-4">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">Full Name</label>
                        <div class="text-white fw-bold">{{ $inquiry->name }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">Email</label>
                        <div class="text-white">
                            <a href="mailto:{{ $inquiry->email }}" class="text-decoration-none" style="color: #3b82f6;">{{ $inquiry->email }}</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">Phone</label>
                        <div class="text-white">{{ $inquiry->phone ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">Service</label>
                        <div>
                            @if($inquiry->service)
                                <span class="badge badge-info">{{ $inquiry->service }}</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">Destination</label>
                        <div class="text-white">{{ $inquiry->destination ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">Subject</label>
                        <div class="text-white">{{ $inquiry->subject ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="data-table mt-4">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0">Message</h5>
            </div>
            <div class="p-4">
                <div class="text-white" style="white-space: pre-wrap; line-height: 1.8;">{{ $inquiry->message }}</div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="data-table">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0">Inquiry Details</h5>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <label class="text-muted small">Inquiry ID</label>
                    <div class="text-white">#{{ $inquiry->id }}</div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small">Source</label>
                    <div class="text-white">{{ $inquiry->source ?? 'Direct' }}</div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small">Submitted At</label>
                    <div class="text-white">{{ $inquiry->created_at->format('M d, Y - g:i A') }}</div>
                </div>

                <div class="mb-0">
                    <label class="text-muted small">Status</label>
                    <div>
                        <span class="badge badge-warning">New</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="data-table mt-4">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="p-4">
                <div class="d-flex flex-column gap-2">
                    <a href="mailto:{{ $inquiry->email }}" class="btn btn-primary">
                        <i class="bi bi-envelope me-2"></i>Send Email
                    </a>
                    <a href="https://wa.me/255653291058" target="_blank" class="btn" style="background: rgba(37, 211, 102, 0.2); color: #34d399; border: 1px solid rgba(37, 211, 102, 0.3);">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn w-100" style="background: rgba(239, 68, 68, 0.2); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.3);">
                            <i class="bi bi-trash me-2"></i>Delete Inquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
