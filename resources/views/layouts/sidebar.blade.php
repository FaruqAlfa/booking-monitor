<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" aria-disabled="false">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Booking Monitor</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ request()->routeIs('order') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('order') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Order</span></a>
    </li>
    @php
        $role = Auth::user()->role;
    @endphp
    @if ($role == 'admin')
        <li class="nav-item {{ request()->routeIs('log-activity') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('log-activity') }}">
                <i class="fas fa-list fa-sm fa-fw "></i>
                <span>Log Activity</span></a>
        </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
