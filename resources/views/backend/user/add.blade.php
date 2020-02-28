@extends('backend.layout.layout')

@section('title', 'Thêm tài khoản')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thêm tài khoản</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                  <form action="{{ route('saveadduser') }}" method="post">
                    @csrf
                    <p>Tên</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên của bạn ..." type="text" name="name">
                    <p>email</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên của bạn ..." type="text" name="email">
                    <p>Ảnh đại diện</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên của bạn ..." type="file" name="avatar">
                    <p>Mật khẩu</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên của bạn ..." type="text" name="password">
                    <p>Nhập lại mật khẩu</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên của bạn ..." type="text" name="repassword">
                    <input value="2" type="text" name="role">
                    <input value="0" type="text" name="status">
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