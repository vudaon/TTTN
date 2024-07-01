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
            <h1 class="m-0">{{ ucfirst($type) }} Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ ucfirst($type) }} Categories</li>
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
              @if($type == 'before')
                  <a href="{{route('checklist.export',$checklist->id)}}?type=before">Export before file</a>
              @else
                  <a href="{{route('checklist.export',$checklist->id)}}?type=after">Export after file</a>
              @endif
               <a href="{{ $type == 'after' ? route('checklist.edit.after', $checklist->id) : route('checklist.edit.before', $checklist->id) }}" class="btn-btn-success float-right m-2">
                    Edit {{ $type == 'after' ? 'after' : 'before' }}
               </a>
            </div>
            <div class="col-sm-12">
            <table class="table">
                 <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Requirement</th>
                    <th scope="col">Method</th>
                    <th scope="col">Result</th>
                    <th scope="col">Evaluation</th>
                    <th scope="col">Note</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($categories as $category)
                    <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->requirement }}</td>
                    <td>{{ $category->method }}</td>
                    <td>{{ $category->result }}</td>
                    <td>{{ $category->evaluation }}</td>
                    <td>{{ $category->note }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
              <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
 
@endsection



