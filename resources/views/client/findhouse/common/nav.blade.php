<!-- Main Header Nav For Mobile -->
<div id="page" class="stylehome1 h0">
  <div class="mobile-menu">
    <div class="header stylehome1">
      <div class="main_logo_home2 text-center">
        <img class="nav_logo_img img-fluid mt20" src="{{$website -> logo?$website -> logo:'/client/findhouse/images/header-logo2.png' }}" alt="{{$website -> name}}">
        <span class="mt20">FindHouse</span>
      </div>
      <ul class="menu_bar_home2">
        <li class="list-inline-item list_s"><a href="page-register.html"><span class="flaticon-user"></span></a>
        </li>
        <li class="list-inline-item"><a href="#menu"><span></span></a></li>
      </ul>
    </div>
  </div><!-- /.mobile-menu -->
  <nav id="menu" class="stylehome1">
    <ul>
      <?php
          $menu = json_decode($website -> menu, true);
          if( $menu != "" ) {
            getMenuMobile($menu);
          }
        ?>
  </nav>
</div>

@php

function getMenuMobile($menu) {
    foreach ($menu as $item) {
         $class = empty($item['children']) ? "" : "" ;
         echo '<li>';
         if(empty($item['children'])){
            if (!empty($item['blank']) && strpos($item['url'], "http") !== false) {
               $el = 'target="' . $item['blank'] .'"';
            } else if (empty($item['blank'])  && strpos($item['url'], "http") !== false) {
                $el = 'target="_blank"';
            } else {
                $el = "";
            }
            echo '<a href="'.$item['url'].'">'.$item['name'].'</a>';
     }else {
          echo '<span>'.$item['name'].'</span>';
          echo '<ul>';
        foreach ($item['children'] as $i) {
            if(empty($i['children'])){

                echo '        <li><a  href="'.$i['url'].'">'.$i['name'].'</a></li>';
            }
        }
        echo '    </ul>';
    }
    echo '</li>';
  }
}
@endphp