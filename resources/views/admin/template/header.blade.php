<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid d-flex justify-content-between">
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
            <li class="nav-item d-none d-md-flex align-items-center nav-text-item"> 
                 @yield('header_left')
            </li>
        </ul>
        @yield('header_center')
        <ul class="navbar-nav">
            <li class="nav-item user-menu"> 
                @yield('header_right')
            </li>
        </ul>
    </div>
</nav>