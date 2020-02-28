@extends('backend.layout.layout')

@section('title', 'Sửa chủ đề')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa chủ đề <b class="text-danger">{{$category->name}}</b> </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <form action="{{route('listCategory').'/save-edit/'.$category->id}}" method="post">
                    @csrf
                    <p>Tên</p>
                    <input class="form-control bg-light border-0 small" value="{{$category->name}}" type="text" name="name">
                    <p>Trạng thái</p>
                    <select class="form-control bg-light border-0 small" name="status">
                        <option disabled value="">Chọn trạng thái</option>
                        <option @if ($category->status == 0) selected @endif value="0">Ẩn</option>
                        <option @if ($category->status == 1) selected @endif value="1">Hiện</option>
                    </select>
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