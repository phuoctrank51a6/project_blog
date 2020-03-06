@extends('backend.layout.layout')

@section('title', 'Thêm chủ đề')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thêm chủ đề</h1>
          @if (session('success'))
          <div class="alert alert-success">
              <strong>{{ session('success') }} </strong>
          </div>
        @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                  <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <p>Tên</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên chủ đề ..." type="text" name="name">
                    <p>Trạng thái</p>
                    <select class="form-control bg-light border-0 small" name="status">
                        <option disabled value="">Chọn trạng thái</option>
                        <option selected value="0">Ẩn</option>
                        <option value="1">Hiện</option>
                    </select>
                    <br><br>
                    <button type="submit" class="btn btn-success btn-icon-split btn-lg">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Thêm</span>
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