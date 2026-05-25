@extends('layouts.admin')

@section('title', 'View User | Kasimbagu Admin')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>User Details</h1>
        <p>View user information.</p>
    </div>
    <div class="d-flex gap-2">
        @if($user->role !== 'admin')
        <a href="mailto:{{ $user->email }}" class="btn btn-primary">
            <i class="bi bi-envelope me-2"></i>Contact User
        </a>
        @endif
        <a href="{{ route('admin.users') }}" class="btn" style="background: var(--card-bg); border: 1px solid var(--border-color); color: #e2e8f0;">
            <i class="bi bi-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="data-table">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0">User Information</h5>
            </div>
            <div class="p-4">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">First Name</label>
                        <div class="text-white fw-bold">{{ $user->first_name }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">Last Name</label>
                        <div class="text-white fw-bold">{{ $user->last_name }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">Email</label>
                        <div class="text-white">
                            <a href="mailto:{{ $user->email }}" class="text-decoration-none" style="color: #3b82f6;">{{ $user->email }}</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="text-muted small">Role</label>
                        <div>
                            @if($user->role === 'admin')
                                <span class="badge badge-danger">Admin</span>
                            @else
                                <span class="badge badge-success">User</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="data-table">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0">Account Details</h5>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <label class="text-muted small">User ID</label>
                    <div class="text-white">#{{ $user->id }}</div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small">Email Verified</label>
                    <div>
                        @if($user->email_verified_at)
                            <span class="badge badge-success">Yes</span>
                            <div class="text-muted small mt-1">{{ $user->email_verified_at->format('M d, Y') }}</div>
                        @else
                            <span class="badge badge-warning">No</span>
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small">Joined At</label>
                    <div class="text-white">{{ $user->created_at->format('M d, Y - g:i A') }}</div>
                </div>

                <div class="mb-0">
                    <label class="text-muted small">Last Updated</label>
                    <div class="text-white">{{ $user->updated_at->format('M d, Y - g:i A') }}</div>
                </div>
            </div>
        </div>

        @if($user->role !== 'admin')
        <div class="data-table mt-4">
            <div class="p-4 border-bottom" style="border-color: var(--border-color);">
                <h5 class="mb-0">Actions</h5>
            </div>
            <div class="p-4">
                <div class="d-flex flex-column gap-2">
                    <a href="mailto:{{ $user->email }}" class="btn btn-primary">
                        <i class="bi bi-envelope me-2"></i>Send Email
                    </a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn w-100" style="background: rgba(239, 68, 68, 0.2); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.3);">
                            <i class="bi bi-trash me-2"></i>Delete User
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
