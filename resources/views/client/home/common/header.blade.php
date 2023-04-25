<!-- header-area -->
<header>
  <div id="sticky-header" class="menu__area transparent-header">
    <div class="container custom-container">
      <div class="row">
        <div class="col-12">
          <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
          <div class="menu__wrap">
            <nav class="menu__nav">
              <div class="logo">
                <a href="/" class="logo__black"><img src="/client/home/assets/img/logo/logo_black.png" alt=""></a>
                <a href="/" class="logo__white"><img src="/client/home/assets/img/logo/logo_white.png" alt=""></a>
              </div>
              <div class="navbar__wrap main__menu d-none d-xl-flex">
                <ul class="navigation">

                  {{-- <li class="active"><a href="/">Home</a></li>
                  <li><a href="/about">About</a></li>
                  <li><a href="/services">Services</a></li>
                  <li><a href="/blogs">Our Blog</a> </li> --}}

                  <?php
                  $menu = json_decode($website -> menu, true);
                      if( $menu != "" ) {
                          getMenuListingLayout($menu);
                      }
                  ?>
                </ul>
              </div>
              <div class="header__btn d-none d-md-block">
                <a href="contact.html" class="btn">Contact me</a>
              </div>
            </nav>
          </div>
          <!-- Mobile Menu  -->
          <div class="mobile__menu">
            <nav class="menu__box">
              <div class="close__btn"><i class="fal fa-times"></i></div>
              <div class="nav-logo">
                <a href="index.html" class="logo__black"><img src="/client/home/assets/img/logo/logo_black.png"
                    alt=""></a>
                <a href="index.html" class="logo__white"><img src="/client/home/assets/img/logo/logo_white.png"
                    alt=""></a>
              </div>
              <div class="menu__outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
              </div>
              <div class="social-links">
                <ul class="clearfix">
                  <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                  <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                  <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                  <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                  <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="menu__backdrop"></div>
          <!-- End Mobile Menu -->
        </div>
      </div>
    </div>
  </div>
</header>
<!-- header-area-end -->
@php
function getMenuListingLayout($menu) {
  foreach ($menu as $item) {
  $class = empty($item['children']) ? "" : "header-dropdown" ;
  echo '<li class="'.$class.'">';
    if(empty($item['children'])){
    if (!empty($item['blank']) && strpos($item['url'], "http") !== false) {
    $el = 'target="' . $item['blank'] .'"';
    } else if (empty($item['blank']) && strpos($item['url'], "http") !== false) {
    $el = 'target="_blank"';
    } else {
    $el = "";
    }
    echo '<a data-scroll '.$el.' href="'.$item['url'].'"><span class="title">'.$item['name'].'</span></a>';
    }else {
    echo '<a href="#"><span class="title">'.$item['name'].'</span></a>';

    echo '<ul>';
      foreach ($item['children'] as $i) {
      if(empty($i['children'])){
      if (!empty($i['blank']) && strpos($i['url'], "http") !== false) {
      $el = 'target="' . $i['blank'] .'"';
      } else if (empty($i['blank']) && strpos($i['url'], "http") !== false) {
      $el = 'target="_blank"';
      } else {
      $el = "";
      }
      echo ' <li>
        <a'.$el.' href="'.$i['url'].'">'.$i['name'].'</a>
      </li>';
      }
      }
      echo ' </ul>';
    }
    echo '</li>';
  }
  }
  @endphp