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

  @include('client.estate3.common.css')
  @yield('addCss')

</head>

<body
  class="home page template-slider style-simple button-flat layout-full-width one-page if-zoom if-border-hide no-content-padding no-shadows header-transparent header-fw sticky-header sticky-tb-color ab-hide subheader-both-center menu-link-color menuo-no-borders mobile-tb-center mobile-side-slide mobile-mini-mr-ll tablet-sticky mobile-header-mini mobile-sticky tr-header tr-content">
  <div id="Wrapper">
    @include('client.estate3.common.header')
    <div id="Content">
      @yield('content')
    </div>
    @include('client.estate3.common.footer')
  </div>
  <div id="Side_slide" class="right dark" data-width="250">
    <div class="close-wrapper">
      <a href="#" class="close"><i class="icon-cancel-fine"></i></a>
    </div>
    <div class="extras">
      <a href="https://1.envato.market/9ZxXY" class="action_button" target="_blank">BUY NOW <i
          class="icon-right-open"></i></a>
      <div class="extras-wrapper"></div>
    </div>
    <div class="menu_wrapper"></div>
    <ul class="social">
      <li class="facebook">
        <a href="#" title="Facebook"><i class="icon-facebook"></i></a>
      </li>
      <li class="youtube">
        <a href="#" title="YouTube"><i class="icon-play"></i></a>
      </li>
      <li class="pinterest">
        <a href="#" title="Pinterest"><i class="icon-pinterest"></i></a>
      </li>
    </ul>
  </div>
  <div id="body_overlay"></div>

  @include('client.estate3.common.js')
  @yield('addJs')

</body>

</html>