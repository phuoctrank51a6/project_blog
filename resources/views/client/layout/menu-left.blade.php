@section('menu-left')
<aside id="colorlib-aside" role="complementary" class="js-fullheight">
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            <li class="colorlib-active"><a href="/">Trang chủ</a></li>
            <li><a href="fashion.html">Chủ đề</a></li>
            <li><a href="{{'/my-blog/'.Auth::User()->id}}">My blog</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>

    <div class="colorlib-footer">
        <h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Cream <span>Blog</span></a></h1>
    <div class="form-group d-flex">
        </div>
        <p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
    </div>
</aside> <!-- END COLORLIB-ASIDE -->
@endsection