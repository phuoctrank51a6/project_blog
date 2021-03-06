@extends('backend.layout.layout')

@section('title', 'Thêm tài khoản')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thêm tài khoản</h1>
          @if (session('success'))
          <div class="alert alert-success">
              <strong>{{ session('success') }} </strong>
          </div>
        @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                  <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p>Tên</p>
                    <input class="form-control bg-light border-0 small" value="{{ old('name') }}" placeholder="Nhập tên của bạn ..." type="text" name="name">
                    {!! showError($errors,'name') !!}
                    <p>email</p>
                    <input class="form-control bg-light border-0 small" value="{{ old('email') }}" placeholder="Nhập tên của bạn ..." type="text" name="email">
                    {!! showError($errors,'email') !!}
                    <p>Ảnh đại diện</p>
                    <input type="file" class="form-control bg-light border-0 small" name="avatar">
                    {!! showError($errors,'avatar') !!}
                    <p>Mật khẩu</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên của bạn ..." type="text" name="password">
                    {!! showError($errors,'password') !!}
                    <p>Nhập lại mật khẩu</p>
                    <input class="form-control bg-light border-0 small" placeholder="Nhập tên của bạn ..." type="text" name="password_confirmation">
                    {!! showError($errors,'password_confirmation') !!}
                    <input value="2" type="hidden" name="role">
                    <input value="0" type="hidden" name="status">
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