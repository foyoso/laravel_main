@extends('client.guesthouse.layout.index')
@section('content')

<div class="sections_group">
  <div class="entry-content">
    <div class="section mcb-section"
      style="padding-top:160px; padding-bottom:50px; background-color:#392c24; background-image:url(images/home_guesthouse_subheader2.jpg); background-repeat:no-repeat; background-position:center top;">
      <div class="section_wrapper mcb-section-inner">
        <div class="wrap mcb-wrap one  column-margin-30px valign-top clearfix">
          <div class="mcb-wrap-inner">
            <div class="column mcb-column one column_column">
              <div class="column_attr clearfix align_center">
                <h1 style="color:#fff">The gallery</h1>
              </div>
            </div>
            <div class="column mcb-column one column_divider">
              <hr class="no_line" style="margin: 0 auto 85px">
            </div>
            <div class="column mcb-column one column_image">
              <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                <div class="image_wrapper">
                  <img class="scale-with-grid" src="/content/{{ $directory }}/images/home_guesthouse_gallery1.jpg"
                    width="1200" height="660" />
                </div>
              </div>
            </div>
            <div class="column mcb-column one-second column_image">
              <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                <div class="image_wrapper">
                  <img class="scale-with-grid" src="/content/{{ $directory }}/images/home_guesthouse_gallery2.jpg"
                    width="780" height="896" />
                </div>
              </div>
            </div>
            <div class="column mcb-column one-second column_image">
              <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                <div class="image_wrapper">
                  <img class="scale-with-grid" src="/content/{{ $directory }}/images/home_guesthouse_gallery3.jpg"
                    width="780" height="896" />
                </div>
              </div>
            </div>
            <div class="column mcb-column one column_image">
              <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                <div class="image_wrapper">
                  <img class="scale-with-grid" src="/content/{{ $directory }}/images/home_guesthouse_gallery4.jpg"
                    width="1200" height="660" />
                </div>
              </div>
            </div>
            <div class="column mcb-column three-fifth column_image">
              <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                <div class="image_wrapper">
                  <img class="scale-with-grid" src="/content/{{ $directory }}/images/home_guesthouse_gallery5.jpg"
                    width="780" height="742" />
                </div>
              </div>
            </div>
            <div class="column mcb-column two-fifth column_image">
              <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                <div class="image_wrapper">
                  <img class="scale-with-grid" src="/content/{{ $directory }}/images/home_guesthouse_gallery6.jpg"
                    width="780" height="1135" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection