@extends('client.findhouse.layout.index')
@section('content')
<!-- Main Blog Post Content -->
<section class="blog_post_container bgc-f7">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
        <div class="breadcrumb_content style2">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active text-thm" aria-current="page">Blogs</li>
          </ol>
          <h2 class="breadcrumb_title">Blog</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div id="data-wrapper" class="row">
          @foreach ($blogs as $item)
          <div class="col-lg-6">
            <div class="for_blog feat_property">
              <a href="{{getNewLink($item)}}" alt="link">
                <div class="thumb">
                  <img class="img-whp" src="{{$item -> thumbnail}}" alt="{{$item -> name}}">
                  @php
                      $tags = $item -> getTags();
                  @endphp
                  @foreach ($tags as $t)
                    <div class="blog_tag">{{$t-> name}}</div>
                  @endforeach

                </div>
              </a>
              <a href="{{getNewLink($item)}}" alt="link">
                <div class="details">
                  <div class="tc_content">
                    <h4>{{$item -> name}}</h4>
                    <ul class="bpg_meta">
                      <li class="list-inline-item"><i class="flaticon-calendar"></i>
                      </li>
                      <li class="list-inline-item">{{date_format(date_create($item -> publish_at), 'M d, Y')}}</li>
                    </ul>
                    <p>{{$item -> description}}</p>
                  </div>
                  <div class="fp_footer">
                    <ul class="fp_meta float-left mb0">
                      <li class="list-inline-item"><img src="{{$item -> user -> avatar}}" width="40px" height="40px" alt="{{$item -> user -> name}}"></li>
                      <li class="list-inline-item">{{$item -> user -> name}}</li>
                    </ul>
                    <span class="fp_pdate float-right text-thm">Read More <span class="flaticon-next"></span></span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          @endforeach

        </div>
        <div class="auto-load text-center">
          <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
            <path fill="#000"
              d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
              <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50"
                to="360 50 50" repeatCount="indefinite" />
            </path>
          </svg>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="terms_condition_widget">
          <h4 class="title">Categories blog</h4>
          <div class="widget_list">
            <ul class="list_details">
              @foreach ($tags as $item )
                <li>
                    <a href="#">
                        <i class="fa fa-caret-right mr10"></i>{{$item -> name}}
                        <span class="float-right">{{$item -> countPost()}} blogs</span>
                     </a>
                </li>
              @endforeach

            </ul>
          </div>
        </div>
        <div class="sidebar_feature_listing">
          <h4 class="title">Latest post</h4>
          @foreach ($latestBlogs as $item)
            <div class="media">
                <img class="align-self-start mr-3" src="{{$item -> thumbnail}}" alt="{{$item -> name}}" width="90px" height="80px">
                <div class="media-body">
                <h5 class="mt-0 post_title">{{$item -> name}}</h5>
                <a href="{{getNewLink($item)}}">Read more</a>
                <ul class="mb0">
                    <li class="list-inline-item"><i class="flaticon-calendar"></i> {{date_format(date_create($item -> publish_at), 'M d, Y')}}</li>
                </ul>
                </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>
</section>

<script>
var ENDPOINT = "{{ url('/') }}";
var page = 1;
$('.auto-load').hide();
$(window).scroll(function() {
  if ($(window).scrollTop() == $(document).height() - $(window).height()) {
    page++;
    infinteLoadMore(page);
  }
});

function infinteLoadMore(page) {
  $.ajax({
      url: ENDPOINT + "/blogs?page=" + page,
      datatype: "html",
      type: "get",
      beforeSend: function() {
        $('.auto-load').show();
      }
    })
    .done(function(response) {
      if (response.length == 0) {
        $('.auto-load').html("We don't have more data to display :(");
        return;
      }
      $('.auto-load').hide();
      $("#data-wrapper").append(response);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
      console.log('Server error occured');
    });
}
</script>

@endsection