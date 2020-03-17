@extends('client.layout.layout')
 @extends('client.layout.menu-left') 
 @section('title','Trang chủ') 
 @section('content')

<div class="col-xl-8 py-5 px-md-5">
    @if (session('success'))
    <div class="alert alert-success">
        <strong>{{ session('success') }} </strong>
    </div>
  @endif
    <div class="row pt-md-4">
        @foreach ($posts as $post)
            <div class="col-md-12">
                <div class="blog-entry ftco-animate d-md-flex">
                    <a href=" {{route('blog').'/detail/'.$post->id}} " class="img img-2" style="background-image: url(../storage/{{$post->image}});"></a>
                    <div class="text text-2 pl-md-4">
                        <h3 class="mb-2"><a href=" {{route('blog').'/detail/'.$post->id}} "> {{$post->title}} </a></h3>
                        <div class="meta-wrap">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i> {{$post->created_at}} </span>
                                <span><a href="single.html"><i class="icon-folder-o mr-2"></i> {{$post->category->name}} </a></span>
                                <span><i class="icon-thumbs-up mr-2"></i>5 Like</span>
                            </p>
                        </div>
                        <p class="mb-4"> {{$post->content}} </p>
                        <p><a href=" {{route('blog').'/detail/'.$post->id}} " class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                    </div>
                </div>
            </div>   
        @endforeach

    </div>
    <!-- END-->
    <div class="row">
        <div class="col">
            <div class="block-27">
                <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endsection @extends('client.layout.menu-right')