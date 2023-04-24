<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Rasalina - Personal Portfolio HTML Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/x-icon" href="/client/home/assets/img/favicon.png">
  <!-- Place favicon.ico in the root directory -->
  @include('client.home.common.css')

</head>

<body>

  <!-- preloader-start -->
  <div id="preloader">
    <div class="rasalina-spin-box"></div>
  </div>
  <!-- preloader-end -->

  <!-- Scroll-top -->
  <button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
  </button>
  <!-- Scroll-top-end-->

  @include('client.home.common.header')

  <!-- main-area -->
  <main>

    @yield('content')

  </main>
  <!-- main-area-end -->

  @include('client.home.common.footer')

  @include('client.home.common.js')
</body>

</html>