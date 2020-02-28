@extends('backend.layout.layout')

@section('title', 'Sửa bài viết')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa bài viết</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <form action="{{route('listPost').'/save-edit/'.$post->id}}" method="post">
                    @csrf
                    <p>Tiêu đề</p>
                    <input class="form-control bg-light border-0 small" value="{{$post->title}}" type="text" name="title">
                    <p>Nội dung</p>
                    <textarea rows="5" class="form-control bg-light border-0 small" type="text" name="content">{{$post->content}}</textarea>
                    <p>Ảnh</p>
                    <input class="form-control bg-light border-0 small" value="{{$post->image}}" type="file" name="image">
                    <p>Trạng thái</p>
                    <select class="form-control bg-light border-0 small" name="status">
                      <option disabled>Chọn trạng  thái</option>
                    <option selected @if ($post->status==0) selected @endif value="0">Ẩn</option>
                    <option selected @if ($post->status==1) selected @endif value="1">Hiện</option>
                    </select>
                    <p>Chủ đề</p>
                    <select class="form-control bg-light border-0 small" name="category_id" id="">
                      <option disabled>Chọn chủ đề</option>
                      @foreach ($categories as $category)
                        <option @if ($post->status==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                    <input value="2" type="text" name="user_id">
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