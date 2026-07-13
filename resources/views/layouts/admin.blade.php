<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard | Kasimbagu')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        :root {
            --sidebar-width: 260px;
            --bg-dark: #f1f5f9;
            --bg-card: #ffffff;
            --sidebar-bg: #ffffff;
            --border-color: #e2e8f0;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --primary: #c9993a;
            --primary-light: rgba(201, 153, 58, 0.12);
            --primary-dark: #a07825;
            --accent-blue: #0ea5e9;
            --accent-green: #22c55e;
            --accent-red: #ef4444;
        }
        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            z-index: 1000;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 24px rgba(148, 163, 184, 0.15);
        }
        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(201, 153, 58, 0.05);
        }
        .sidebar-brand img {
            height: 32px;
            width: auto;
        }
        .sidebar-brand h2 {
            font-size: 1.15rem;
            font-weight: 700;
            margin: 0;
            color: var(--text-main);
            line-height: 1.1;
        }
        .sidebar-brand span {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary);
            font-weight: 800;
            display: block;
        }
        .sidebar-nav {
            padding: 20px 14px;
            flex-grow: 1;
        }
        .nav-section-title {
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-muted);
            margin: 20px 0 10px 12px;
        }
        .nav-item {
            margin-bottom: 4px;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #475569;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            font-size: 0.88rem;
            border: 1px solid transparent;
        }
        .nav-link:hover {
            background: rgba(201, 153, 58, 0.1);
            color: var(--primary);
            border-color: rgba(201, 153, 58, 0.2);
            transform: translateX(4px);
        }
        .nav-link.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(201, 153, 58, 0.2);
        }
        .nav-link i {
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sidebar-footer {
            padding: 16px 14px;
            border-top: 1px solid var(--border-color);
        }
        .btn-signout {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: var(--accent-red);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.88rem;
            transition: all 0.3s ease;
            background: rgba(248, 113, 113, 0.1);
            border: 1px solid rgba(248, 113, 113, 0.2);
        }
        .btn-signout:hover {
            background: rgba(248, 113, 113, 0.2);
            border-color: var(--accent-red);
        }

        /* Top Bar */
        .topbar {
            margin-left: var(--sidebar-width);
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
        }
        .topbar-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-main);
            margin: 0;
        }
        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .notification-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .notification-btn:hover {
            background: rgba(201, 153, 58, 0.1);
            color: var(--primary);
            border-color: var(--primary);
        }
        .user-profile-dropdown {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            padding: 6px 16px 6px 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .user-profile-dropdown:hover {
            border-color: var(--primary);
        }
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
        }
        .user-info {
            line-height: 1.2;
        }
        .user-name {
            font-size: 0.85rem;
            font-weight: 700;
            color: #f1f5f9;
        }
        .user-role {
            font-size: 0.72rem;
            color: var(--text-muted);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 0 32px 32px;
            min-height: calc(100vh - 70px);
        }

        /* Support for other management pages (.data-table) */
        .data-table {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .data-table .table {
            margin: 0;
            color: var(--text-main);
        }
        .data-table .table th {
            background: #f8fafc;
            border-bottom: 1px solid var(--border-color);
            padding: 16px 24px;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
        }
        .data-table .table td {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            font-size: 0.88rem;
        }
        .data-table .table tr:last-child td {
            border-bottom: none;
        }
        .data-table .table tbody tr:hover {
            background-color: rgba(201, 153, 58, 0.05);
        }
        .form-control, .form-select {
            background-color: var(--bg-card) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-main) !important;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.88rem;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(201, 153, 58, 0.1) !important;
        }
        .form-control::placeholder {
            color: var(--text-muted);
        }
        .btn-light {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            border-radius: 10px;
            font-weight: 500;
        }
        .btn-light:hover {
            background: rgba(201, 153, 58, 0.1);
            border-color: var(--primary);
            color: var(--primary);
        }
        .page-header {
            margin-bottom: 32px;
        }
        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 6px;
        }
        .page-header p {
            color: var(--text-muted);
            font-size: 0.92rem;
            margin: 0;
        }

        /* Elements from Screenshot */
        .dashboard-stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            border-radius: 12px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            height: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .dashboard-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.4);
            border-color: var(--primary);
        }
        .dashboard-stat-icon-wrapper {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }
        .dashboard-stat-card:hover .dashboard-stat-icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }
        .dashboard-stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: #f1f5f9;
            margin-bottom: 4px;
            line-height: 1.1;
        }
        .dashboard-stat-label {
            font-size: 0.82rem;
            color: var(--text-muted);
            margin: 0;
            font-weight: 500;
        }

        .dashboard-panel-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            border-radius: 12px;
            padding: 24px;
            height: 100%;
            transition: all 0.3s ease;
        }
        .dashboard-panel-card:hover {
            box-shadow: 0 8px 30px rgba(0,0,0,0.4);
            border-color: var(--primary);
        }
        .dashboard-panel-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #f1f5f9;
            margin-bottom: 20px;
        }

        /* Table */
        .dashboard-table-container {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            overflow: hidden;
            margin-top: 24px;
            transition: all 0.3s ease;
        }
        .dashboard-table-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8fafc;
        }
        .dashboard-table-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-main);
            margin: 0;
        }
        .dashboard-table {
            width: 100%;
            margin: 0;
        }
        .dashboard-table th {
            background: rgba(15, 23, 42, 0.5);
            border-bottom: 1px solid var(--border-color);
            padding: 14px 24px;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
        }
        .dashboard-table td {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            font-size: 0.88rem;
        }
        .dashboard-table tr:last-child td {
            border-bottom: none;
        }
        .dashboard-table tbody tr:hover {
            background-color: rgba(201, 153, 58, 0.05);
        }

        /* Modern Sleek Badges styling */
        .badge {
            padding: 6px 14px !important;
            font-weight: 600 !important;
            font-size: 0.75rem !important;
            border-radius: 8px !important;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid transparent !important;
        }
        .badge-success {
            background-color: rgba(52, 211, 153, 0.15) !important;
            color: #34d399 !important;
            border-color: rgba(52, 211, 153, 0.3) !important;
        }
        .badge-warning {
            background-color: rgba(251, 191, 36, 0.15) !important;
            color: #fbbf24 !important;
            border-color: rgba(251, 191, 36, 0.3) !important;
        }
        .badge-danger {
            background-color: rgba(248, 113, 113, 0.15) !important;
            color: #f87171 !important;
            border-color: rgba(248, 113, 113, 0.3) !important;
        }
        .badge-info {
            background-color: rgba(56, 189, 248, 0.15) !important;
            color: #38bdf8 !important;
            border-color: rgba(56, 189, 248, 0.3) !important;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0;
        }
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }

        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .topbar {
                margin-left: 0;
                padding: 0 16px;
            }
            .main-content {
                margin-left: 0;
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div style="width:36px;height:36px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="bi bi-shield-fill-check" style="color:var(--primary);font-size:1.25rem;"></i>
            </div>
            <div>
                <h2>Kasimbagu</h2>
                <span>ADMIN PANEL</span>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-section-title">MAIN</div>
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="nav-section-title">MANAGEMENT</div>
            <div class="nav-item">
                <a href="{{ route('admin.services') }}" class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                    <i class="bi bi-gear-fill"></i>
                    <span>Services</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.inquiries') }}" class="nav-link {{ request()->is('admin/inquiries*') ? 'active' : '' }}">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Inquiries</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.bookings') }}" class="nav-link {{ request()->is('admin/bookings*') ? 'active' : '' }}">
                    <i class="bi bi-calendar2-check-fill"></i>
                    <span>Travel Bookings</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.destinations') }}" class="nav-link {{ request()->is('admin/destinations*') ? 'active' : '' }}">
                    <i class="bi bi-pin-map-fill"></i>
                    <span>Travel Destinations</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Users</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.newsletters') }}" class="nav-link {{ request()->is('admin/newsletters*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i>
                    <span>Newsletters</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.blogs') }}" class="nav-link {{ request()->is('admin/blogs*') ? 'active' : '' }}">
                    <i class="bi bi-journal-text"></i>
                    <span>Blogs</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.events') }}" class="nav-link {{ request()->is('admin/events*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event"></i>
                    <span>Events</span>
                </a>
            </div>

            <div class="nav-section-title">SYSTEM</div>
            <div class="nav-item">
                <a href="{{ url('/') }}" class="nav-link" target="_blank">
                    <i class="bi bi-globe"></i>
                    <span>View Website</span>
                </a>
            </div>
        </nav>
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" class="btn-signout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
            </a>
        </div>
    </aside>

    <!-- Top Bar -->
    <header class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-light d-lg-none" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <h1 class="topbar-title">@yield('page_title', 'Dashboard')</h1>
        </div>
        <div class="topbar-actions">
            <div class="notification-btn">
                <i class="bi bi-bell"></i>
            </div>
            <div class="user-profile-dropdown">
                <div class="user-avatar">
                    {{ substr(auth()->user()->first_name, 0, 1) }}
                </div>
                <div class="user-info">
                    <div class="user-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
                    <div class="user-role">Administrator</div>
                </div>
                <i class="bi bi-chevron-down text-muted ms-1" style="font-size:0.75rem;"></i>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content animate__animated animate__fadeIn animate__faster">
        @yield('content')
    </main>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar')?.classList.toggle('active');
        });
    </script>
    @stack('scripts')
</body>
</html>
