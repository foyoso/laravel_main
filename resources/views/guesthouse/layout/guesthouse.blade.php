<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <title>Be</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Favicons -->
  <link rel="shortcut icon" href="content/guesthouse/images/favicon.ico">

  @include('guesthouse.common.css')
  @yield('addCss')

</head>

<body
  class="home layout-full-width button-flat if-zoom no-content-padding header-plain minimalist-header-no sticky-header sticky-tb-color ab-hide subheader-both-center menu-link-color menuo-right footer-copy-center mobile-tb-center mobile-side-slide mobile-mini-mr-ll">
  <div id="Wrapper">
    @include('guesthouse.common.header')
    <div id="Content">
      <div class="content_wrapper clearfix">
        @yield('content')
      </div>
    </div>
    @include('guesthouse.common.footer')
  </div>

  <!-- Side Menu -->
  <div id="Side_slide" class="right dark">
    <div class="close-wrapper">
      <a href="#" class="close"><i class="icon-cancel-fine"></i></a>
    </div>
    <div class="extras">
      <div class="extras-wrapper"></div>
    </div>

    <div class="menu_wrapper"></div>

  </div>
  <div id="body_overlay"></div>

  @include('guesthouse.common.js')
  @yield('addJs')

</body>

</html>