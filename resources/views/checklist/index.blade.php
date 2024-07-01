@extends('layouts.app')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')
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
@endsection
