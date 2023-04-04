<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('client.findhouse.common.meta')

  @include('client.findhouse.common.css')
  @yield('addCss')

</head>

<body>
  <div class="wrapper">
    <div class="preloader"></div>
    @include('client.findhouse.common.header')

    @include('client.findhouse.common.modal-login')

    @include('client.findhouse.common.nav')

    @yield('content')

    @include('client.findhouse.common.footer')

  </div>

  @include('client.findhouse.common.js')
  @yield('addJs')

</body>

</html>