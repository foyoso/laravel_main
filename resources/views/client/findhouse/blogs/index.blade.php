@extends('client.findhouse.layout.index')
@section('content')
<!-- Main Blog Post Content -->
<section class="blog_post_container bgc-f7">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
        <div class="breadcrumb_content style2">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-thm" aria-current="page">Simple Listing – Grid View</li>
          </ol>
          <h2 class="breadcrumb_title">Blog</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div id="data-wrapper" class="row">
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
        <div class="sidebar_search_widget">
          <div class="blog_search_widget">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search Here" aria-label="Recipient's username"
                aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span
                    class="flaticon-magnifying-glass"></span></button>
              </div>
            </div>
          </div>
        </div>
        <div class="terms_condition_widget">
          <h4 class="title">Categories Property</h4>
          <div class="widget_list">
            <ul class="list_details">
              <li><a href="#"><i class="fa fa-caret-right mr10"></i>Apartment <span class="float-right">6
                    properties</span></a></li>
              <li><a href="#"><i class="fa fa-caret-right mr10"></i>Condo <span class="float-right">12
                    properties</span></a></li>
              <li><a href="#"><i class="fa fa-caret-right mr10"></i>Family House <span class="float-right">8
                    properties</span></a></li>
              <li><a href="#"><i class="fa fa-caret-right mr10"></i>Modern Villa <span class="float-right">26
                    properties</span></a></li>
              <li><a href="#"><i class="fa fa-caret-right mr10"></i>Town House <span class="float-right">89
                    properties</span></a></li>
            </ul>
          </div>
        </div>
        <div class="sidebar_feature_listing">
          <h4 class="title">Featured Listings</h4>
          <div class="media">
            <img class="align-self-start mr-3" src="/client/findhouse/images/blog/fls1.jpg" alt="fls1.jpg">
            <div class="media-body">
              <h5 class="mt-0 post_title">Nice Room With View</h5>
              <a href="#">$13,000/<small>/mo</small></a>
              <ul class="mb0">
                <li class="list-inline-item">Beds: 4</li>
                <li class="list-inline-item">Baths: 2</li>
                <li class="list-inline-item">Sq Ft: 5280</li>
              </ul>
            </div>
          </div>
          <div class="media">
            <img class="align-self-start mr-3" src="/client/findhouse/images/blog/fls2.jpg" alt="fls2.jpg">
            <div class="media-body">
              <h5 class="mt-0 post_title">Villa called Archangel</h5>
              <a href="#">$13,000<small>/mo</small></a>
              <ul class="mb0">
                <li class="list-inline-item">Beds: 4</li>
                <li class="list-inline-item">Baths: 2</li>
                <li class="list-inline-item">Sq Ft: 5280</li>
              </ul>
            </div>
          </div>
          <div class="media">
            <img class="align-self-start mr-3" src="/client/findhouse/images/blog/fls3.jpg" alt="fls3.jpg">
            <div class="media-body">
              <h5 class="mt-0 post_title">Sunset Studio</h5>
              <a href="#">$13,000<small>/mo</small></a>
              <ul class="mb0">
                <li class="list-inline-item">Beds: 4</li>
                <li class="list-inline-item">Baths: 2</li>
                <li class="list-inline-item">Sq Ft: 5280</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="blog_tag_widget">
          <h4 class="title">Tags</h4>
          <ul class="tag_list">
            <li class="list-inline-item"><a href="#">Apartment</a></li>
            <li class="list-inline-item"><a href="#">Real Estate</a></li>
            <li class="list-inline-item"><a href="#">Estate</a></li>
            <li class="list-inline-item"><a href="#">Luxury</a></li>
            <li class="list-inline-item"><a href="#">Real</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
var ENDPOINT = "{{ url('/') }}";
var page = 1;
infinteLoadMore(page);
$(window).scroll(function() {
  if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
    page++;
    infinteLoadMore(page);
  }
});

function infinteLoadMore(page) {
  $.ajax({
      url: ENDPOINT + "/blog?page=" + page,
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