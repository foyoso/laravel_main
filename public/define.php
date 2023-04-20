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


define('LINK_LISTINGS', '/listing');
define('LINK_BLOG', '/blog');
define('LINK_CONTACT', '/contact');
define('LINK_HOME', '/');
