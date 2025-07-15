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
                <div class="sidenav-menu-heading"></div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link" href="{{route('dashboard')}}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>
                <!-- Sidenav Heading (Addons)-->
                <div class="sidenav-menu-heading">Admin Menu</div>
                @can('user.view')
                <!-- Sidenav Link (Charts)-->
                <a class="nav-link" href="{{route('user.index')}}">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Users
                </a>
                @endcan
                @can('module.view')
                <!-- Sidenav Link (Tables)-->
                <a class="nav-link" href="{{route('module.index')}}">
                    <div class="nav-link-icon"><i data-feather="check-square"></i></div>
                    Module
                </a>
                @endcan
                <!-- Sidenav Heading (Addons)-->
                <div class="sidenav-menu-heading">Operation Menu</div>
                <!-- Incident -->
                @can('issue.view')
                <!-- Sidenav Link (Charts)-->
                <a class="nav-link" href="{{route('issue.index')}}">
                    <div class="nav-link-icon"><i data-feather="flag"></i></div>
                    Incident
                </a>
                @endcan
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{Auth::user()->name ?? 'Guest'}}</div>
                <div class="sidenav-footer-subtitle">Role : {{Auth::user()->role ?? 'no role'}}</div>
            </div>
        </div>
    </nav>
</div>
