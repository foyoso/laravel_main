<?php

namespace App\Http\Controllers;

use App\Http\Services\PageService;
use App\Http\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogsController extends BaseController
{
    public function index(Request $request)
    {
        $postService = new PostService();
        $data = $postService -> getAll(POST_ITEM_PER_PAGE, $request);
        if ($request->ajax()) {
            return  view($this -> layoutDir.'.blogs.ajax')->with('data', $data)->render();
        }
        $page = new PageService();
        $page = $page ->findBySlug($this -> website -> id, LINK_BLOG);
        if($page){
        $this -> setMetaTag($page -> description,
                            $this -> website-> getDomain(1) . $page -> slug,
                            $page -> og_image, $page -> keyword,
                            $page -> title);
        }
        return view($this -> layoutDir.'.blogs.index', [

            'blogs' => $data
        ]);
    }

    public function detail(string $slug)
    {
        $postService = new PostService();
        $data = $postService->findBySlug($slug);
        if (!$data) {
            return response()->view($this -> layoutDir.'.errors.404', ['error' => 'Not Found'], 404);
        }
        return view($this -> layoutDir.'.blogs.detail', [
            'title' =>  $data -> name,
            'data' => $data
        ]);
    }
}