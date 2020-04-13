@extends('backend.layout.layout')

@section('title', 'Danh sách bài viết')
@section('content')
@if (session('error'))
  <script>
    alert("{{ session('error') }}")
  </script>
@endif
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách bài viết</h1>
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
                        <th style="width:35%">Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Thích</th>
                        <th style="width:9%">Trạng thái</th>
                        <th>Người đăng</th>
                        <th>Chủ đề</th>
                        <th>
                            <a href="{{ route('post.create') }}" class="btn btn-success btn-icon-split">
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
                        <td> <img src="../storage/{{ $post->image }}" width="100px" alt=""> </td>
                        <td> {{ $post->like }} <i class="fas fa-thumbs-up text-primary"></i> </td>
                        <td> 
                          @if ($post->status == 0)
                          <i class="fas fa-circle text-warning"></i> Chờ duyệt
                          @elseif ($post->status ==1)
                          <i class="fas fa-circle text-success"></i> Hiện thị
                          @elseif ($post->status ==2)
                          <i class="fas fa-circle text-danger"></i> Ẩn
                          @endif  
                        </td>
                        <td> {{ $post->user->name }} </td>
                        <td> {{ $post->category->name }} </td>
                        <td>
                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Sửa</span>
                            </a>
                            <form class="d-inline" action="{{ route('post.destroy', [$post->id]) }}" method="POST">
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
                {!! $posts->links() !!}
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