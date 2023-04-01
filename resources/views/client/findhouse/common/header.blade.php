<!-- Main Header Nav -->
<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky main-menu">
  <div class="container-fluid p0">
    <!-- Ace Responsive Menu -->
    <nav>
      <!-- Menu Toggle btn-->
      <div class="menu-toggle">
        <img class="nav_logo_img img-fluid" src="/client/findhouse/images/header-logo.png" alt="header-logo.png">
        <button type="button" id="menu-btn">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <a href="/" class="navbar_brand float-left dn-smd">
        <img class="logo1 img-fluid"
          src="{{$website -> logo?$website -> logo:'/client/findhouse/images/header-logo2.png' }}"
          alt="{{$website -> name}}">
        <img class="logo2 img-fluid"
          src="{{$website -> logo?$website -> logo:'/client/findhouse/images/header-logo2.png' }}"
          alt="{{$website -> name}}">
        <span>{{$website -> name}}</span>
      </a>
      <!-- Responsive Menu Structure-->
      <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
      <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
        <?php
        $menu = json_decode($website -> menu, true);
            if( $menu != "" ) {
                getMenuListingLayout($menu);
            }
        ?>
        <li class="list-inline-item list_s"><a href="#" class="btn flaticon-user" data-toggle="modal"
            data-target=".bd-example-modal-lg"> <span class="dn-lg">Login/Register</span></a></li>
        <li class="list-inline-item add_listing"><a href="page-add-new-property.html"><span
              class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li>
      </ul>
    </nav>
  </div>
</header>

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