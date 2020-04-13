@extends('client.layout.layout')
 @extends('client.layout.menu-left') 
 @section('title',"Bài viết") 
 @section('content')
	    			<div class="col-lg-8 px-md-5 py-5">
	    				<div class="row pt-md-4">
	    					<h1 class="mb-3"> {{$post->title}} </h1>
		            <p> {{$post->content}} </p>
		            <div>
		              <img width="100%" src="../storage/{{$post->image}}" alt="" class="img-fluid">
					</div>
					
						@if ( Auth::User() && $post->user_id === Auth::User()->id)
						
						<form class="d-inline" action="{{ route('destroyBlog', [$post->id]) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-danger btn-icon-split" onclick="return del()">
							  <span class="icon text-white-50">
								<i class="fas fa-trash"></i>
							  </span>
							  Xóa
							</button>
					</form>
						@endif
					<div class="row my-2">
						<div class="col-12 about-author d-flex p-4 bg-light" style="width:720px">
							<div class="bio mr-12">
								<img width="100px" src="../storage/{{$post->user->avatar}}" alt="Image placeholder" class="img-fluid">
							</div>

							<div class="">
								<h3>{{$post->user->name}}</h3>
								<p> @if ($post->role == config('common.role.admin'))
									Người kiểm duyệt
									@else Cộng tác viên
								@endif </p>
							</div>
						</div>
					</div>


		            <div class="pt-5 mt-5">
					  <h3 class="mb-5 font-weight-bold">Comments</h3>
					  @if (count($comments) == 0)
						<div class="alert alert-warning" role="alert">
							Chưa có bình luận, hãy là người bình luận đầu tiên cho bài viết này
						</div>
				  	@endif
		              <ul class="comment-list">
                          @foreach ($comments as $comment)
                            <li class="comment">
                            <div class="vcard bio">
                                <a title="{{$comment->user->name}}">
                                    <img src="../storage/{{$comment->user->avatar}}" alt="Image placeholder">
                                </a>
                            </div>
                            <div class="comment-body">
                                <h3> {{$comment->title}} </h3>
                                <div class="meta"> {{$comment->created_at}} </div>
                                <p> {{$comment->content}} </p>
                                {{-- <a><a href="#" class="reply">Reply</a></a> --}}
                            </div>
                            </li>
                          @endforeach

		                {{-- <li class="comment">
		                  <div class="vcard bio">
		                    <img src="images/person_1.jpg" alt="Image placeholder">
		                  </div>
		                  <div class="comment-body">
		                    <h3>John Doe</h3>
		                    <div class="meta">October 03, 2018 at 2:21pm</div>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                    <p><a href="#" class="reply">Reply</a></p>
		                  </div>

		                  <ul class="children">
		                    <li class="comment">
		                      <div class="vcard bio">
		                        <img src="images/person_1.jpg" alt="Image placeholder">
		                      </div>
		                      <div class="comment-body">
		                        <h3>John Doe</h3>
		                        <div class="meta">October 03, 2018 at 2:21pm</div>
		                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                        <p><a href="#" class="reply">Reply</a></p>
		                      </div>


		                      <ul class="children">
		                        <li class="comment">
		                          <div class="vcard bio">
		                            <img src="images/person_1.jpg" alt="Image placeholder">
		                          </div>
		                          <div class="comment-body">
		                            <h3>John Doe</h3>
		                            <div class="meta">October 03, 2018 at 2:21pm</div>
		                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                            <p><a href="#" class="reply">Reply</a></p>
		                          </div>

		                            <ul class="children">
		                              <li class="comment">
		                                <div class="vcard bio">
		                                  <img src="images/person_1.jpg" alt="Image placeholder">
		                                </div>
		                                <div class="comment-body">
		                                  <h3>John Doe</h3>
		                                  <div class="meta">October 03, 2018 at 2:21pm</div>
		                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                                  <p><a href="#" class="reply">Reply</a></p>
		                                </div>
		                              </li>
		                            </ul>
		                        </li>
		                      </ul>
		                    </li>
		                  </ul>
		                </li> --}}

		                {{-- <li class="comment">
		                  <div class="vcard bio">
		                    <img src="images/person_1.jpg" alt="Image placeholder">
		                  </div>
		                  <div class="comment-body">
		                    <h3>John Doe</h3>
		                    <div class="meta">October 03, 2018 at 2:21pm</div>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                    <p><a href="#" class="reply">Reply</a></p>
		                  </div>
		                </li> --}}
		              </ul>
		              <!-- END comment-list -->
		              
		              <div class="comment-form-wrap pt-5">
		                <h3 class="mb-5">Bình luận</h3>
                        <form action="{{route('blog')}}/comment" class="p-3 p-md-5 bg-light">
                            @if (session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }} </strong>
                            </div>
                          @endif
                            {{ csrf_field() }}
		                  <div class="form-group">
		                    <label for="website">Tiêu đề</label>
                            {!! showError($errors,'title') !!}
		                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
		                  </div>

		                  <div class="form-group">
		                    <label for="message">Nội dung</label>
                            {!! showError($errors,'content') !!}
		                    <textarea name="content" cols="30" rows="10" class="form-control" value="{{ old('content') }}"></textarea>
						  </div>
		                  <div class="form-group">
                            <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            @if (Auth::User())
                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                            @endif
		                  </div>

		                </form>
		              </div>
		            </div>
                        </div>
						<!-- END-->
            
  <script>
    function del() {
      return confirm("Bạn có muốn xóa bài viết này hay không ?")
    }
  </script>
    @endsection @extends('client.layout.menu-right')