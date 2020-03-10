@extends('backend.layout.layout')

@section('title', 'Thêm bài viết')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thêm bài viết</h1>
          @if (session('success'))
          <div class="alert alert-success">
              <strong>{{ session('success') }} </strong>
          </div>
        @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                  <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <p>Tiêu đề</p>
                    <input class="form-control bg-light border-0 small" value="{{$post->title}}" type="text" name="title">
                    {!! showError($errors,'title') !!}
                    <p>Nội dung</p>
                  <textarea rows="5" class="form-control bg-light border-0 small"  type="text" name="content">{{$post->content}}</textarea>
                    {!! showError($errors,'content') !!}
                    <p>Ảnh</p>
                  <img src="../storage/{{$post->image}}" alt="">
                    <input class="form-control bg-light border-0 small" type="file" name="image">
                    {!! showError($errors,'image') !!}
                    <input value="0" type="hidden" name="status">
                    <input type="hidden" name="like" value="0">
                    <p>Chủ đề</p>
                    <select class="form-control bg-light border-0 small" name="category_id" id="">
                      <option disabled>Chọn chủ đề</option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                    <input value="2" type="hidden" name="user_id">
                    <br><br>
                    <button type="submit" class="btn btn-warning btn-icon-split btn-lg">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Sửa</span>
                      </button>
                </form>
                
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
@endsection