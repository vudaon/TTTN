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
            <h1 class="m-0">Edit User Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User Page</li>
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
                <h3>Update account</h3>
                {{-- <form action="/precheck" method="post" --}}
                <form action="/users/{{$users->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <label for="name">Name:</label>
                    <input class="form-control" value="{{old('name',$users->name)}}" name="name">
                     @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <br>
                    <label for="email">Email:</label>
                    <input class="form-control" value="{{old('email',$users->email)}}" name="email">
                     @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                    <br>
                    <label for="password">Password:</label>
                    <input class="form-control" value="{{old('password',$users->password)}}" name="password">
                     @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                    <br>
                    <label for="phone">Phone Number:</label>
                    <input class="form-control" value="{{old('phone',$users->phone_number)}}" name="phone">
                     @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                    <br>
                    <label for="address">Address:</label>
                    <input class="form-control" value="{{$users->address}}" name="address"><br>
                    <label for="gender">Gender:</label>
                    <input class="form-control" value="{{$users->gender}}" name="gender"><br>
                    <button class="btn btn-primary" type="submit">
                        Update
                    </button>
                    
                </form>
                </div>
              <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection

 