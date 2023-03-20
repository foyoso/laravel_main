<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords"
    content="advanced custom search, agency, agent, business, clean, corporate, directory, google maps, homes, idx agent, listing properties, membership packages, property, real broker, real estate, real estate agent, real estate agency, realtor">
  <meta name="description" content="FindHouse - Real Estate HTML Template">
  <meta name="CreativeLayers" content="ATFN">
  <!-- Title -->
  <title>FindHouse - Real Estate HTML Template</title>
  <!-- Favicon -->
  <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
  <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />

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

  </div>

  @include('client.findhouse.common.js')
  @yield('addJs')

</body>

</html>