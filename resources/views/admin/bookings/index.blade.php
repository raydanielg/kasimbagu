@extends('layouts.admin')

@section('title', 'Travel Bookings Management | Kasimbagu Admin')
@section('page_title', 'Travel Bookings')

@section('content')
<div class="page-header">
    <h1>Travel Bookings</h1>
    <p>Manage passenger bookings, flight requests, and visa applications.</p>
</div>

<div class="data-table">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="border-color: var(--border-color);">
        <h5 class="mb-0 fw-bold text-dark">All Travel Bookings</h5>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Booking Type</th>
                    <th>Destination</th>
                    <th>Departure / Return</th>
                    <th>Passengers</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($bookings->count() > 0)
                    @foreach($bookings as $booking)
                    <tr>
                        <td>
                            <div class="fw-bold text-dark">{{ $booking->name }}</div>
                            <div class="text-muted small">{{ $booking->email }}</div>
                            <div class="text-muted small">{{ $booking->phone }}</div>
                        </td>
                        <td>
                            <span class="badge" style="background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; font-weight:600; text-transform:uppercase;">
                                {{ $booking->booking_type }}
                            </span>
                        </td>
                        <td class="fw-semibold text-dark">{{ $booking->destination ?? 'N/A' }}</td>
                        <td>
                            @if($booking->departure_date)
                                <div class="text-dark small"><i class="bi bi-calendar2-event me-1"></i>{{ $booking->departure_date->format('M d, Y') }}</div>
                                @if($booking->return_date)
                                    <div class="text-muted small"><i class="bi bi-calendar2-check me-1"></i>{{ $booking->return_date->format('M d, Y') }}</div>
                                @endif
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td class="text-center text-dark fw-bold">{{ $booking->passengers }}</td>
                        <td>
                            @if($booking->status === 'pending')
                                <span class="badge badge-warning">Pending</span>
                            @elseif($booking->status === 'confirmed')
                                <span class="badge badge-success">Confirmed</span>
                            @else
                                <span class="badge badge-danger">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm border py-1 px-2" style="font-size:0.8rem; width:120px;">
                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking request?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm border" style="background: #fef2f2; color: #ef4444; border-color: #fecaca !important;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @if($booking->message)
                    <tr>
                        <td colspan="7" class="bg-light p-3" style="font-size: 0.82rem; border-top: none;">
                            <strong class="text-dark d-block mb-1">Customer Message:</strong>
                            <span class="text-muted">{{ $booking->message }}</span>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center text-muted py-5">
                            <i class="bi bi-calendar2-x" style="font-size: 3rem; opacity: 0.5;"></i>
                            <p class="mt-3 mb-0">No travel bookings found yet.</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @if($bookings->hasPages())
    <div class="p-4 border-top" style="border-color: var(--border-color);">
        {{ $bookings->links() }}
    </div>
    @endif
</div>
@endsection
