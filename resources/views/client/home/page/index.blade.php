@extends('client.home.layout.index')
@section('content')

<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
  <div class="container custom-container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="breadcrumb__wrap__content">
          <h2 class="title">{{$data -> title}}</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$data -> name}}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcrumb__wrap__icon">
    <ul>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon01.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon02.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon03.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon04.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon05.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon06.png" alt=""></li>
    </ul>
  </div>
</section>
<!-- breadcrumb-area-end -->

<!-- about-area -->

<!-- about-area-end -->

<!-- services-area -->
<section class="services__style__two">
  <div class="container">
      {!!$data -> html_content!!}
  </div>
</section>
<!-- services-area-end -->
@php
    $blogsService = new App\Http\Services\PostService();
    $blogs = $blogsService -> getByIdsOrderById($website -> home_posts);
@endphp


<!-- blog-area -->
<section class="blog blog__style__two">
  <div class="container">
    <div class="row gx-0 justify-content-center">
      @foreach ($blogs as $item )
        <div class="col-lg-4 col-md-6 col-sm-9">
          <div class="blog__post__item">
            <div class="blog__post__thumb">
              <a href="{{getNewLink($item)}}"><img src="{{$item -> thumbnail}}" alt="{{$item -> name}}" ></a>
              <div class="blog__post__tags">
                <a href="{{getNewLink($item)}}">{{$item -> name}}</a>
              </div>
            </div>
            <div class="blog__post__content">
              <span class="date">{{date_format(date_create($item -> publish_at), 'M d, Y')}}</span>
              <h3 class="title"><a href="{{getNewLink($item)}}">{{$item -> description}}</a></h3>
              <a href="{{getNewLink($item)}}" class="read__more">Read more</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="blog__button text-center">
      <a href="/blogs" class="btn">More blog</a>
    </div>
  </div>
</section>
<!-- blog-area-end -->
@include('client.home.common.contact-question')


@endsection