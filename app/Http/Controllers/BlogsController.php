<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use Illuminate\Http\Request;

class BlogsController extends BaseController
{
    public function index(Request $request)
    {
      $postService = new PostService();
      $data = $postService -> getAll(POST_ITEM_PER_PAGE, $request);

      return view($this -> layoutDir.'.blogs.index', [
        'title' => 'Blogs',
        'blogs' => $data
      ]);
    }
}