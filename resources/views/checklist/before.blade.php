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
            <h1 class="m-0">Edit Before Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Before Categories</li>
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
                <a href="{{route('checklist.show',$id)}}?type=before" class="btn btn-light">Back</a>
            </div>
            <div class="col-sm-12">
                <form action="{{route('checklist.update.before',$id)}}" method="POST">
                @csrf
                @method('PUT')
                        <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Requirement</th>
                        <th>Method</th>
                        <th>Result</th>
                        <th>Evaluation</th>
                        <th>Note</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($befores as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td><input type="text" name="categories[{{ $category->id }}][requirement]" class="form-control" value="{{ $category->requirement }}"></td>
                            <td><input type="text" name="categories[{{ $category->id }}][method]" class="form-control" value="{{ $category->method }}"></td>
                            <td><input type="text" name="categories[{{ $category->id }}][result]" class="form-control" value="{{ $category->result }}"></td>
                            <td><input type="text" name="categories[{{ $category->id }}][evaluation]" class="form-control" value="{{ $category->evaluation }}"></td>
                            <td><input type="text" name="categories[{{ $category->id }}][note]" class="form-control" value="{{ $category->note }}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                <button type="submit" class="btn btn-primary">Update Before Categories</button>
                </form>
            </div>
              <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection

    <!-- Form để cập nhật danh mục sau -->
   