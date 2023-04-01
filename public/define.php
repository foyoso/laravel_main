<?php
define('ITEM_PER_PAGE', 2);
define('DEFAULT_THUMBNAIL', '/theme-admin/images/default-thumbnail.jpeg');
define('FOLDER_PREFIX', 'uploads');

define('POST_ITEM_PER_PAGE', 10);



function getNewLink($item){
    return '/news/'. $item->slug . '-' .$item -> id;
  }

function getListingLink($item){
    return '/listings/'. $item->slug . '-' .$item -> id;
  }

function getPageLink($item){
    return $item->slug . '-' .$item -> id;
  }