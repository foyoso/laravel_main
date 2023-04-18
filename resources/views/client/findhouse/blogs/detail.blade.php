@extends('client.findhouse.layout.index')
@section('content')

<!-- Blog Single Post -->
<section class="blog_post_container bgc-f7 pb30">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
        <div class="breadcrumb_content style2">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/blog">News</a></li>
            <li class="breadcrumb-item active text-thm" aria-current="page">{{$data->name}}</li>
          </ol>
          <h2 class="breadcrumb_title">{{$data->name}}</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="main_blog_post_content">
          <div class="mbp_thumb_post">
            @php
              $tags = $data -> getTags();
            @endphp
            @foreach ($tags as $t)

              <div class="blog_sp_tag">
                <a href="/tags/{{$t -> slug}}"><i class="fa fa-hashtag"></i> {{$t-> name}}</a>
              </div>
            @endforeach

            <!-- <h3 class="blog_sp_title">{{$data->name}}</h3> -->
            <ul class="blog_sp_post_meta">
              <li class="list-inline-item"><a href="#"><img src="{{$data -> user -> avatar}}" width="40px" height="40px" alt="{{$data -> user -> name}}"></a>
              </li>
              <li class="list-inline-item"><a href="#">{{$data -> user -> name}}</a></li>
              <li class="list-inline-item"><span class="flaticon-calendar"></span></li>
              <li class="list-inline-item"><a href="#">{{date_format(date_create($data -> publish_at), 'M d, Y')}}</a></li>
              <li class="list-inline-item d-none"><span class="flaticon-view"></span></li>
              <li class="list-inline-item d-none"><a href="#"> 341 views</a></li>
              <li class="list-inline-item d-none"><span class="flaticon-chat"></span></li>
              <li class="list-inline-item d-none"><a href="#">15</a></li>
            </ul>
            <div class="thumb">
              <img class="img-fluid" src="{{$data -> thumbnail}}" alt="{{$data -> name}}">
            </div>
            <div class="details">
              {!!$data -> content!!}
            </div>

          </div>



        </div>
        <div class="row">
          <div class="col-lg-12 mb10 mt20">
            <h4>Related Posts</h4>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="for_blog feat_property">
              <div class="thumb">
                <img class="img-whp" src="/client/findhouse/images/blog/1.jpg" alt="1.jpg">
                <div class="tag">Construction</div>
              </div>
              <div class="details">
                <div class="tc_content">
                  <h4>Redfin Ranks the Most Competitive Neighborhoods of 2020</h4>
                  <ul class="bpg_meta">
                    <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
                    <li class="list-inline-item"><a href="#">January 16, 2020</a></li>
                  </ul>
                  <p>Lorem ipsum dolor sit amet, consectetur text link libero tempus congue.</p>
                </div>
                <div class="fp_footer">
                  <ul class="fp_meta float-left mb0">
                    <li class="list-inline-item"><a href="#"><img src="/client/findhouse/images/property/pposter1.png"
                          alt="pposter1.png"></a></li>
                    <li class="list-inline-item"><a href="#">Ali Tufan</a></li>
                  </ul>
                  <a class="fp_pdate float-right text-thm" href="#">Read More <span class="flaticon-next"></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="for_blog feat_property">
              <div class="thumb">
                <img class="img-whp" src="/client/findhouse/images/blog/2.jpg" alt="2.jpg">
                <div class="tag">Construction</div>
              </div>
              <div class="details">
                <div class="tc_content">
                  <h4>Housing Markets That Changed the Most This Decade</h4>
                  <ul class="bpg_meta">
                    <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
                    <li class="list-inline-item"><a href="#">January 16, 2020</a></li>
                  </ul>
                  <p>Lorem ipsum dolor sit amet, consectetur text link libero tempus congue.</p>
                </div>
                <div class="fp_footer">
                  <ul class="fp_meta float-left mb0">
                    <li class="list-inline-item"><a href="#"><img src="/client/findhouse/images/property/pposter1.png"
                          alt="pposter1.png"></a></li>
                    <li class="list-inline-item"><a href="#">Ali Tufan</a></li>
                  </ul>
                  <a class="fp_pdate float-right text-thm" href="#">Read More <span class="flaticon-next"></span></a>
                </div>
              </div>
            </div>
          </div>
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


@endsection
@section('addJs')
<style>
.blog_sp_tag{
    display: inline-block;
    padding-left: 3px;
    padding-right: 4px;
    width: auto;
}
</style>
@endsection