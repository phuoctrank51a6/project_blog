@section('menu-right')

<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">


  @if (Auth::User())
    <a  href="" class="h5 text-primary">Hello, {{Auth::User()->name}}</a> || <a class="text-danger" href="/admin/logout">Đăng xuất</a>
  @else
    <a class="h5 text-danger" href="../admin/login">Đăng nhập</a>
  @endif
    <div class="sidebar-box pt-md-4">
      <form action="#" class="search-form">
        <div class="form-group">
          <span class="icon icon-search"></span>
          <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
        </div>
      </form>
    </div>
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Chủ đề</h3>
      <ul class="categories">
        @foreach ($categories as $category)
          <li><a href="#"> {{$category->name}} <span>(6)</span></a></li>
        @endforeach
      </ul>
    </div>

    <div class="sidebar-box ftco-animate">
      <h3 class="sidebar-heading">Bài viết nổi bật</h3>
      @foreach ($limitPosts as $item)
        <div class="block-21 mb-4 d-flex">
          <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
          <div class="text">
            <h3 class="heading"><a href="#"> {{$item->title}} </a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> {{$item->create_at}} </a></div>
              <div><a href="#"><span class="icon-person"></span> {{$item->user->name}} </a></div>
              <div><a href="#"><span class="icon-chat"></span> {{$item->like}} </a></div>
            </div>
          </div>
        </div>
          
      @endforeach
    {{-- </div>

                <div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">
                    <div class="overlay"></div>
                    <h3 class="mb-4 sidebar-heading">Newsletter</h3>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
      <form action="#" class="subscribe-form">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Email Address">
          <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
        </div>
      </form>
    </div>
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Archives</h3>
      <ul class="categories">
          <li><a href="#">Decob14 2018 <span>(10)</span></a></li>
        <li><a href="#">September 2018 <span>(6)</span></a></li>
        <li><a href="#">August 2018 <span>(8)</span></a></li>
        <li><a href="#">July 2018 <span>(2)</span></a></li>
        <li><a href="#">June 2018 <span>(7)</span></a></li>
        <li><a href="#">May 2018 <span>(5)</span></a></li>
      </ul>
    </div> 
    <div class="sidebar-box ftco-animate">
      <h3 class="sidebar-heading">Paragraph</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
    </div>--}}
  </div><!-- END COL -->

  
  @if (session('thongbao'))
  <script>
      alert("{{ session('thongbao') }}");
    </script>
  @endif
  
@endsection
