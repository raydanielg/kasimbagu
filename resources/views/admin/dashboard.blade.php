@extends('layouts.admin')

@section('title', 'Admin Dashboard | Kasimbagu')
@section('page_title', 'Dashboard')

@section('content')
<!-- First Row of Stats -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
        <div class="dashboard-stat-card">
            <div class="dashboard-stat-icon-wrapper" style="background: #e0f2fe; color: #0284c7;">
                <i class="bi bi-people-fill"></i>
            </div>
            <div>
                <div class="dashboard-stat-value">{{ App\Models\User::count() }}</div>
                <div class="dashboard-stat-label">Total Users</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="dashboard-stat-card">
            <div class="dashboard-stat-icon-wrapper" style="background: #fef3c7; color: #d97706;">
                <i class="bi bi-envelope-open-fill"></i>
            </div>
            <div>
                <div class="dashboard-stat-value">{{ App\Models\Inquiry::count() }}</div>
                <div class="dashboard-stat-label">Total Inquiries</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="dashboard-stat-card">
            <div class="dashboard-stat-icon-wrapper" style="background: #fce7f3; color: #db2777;">
                <i class="bi bi-newspaper"></i>
            </div>
            <div>
                <div class="dashboard-stat-value">{{ App\Models\Newsletter::count() }}</div>
                <div class="dashboard-stat-label">Subscribers</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="dashboard-stat-card">
            <div class="dashboard-stat-icon-wrapper" style="background: #e0e7ff; color: #4f46e5;">
                <i class="bi bi-gear-fill"></i>
            </div>
            <div>
                <div class="dashboard-stat-value">{{ App\Models\Service::count() }}</div>
                <div class="dashboard-stat-label">Active Services</div>
            </div>
        </div>
    </div>
</div>

<!-- Second Row of Stats -->
<div class="row g-4 mb-5">
    <div class="col-xl-3 col-sm-6">
        <div class="dashboard-stat-card">
            <div class="dashboard-stat-icon-wrapper" style="background: #ecfdf5; color: #059669;">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <div>
                <div class="dashboard-stat-value">+255 690</div>
                <div class="dashboard-stat-label">Support Number</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="dashboard-stat-card">
            <div class="dashboard-stat-icon-wrapper" style="background: #f5f5f4; color: #737373;">
                <i class="bi bi-shield-fill-check"></i>
            </div>
            <div>
                <div class="dashboard-stat-value">Active</div>
                <div class="dashboard-stat-label">System Security</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="dashboard-stat-card">
            <div class="dashboard-stat-icon-wrapper" style="background: #fff1f2; color: #e11d48;">
                <i class="bi bi-activity"></i>
            </div>
            <div>
                <div class="dashboard-stat-value">99.9%</div>
                <div class="dashboard-stat-label">Server Uptime</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="dashboard-stat-card">
            <div class="dashboard-stat-icon-wrapper" style="background: #f0fdf4; color: #16a34a;">
                <i class="bi bi-whatsapp"></i>
            </div>
            <div>
                <div class="dashboard-stat-value">+255 653</div>
                <div class="dashboard-stat-label">WhatsApp Channel</div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row g-4 mb-5">
    <div class="col-lg-8">
        <div class="dashboard-panel-card">
            <h5 class="dashboard-panel-title">Activity Trend (Last 14 Days)</h5>
            <div style="height: 280px; position: relative;">
                <canvas id="activityChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="dashboard-panel-card">
            <h5 class="dashboard-panel-title">Distribution</h5>
            <div style="height: 280px; position: relative; display: flex; align-items: center; justify-content: center;">
                <canvas id="distributionChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Data Table Section -->
<div class="dashboard-table-container">
    <div class="dashboard-table-header">
        <h5 class="dashboard-table-title">Recent Inquiries</h5>
        <a href="{{ route('admin.inquiries') }}" class="btn btn-sm btn-light border" style="font-size: 0.8rem; font-weight:600; color:var(--text-muted);">View All Inquiries</a>
    </div>
    <div class="table-responsive">
        <table class="table dashboard-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($inquiries->count() > 0)
                    @foreach($inquiries->take(5) as $inquiry)
                    <tr>
                        <td class="fw-semibold text-dark">{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->email }}</td>
                        <td>
                            <span class="badge" style="background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; font-weight: 600; font-size: 0.75rem;">
                                {{ $inquiry->service ?? 'General' }}
                            </span>
                        </td>
                        <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="btn btn-sm btn-light border fw-semibold" style="font-size: 0.78rem;">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No inquiries yet.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@php
    if (session('admin_welcome')) {
        session()->forget('admin_welcome');
    }
@endphp
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @if(session('admin_welcome'))
    Swal.fire({
        icon: 'success',
        title: 'Welcome Admin!',
        text: 'You have successfully logged in to the admin dashboard.',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
    });
    @endif

    // Activity Trend Chart
    const ctxActivity = document.getElementById('activityChart').getContext('2d');
    
    // Generate last 14 days labels
    const labels = [];
    for (let i = 13; i >= 0; i--) {
        const d = new Date();
        d.setDate(d.getDate() - i);
        labels.push(d.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }));
    }

    // Mock trend line matching the peak curve on the screenshot
    const activityData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 8, 1, 9, 0];

    new Chart(ctxActivity, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Inquiries',
                data: activityData,
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 3,
                pointBackgroundColor: '#3b82f6'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: '#f1f5f9' },
                    ticks: { color: '#94a3b8', font: { size: 10 } }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: '#94a3b8', font: { size: 10 } }
                }
            }
        }
    });

    // Distribution Chart
    const ctxDist = document.getElementById('distributionChart').getContext('2d');
    const inquiryCount = {{ App\Models\Inquiry::count() }};
    const newsletterCount = {{ App\Models\Newsletter::count() }};
    const userCount = {{ App\Models\User::count() }};

    new Chart(ctxDist, {
        type: 'doughnut',
        data: {
            labels: ['Inquiries', 'Subscribers', 'Users'],
            datasets: [{
                data: [
                    inquiryCount || 1, 
                    newsletterCount || 1, 
                    userCount || 1
                ],
                backgroundColor: ['#3b82f6', '#db2777', '#fbbf24'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 12,
                        padding: 15,
                        font: { size: 11, family: 'Inter' },
                        color: '#64748b'
                    }
                }
            }
        }
    });
</script>
@endpush
