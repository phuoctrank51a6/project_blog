@extends('backend.layout.layout')

@section('title', 'Danh sách chủ đề')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách chủ đề</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Trạng thái</th>
                        <th>
                            <a href="{{ route('addCategory') }}" class="btn btn-success btn-icon-split">
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
                      @foreach ($categories as $category)
                    <tr>
                        <td> {{ $category->name }} </td>
                        <td> @if ($category->status == 0)
                            Ẩn
                        @elseif ($category->status == 1)
                            Hiển
                        @endif </td>
                        <td>
                            <a href="{{route('listCategory').'/edit/'.$category->id}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Sửa</span>
                            </a>
                            <a onclick="del()" href="{{route('listCategory').'/delete/'.$category->id}}" class="btn btn-danger btn-icon-split">
                              <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                              </span>
                              <span class="text">Xóa</span>
                            </a>
                        </td>
                    </tr>     
                      @endforeach
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
  <script>
    function del() {
      return confirm("Bạn có muốn xóa chủ đề này hay không ?")
    }
  </script>
      
@endsection