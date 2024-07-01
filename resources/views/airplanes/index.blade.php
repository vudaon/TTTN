@extends('layouts.app')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Management AirPlane Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Management AirPlane Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('airplanes.create') }}" class="btn btn-success float-right m-2">Add new airplane</a>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Numbers of fly</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($airplanes as $airplane)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <th>{{ $airplane->name }}</th>
                                        <td>{{ $airplane->code }}</td>
                                        <td>{{ $airplane->count_fly }}</td>
                                        <td>{{ $airplane->created_at }}</td>
                                        <td><a href="{{ url('airplanes/' . $airplane->id . '/edit') }}">Edit</a></td>
                                        <td>
                                            <form action="{{ url('airplanes/' . $airplane->id) }}" method="post" onsubmit="return confirmDelete(event)">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Hiển thị các liên kết phân trang -->
                         <div class="d-flex justify-content-center">
                        {{ $airplanes->links('vendor.pagination.bootstrap-4') }}
            </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

@endsection
