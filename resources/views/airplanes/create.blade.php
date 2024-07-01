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
                    <h1 class="m-0">Create Airplane Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Airplane Page</li>
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
                <div class="col-sm-6">
                    <form action="{{ route('airplanes.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name aircraft:</label>
                            <input class="form-control" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="code">Code:</label>
                            <input class="form-control" name="code" value="{{ old('code') }}">
                            @if ($errors->has('code'))
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="numbers">Numbers of fly:</label>
                            <input class="form-control" name="numbers" value="{{ old('numbers') }}">
                            @if ($errors->has('numbers'))
                                <span class="text-danger">{{ $errors->first('numbers') }}</span>
                            @endif
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
