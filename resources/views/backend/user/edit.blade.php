@extends('backend.layout.layout')

@section('title', 'Sửa tài khoản')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa tài khoản <b class="text-danger">{{$user->name}}</b> </h1>
        @if (session('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }} </strong>
        </div>
      @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <form action="{{route('user.update', $user->id)}}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <p>Tên</p>
                    <input class="form-control bg-light border-0 small" value="{{$user->name}}" type="text" name="name">
                    <p>email</p>
                    <input class="form-control bg-light border-0 small" value="{{$user->email}}" type="text" name="email">
                    <p>Ảnh đại diện</p>
                    <img src="../storage/{{$user->avatar}}" height="200px" alt="">
                    <input class="form-control bg-light border-0 small" value="{{$user->avatar}}" type="file" name="avatar">
                    <p>Mật khẩu</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên của bạn ..." type="text" name="password">
                    <p>Nhập lại mật khẩu</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên của bạn ..." type="text" name="repassword">
                    <p>loại tài khoản</p>
                    <select class="form-control bg-light border-0 small" name="role">
                        <option disabled value="">Chọn loại tài khoản</option>
                        <option @if ($user->role == 1) selected @endif value="1">Admin</option>
                        <option @if ($user->role == 2) selected @endif value="2">User</option>
                    </select>
                    <p>Trạng thái</p>
                    <select class="form-control bg-light border-0 small" name="status">
                        <option disabled value="">Chọn trang thái</option>
                        <option @if ($user->status == 0) selected @endif value="0">Chưa kích hoạt</option>
                        <option @if ($user->status == 1) selected @endif value="1">Hoạt động</option>
                        <option @if ($user->status == 2) selected @endif value="2">Khóa</option>
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