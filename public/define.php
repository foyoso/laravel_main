<?php
define('ITEM_PER_PAGE', 10);
define('DEFAULT_THUMBNAIL', '/theme-admin/images/default-thumbnail.jpeg');
define('FOLDER_PREFIX', 'uploads');

define('POST_ITEM_PER_PAGE', 10);



function getNewLink($item){
    return '/blogs/'. $item->slug;
  }

function getListingLink($item){
    return '/listings/'. $item->slug;
  }

function getPageLink($item){
    return $item->slug;
  }
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = null;
    return $ipaddress;
  }



define('LINK_LISTINGS', '/listing');
define('LINK_BLOG', '/blog');
define('LINK_CONTACT', '/contact');
define('LINK_HOME', '/');
