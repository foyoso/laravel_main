<?php

namespace App\Http\Controllers;

use App\Http\Services\PageService;
use App\Http\Services\PostService;
use Illuminate\Http\Request;

class BlogsController extends BaseController
{
    public function index(Request $request)
    {
      $postService = new PostService();
      $data = $postService -> getAll(POST_ITEM_PER_PAGE, $request);

      $artilces = '';
      if ($request->ajax()) {
        foreach ($data as $result) {
            $artilces.=
            '<div class="col-lg-6">
              <div class="for_blog feat_property">
                <a href="/blog/'.$result->slug.'" alt="link">
                  <div class="thumb">
                    <img class="img-whp" src="/client/findhouse/images/blog/1.jpg" alt="1.jpg">
                    <div class="blog_tag">Construction</div>
                  </div>
                </a>
                <a href="/blog/'.$result->slug.'" alt="link">
                  <div class="details">
                    <div class="tc_content">
                      <h4>'.$result->name.'</h4>
                      <ul class="bpg_meta">
                        <li class="list-inline-item"><i class="flaticon-calendar"></i>
                        </li>
                        <li class="list-inline-item">January 16, 2020</li>
                      </ul>
                      <p>'.$result->description.'</p>
                    </div>
                    <div class="fp_footer">
                      <ul class="fp_meta float-left mb0">
                        <li class="list-inline-item"><img src="/client/findhouse/images/property/pposter1.png"
                            alt="pposter1.png"></li>
                        <li class="list-inline-item">Ali Tufan</li>
                      </ul>
                      <span class="fp_pdate float-right text-thm">Read More <span class="flaticon-next"></span></span>
                    </div>
                  </div>
                </a>
              </div>
            </div>';
        }
        return $artilces;
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
        'title' => 'Blogs',
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
        'title' => 'Detail',
        'data' => $data
      ]);
    }
}