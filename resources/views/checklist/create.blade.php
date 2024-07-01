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
            <h1 class="m-0">Create Check List Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Check List Page</li>
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
                  <form action="{{ route('checklist.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div>
                          <label for="flytimes">Fly time:</label>
                          <input class="form-control" name="flytimes" value="{{ old('flytimes') }}">
                          @if ($errors->has('flytimes'))
                              <span class="text-danger">{{ $errors->first('flytimes') }}</span>
                          @endif
                      </div>
                      <br>

                      <div>
                          <label for="time">Time:</label>
                          <input type="datetime-local" class="form-control" name="time" value="{{ old('time') }}">
                          @if ($errors->has('time'))
                              <span class="text-danger">{{ $errors->first('time') }}</span>
                          @endif
                      </div>
                      <br>

                      <div>
                          <label for="airplane_id">Choose airplane check:</label>
                          <select class="form-select" aria-label="Default select example" name="airplane_id">
                              @foreach ($airplanes as $airplane)
                                  <option value="{{ $airplane->id }}" {{ old('airplane_id') == $airplane->id ? 'selected' : '' }}>
                                      {{ $airplane->name }}
                                  </option>    
                              @endforeach                                
                          </select>
                          @if ($errors->has('airplane_id'))
                              <span class="text-danger">{{ $errors->first('airplane_id') }}</span>
                          @endif
                      </div>
                      <br>
                      <button class="btn btn-primary" type="submit">
                          Submit
                      </button>
                  </form>
              </div>
             </div>
      </div>
    </div>

@endsection

 