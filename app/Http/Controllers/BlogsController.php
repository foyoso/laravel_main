<?php

namespace App\Http\Controllers;
class BlogsController extends BaseController
{
    public function index()
    {
      return view($this -> layoutDir.'.blogs.index', [
        'title' => 'Blogs'
      ]);
    }
}