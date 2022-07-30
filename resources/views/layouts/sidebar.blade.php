<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <!-- Sidenav Menu Heading (Account)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <div class="sidenav-menu-heading d-sm-none">Account</div>
                    <!-- Sidenav Link (Alerts)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="bell"></i></div>
                        Alerts
                        <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                    </a>
                    <!-- Sidenav Link (Messages)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Messages
                        <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                    </a>
                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Core</div>
                    <!-- Sidenav Accordion (Dashboard)-->
                    <a class="nav-link collapsed" href="{{url('/dashboard')}}">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Dashboards
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#collapseMonitorings" aria-expanded="false" aria-controls="collapseMonitorings">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Monitoring
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="{{ route('users.index') }}">
                        <div class="nav-link-icon"><i data-feather="user"></i></div>
                        User Management
                    </a>
                    <a class="nav-link collapsed" href="{{ route('limits.index') }}">
                        <div class="nav-link-icon"><i data-feather="settings"></i></div>
                        Settings
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title">{{auth()->user()->name}}</div>
                        </div>
                    </div>
        </nav>
    </div>

    @yield('container')
</div>
