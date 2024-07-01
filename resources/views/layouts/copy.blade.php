<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manager Aircraft</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <style>
    .nav-link.active {
      background-color: #007bff;
      color: #fff;
    }
    .nav-link:hover {
      background-color: #0056b3;
      color: #fff;
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
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="#">Drone Team</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="far fa-comments"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="far fa-bell"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-th-large"></i></a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
      </ul>
    </div>
  </nav>

  <!-- Sidebar -->
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
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') || Request::is('users/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>Manager User</p>
            </a>
            <a href="{{ route('checklist.index') }}" class="nav-link {{ Request::is('checklist') || Request::is('checklist/*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>Manager Check Lists</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Management Check List Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Management Check List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-sm-12">
            <a href="{{ route('checklist.create') }}" class="btn btn-success float-right m-2">Add new check list</a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Flight Times</th>
                    <th>Time</th>
                    <th>Aircraft Tested</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lists as $list)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td><a href="{{ route('checklist.edit', $list->id) }}">Flight No.{{ $list->flight_number }}</a></td>
                      <td>{{ $list->time }}</td>
                      <td>{{ $list->airplane->name }}</td>
                      <td><a href="{{ route('checklist.show', ['checklist' => $list->id]) }}?type=before" class="btn btn-info">Before Categories</a></td>
                      <td><a href="{{ route('checklist.show', ['checklist' => $list->id]) }}?type=after" class="btn btn-info">After Categories</a></td>
                      <td>
                        <form action="{{ route('checklist.destroy', $list->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center">
              {{ $lists->links('vendor.pagination.bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">Anything you want</div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
