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
            margin-left: 0; 
            padding-left: 0;
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
    .expandable-content {
        position: relative;
        display: flex;
        align-items: center;
    }
    .content-short, .content-long {
        overflow: hidden;
        white-space: nowrap;
        /* text-overflow: ellipsis; */
    }
    .content-short {
        display: inline-block;
    }
    .content-long {
        display: none;
    }
    .toggle-btn {
        background-color: transparent;
        border: none;
        cursor: pointer;
        color: blue;
        font-weight: bold;
        margin-left: 5px;
    }

    .expandable-content.expanded .content-short {
        display: none;
    }
    .expandable-content.expanded .content-long {
        display: inline-block;
        white-space: normal;
    }

    .table-responsive {
        width: 100%;
        display: block;
        overflow-x: auto;
    }

    .table th, .table td {
        word-wrap: break-word;
        max-width: 150px;
        overflow: hidden;
        /* text-overflow: ellipsis; */
    }

    .table th {
        white-space: nowrap;
    }

      .table .col-long {
        min-width: 200px; 
        max-width: 300px; 
    }
  
  </style>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.header')

        @include('layouts.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>


        @include('layouts.footer')
    </div>


    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
</body>
</html>
