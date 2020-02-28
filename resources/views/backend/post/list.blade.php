@extends('backend.layout.layout')

@section('title', 'Danh sách bài viết')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách bài viết</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Thích</th>
                        <th style="width:9%">Trạng thái</th>
                        <th>Người đăng</th>
                        <th>Chủ đề</th>
                        <th>
                            <a href="{{ route('addPost') }}" class="btn btn-success btn-icon-split">
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
                      @foreach ($posts as $post)
                    <tr>
                        <td> {{ $post->title }} </td>
                        <td> <img src="{{ $post->image }}" width="100px" alt=""> </td>
                        <td> {{ $post->like }} <i class="fas fa-thumbs-up text-primary"></i> </td>
                        <td> 
                          @if ($post->status == 0)
                              <div class=" p-12 mb-6 bg-warning text-white">Chờ duyệt</div>
                          @elseif ($post->status ==1)
                            <div class="p-12 mb-6 bg-success text-white">Hiện thị</div>
                          @elseif ($post->status ==2)
                          <div class="p-12 mb-6 bg-danger text-white">Ẩn</div>
                          @endif  
                        </td>
                        <td> {{ $post->user->name }} </td>
                        <td> {{ $post->category->name }} </td>
                        <td>
                            <a href="{{route('listPost').'/edit/'.$post->id}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Sửa</span>
                            </a>
                            <a onclick="del()" href="{{route('listPost').'/delete/'.$post->id}}" class="btn btn-danger btn-icon-split">
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
      return confirm("Bạn có muốn xóa bài viết này hay không ?")
    }
  </script>
      
@endsection