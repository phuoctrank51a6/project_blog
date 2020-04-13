@extends('client.layout.layout')
 @extends('client.layout.menu-left') 
 @section('title','Thêm bài viết') 
 @section('content')

 <div class="row-12">
     
    <h2 class="text-primary">Thêm bài viết</h2>
    @if (session('success'))
    <div class="alert alert-success">
        <strong>{{ session('success') }} </strong>
    </div>
  @endif
    <div class="col-lg-12 d-flex">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <p>Tiêu đề</p>
          <input class="form-control bg-light border-0 small" placeholder="Nhập tiêu đề của bạn ..." type="text" name="title">
          {!! showError($errors,'title') !!}
          <p>Nội dung</p>
          <textarea rows="5" class="form-control bg-light border-0 small" placeholder="Nhập nội dung của bạn ..." type="text" name="content"></textarea>
          {!! showError($errors,'content') !!}
          <p>Ảnh</p>
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
            <input value="{{Auth::User()->id}}" type="hidden" name="user_id">
          <br><br>
          <button type="submit" class="btn btn-success btn-icon-split btn-lg">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Thêm</span>
            </button>
      </form>
    
    </div>
    <!-- END-->
    @endsection @extends('client.layout.menu-right')