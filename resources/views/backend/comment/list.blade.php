@extends('backend.layout.layout')

@section('title', 'Danh sách bình luận')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách bình luận</h1>
          
          @if (session('success'))
          <div class="alert alert-danger">
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
                        <th>Tiêu đề</th>
                        <th>Nội dung bình luận</th>
                        {{-- <th>Tiêu đề bài viết</th> --}}
                        <th>Người bình luận</th>
                        <th>Trạng thái</th>
                        <th>
                        </th>
                    </tr>
                  </thead>
                  <tfoot>
                  </tfoot>
                  <tbody>
                      @foreach ($comments as $comment)
                    <tr>
                        <td> {{ $comment->title }} </td>
                        <td> {{ $comment->content }} </td>
                        {{-- <td> {{ $comment->post->title }} </td> --}}
                        <td>{{$comment->user->name}}</td>
                        <td> @if ($comment->status==0)
                          <i class="fas fa-circle text-warning"></i> Chờ duyệt
                        @elseif($comment->status==1)
                        <i class="fas fa-circle text-success"></i> Đã duyệt
                        @elseif($comment->status==2)
                        <i class="fas fa-circle text-danger"></i> Không duyệt
                        @endif </td>
                        <td>
                            <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Sửa</span>
                            </a> 
                            <form class="d-inline" action="{{ route('comment.destroy', [$comment->id]) }}" method="POST">
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
                {!! $comments->links() !!}
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
  <script>
    function del() {
      return confirm("Bạn có muốn xóa bình luận này hay không ?")
    }
  </script>
      
@endsection