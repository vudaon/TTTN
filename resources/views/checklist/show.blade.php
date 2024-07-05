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
                    <th scope="col-long">Requirement</th>
                    <th scope="col-long">Method</th>
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
                    <td>
                        <div class="expandable-content">
                            <div class="content-short">{{ Str::limit($category->requirement, 20) }}</div>
                            <div class="content-long">{{ $category->requirement }}</div>
                            <button class="toggle-btn" style="display: none;">▼</button>
                        </div>
                    </td>
                    <td>
                        <div class="expandable-content">
                            <div class="content-short">{{ Str::limit($category->method, 20) }}</div>
                            <div class="content-long">{{ $category->method }}</div>
                            <button class="toggle-btn" style="display: none;">▼</button>
                        </div>
                    </td>
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
@push('js')
    <script>
 document.addEventListener('DOMContentLoaded', function () {
        const expandableContents = document.querySelectorAll('.expandable-content');

        expandableContents.forEach(content => {
            const shortContent = content.querySelector('.content-short');
            const longContent = content.querySelector('.content-long');
            const toggleBtn = content.querySelector('.toggle-btn');

            if (longContent && shortContent) {
                // Chỉ hiển thị nút nếu nội dung dài hơn phiên bản ngắn
                if (longContent.innerText.length > shortContent.innerText.length) {
                    toggleBtn.style.display = 'inline-block';
                }

                toggleBtn.addEventListener('click', function () {
                    content.classList.toggle('expanded');
                    if (content.classList.contains('expanded')) {
                        toggleBtn.innerText = '▲';
                    } else {
                        toggleBtn.innerText = '▼';
                    }
                });
            }
        });
    });
</script>
@endpush()


