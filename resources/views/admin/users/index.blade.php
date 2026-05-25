@extends('layouts.admin')

@section('title', 'Users Management | Kasimbagu Admin')
@section('page_title', 'Users')

@section('content')
<div class="page-header">
    <h1>Users</h1>
    <p>Manage all registered users.</p>
</div>

<div class="data-table">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: var(--border-color);">
        <h5 class="mb-0 fw-bold text-dark">All Users</h5>
        <div class="d-flex gap-2">
            <input type="text" class="form-control form-control-sm" placeholder="Search users..." style="width: 250px;">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($users->count() > 0)
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="fw-bold text-dark">{{ $user->first_name }} {{ $user->last_name }}</div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="badge" style="background: #fef2f2; color: #ef4444; border: 1px solid #fecaca;">Admin</span>
                            @else
                                <span class="badge badge-success">User</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-light border">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @if($user->role !== 'admin')
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm border" style="background: #fef2f2; color: #ef4444; border-color: #fecaca !important;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">
                            <i class="bi bi-people" style="font-size: 3rem; opacity: 0.5;"></i>
                            <p class="mt-3 mb-0">No users found.</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @if($users->hasPages())
    <div class="p-4 border-top" style="border-color: var(--border-color);">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
