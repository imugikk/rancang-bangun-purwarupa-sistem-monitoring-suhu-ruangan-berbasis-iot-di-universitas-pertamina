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
                    @if(Auth::check() && auth()->user()->role_id  == "1")
                        <a class="nav-link collapsed" href="{{url('/dashboard')}}">
                            <div class="nav-link-icon"><i data-feather="menu"></i></div>
                            Dashboards
                        </a>
                        <a class="nav-link collapsed" href="{{url('/monitoring')}}">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Monitoring
                        </a>
                        <a class="nav-link collapsed" href="{{ route('users.index') }}">
                            <div class="nav-link-icon"><i data-feather="user"></i></div>
                            User Management
                        </a>
                        <a class="nav-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
                            <div class="nav-link-icon"><i data-feather="settings"></i></div>
                            Settings
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseSettings" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                <a class="nav-link" href="{{ route('rooms.index') }}">Ruangan</a>
                                <a class="nav-link" href="/schedules">Jadwal</a>
                                <a class="nav-link" href="{{ route('limits.index') }}">Batas Suhu</a>
                                <a class="nav-link" href="{{ route('account.index') }}">Akun</a>
                            </nav>
                        </div>
                    @elseif (Auth::check())
                        <a class="nav-link collapsed" href="{{url('/dashboard')}}">
                            <div class="nav-link-icon"><i data-feather="menu"></i></div>
                            Dashboards
                        </a>
                        <a class="nav-link collapsed" href="{{url('/monitoring')}}">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Monitoring
                        </a>
                        <a class="nav-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
                            <div class="nav-link-icon"><i data-feather="settings"></i></div>
                            Settings
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseSettings" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages"
                                <a class="nav-link" href="{{ route('account.index') }}">Akun</a>
                            </nav>
                        </div>
                    @endif
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
