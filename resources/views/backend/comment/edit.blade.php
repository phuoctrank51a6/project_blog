@extends('backend.layout.layout')

@section('title', 'Sửa chủ đề')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa bình luận</h1>
        @if (session('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }} </strong>
        </div>
      @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <form action="{{ route('comment.update', [$comment->id]) }}" method="post">
                    @csrf
                    <p>Tiêu đề</p>
                    <input class="form-control bg-light border-0 small" value="{{$comment->title}}" type="text" name="title">
                    {!! showError($errors,'title') !!}
                    <p>Nội dung</p>
                    <textarea class="form-control bg-light border-0 small"  rows="5" name="content">{{$comment->content}}</textarea>
                    {!! showError($errors,'content') !!}
                    <p>Trạng thái</p>
                    <select class="form-control bg-light border-0 small" name="status">
                        <option disabled value="">Chọn trạng thái</option>
                        <option @if ($comment->status == 0) selected @endif value="0">Ẩn</option>
                        <option @if ($comment->status == 1) selected @endif value="1">Hiện</option>
                    </select>
                    <p>Người bình luận</p>
                    <input type="text" name="user_id" value="{{$comment->user_id}}" hidden>
                    <input class="form-control bg-light border-0 small" disabled value="{{$comment->user->name}}" type="text" >
                    <p>Tên bài viết</p>
                    <input type="hidden" name="post_id" value="{{$comment->post_id}}">
                    <input class="form-control bg-light border-0 small" disabled value="{{$comment->post->title}}" type="text">
                    
                    <br><br>
                    {{ method_field('PATCH') }}
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