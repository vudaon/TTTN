<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Drone Team</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('airplanes.index') }}" class="nav-link {{ Request::is('airplanes') || Request::is('airplanes/*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Manager Aircraft</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') || Request::is('users/*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Manager User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('checklist.index') }}" class="nav-link {{ Request::is('checklist') || Request::is('checklist/*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Manager Check Lists</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<style>
    .nav-link.active {
    background-color: #007bff; /* Màu nền khi mục được chọn */
    color: #fff; /* Màu chữ khi mục được chọn */
}

    .nav-link:hover {
        background-color: #0056b3; /* Màu nền khi mục được hover */
        color: #fff; /* Màu chữ khi mục được hover */
    }
  </style>