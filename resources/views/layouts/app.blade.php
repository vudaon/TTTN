<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manager Aircraft</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<style>
     .content-wrapper {
            margin-left: 0; /* Đảm bảo không có margin ở phần trên */
            padding-left: 0; /* Đảm bảo không có padding ở phần trên */
        }
    @media (max-width: 768px) {
      .navbar-nav .nav-item {
        float: none;
        width: 100%;
      }
      .navbar-nav .nav-link {
        text-align: center;
      }
    }
    @media (min-width: 769px) {
      .navbar-nav .nav-item {
        float: left;
      }
      .navbar-nav .nav-link {
        text-align: left;
      }
    }
    @media (max-width: 576px) {
      .table {
        width: 100%;
        display: block;
        overflow-x: auto;
        white-space: nowrap;
      }
      .btn {
        display: block;
        width: 100%;
        margin-bottom: 10px;
      }
    }
  </style>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Footer -->
        @include('layouts.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
