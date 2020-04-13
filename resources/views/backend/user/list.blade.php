@extends('backend.layout.layout')

@section('title', 'Danh sách người dùng')
@section('content')

@if (session('error'))
  <script>
    alert("{{ session('error') }}")
  </script>
@endif
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách người dùng</h1>
          @if (session('success'))
          <div class="alert alert-success">
              <strong>{{ session('success') }} </strong>
          </div>
        @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Hình đại diện</th>
                        <th>Trạng thái</th>
                        <th>Admin/User</th>
                        <th>
                            <a href="{{ route('user.create') }}" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                              </span>
                              <span class="text">Thêm</span>
                            </a>
                        </th>
                    </tr>
                  </thead>
                  <tfoot>
                  </tfoot>
                  <tbody>
                      @foreach ($users as $user)
                    <tr>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td>
                           <img src="../storage/{{ $user->avatar }}" height="90px" alt=""> 
                          </td>
                        <td> @if ($user->status == 0)
                            <b class="text-warning">Chưa kích hoạt</b>
                            @elseif($user->status == 1)
                            <b class="text-success">Hoạt động</b>
                            @elseif($user->status == 2)
                            <b size="10" class="text-danger">Khóa</b>
                        @endif </td>
                        <td>
                             @if ($user->role==1)
                                Admin
                            @elseif($user->role==2)
                                User
                            @endif 
                        </td>
                        <td>
                            <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Sửa</span>
                            </a>
                            <form class="d-inline" action="{{ route('user.destroy', [$user->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger btn-icon-split" onclick="return del()">
                                      <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                      </span>
                                      Xóa
                                    </button>
                            </form>
                        </td>
                    </tr>
                      @endforeach
                  </tbody>
                </table>
                {!! $users->links() !!}
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
  <script>
    function del() {
      return confirm("Bạn có muốn xóa tài khoản này hay không ?")
    }
  </script>
      
@endsection