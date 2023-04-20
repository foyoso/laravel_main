<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\EditPostRequest;
use App\Http\Services\PostService;
use App\Http\Services\TagService;
use App\Models\Post;
use App\Models\TagPost;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this -> postService = $postService;

    }

    //list
    public function index(Website $website, Request $request)
    {
        return view('admin.post.index', [
            'title' => 'List Post',
            'data' =>  $this -> postService -> search(ITEM_PER_PAGE, $request, $website -> user_id),
            'website' => $website,
         ]);
    }

    public function add(Website $website)
    {
        return view('admin.post.add', [
           'title' => 'Add Post',
           'website' => $website
        ]);
    }
    public function store(Website $website, CreatePostRequest $request)
    {
        $this->postService->create($request, $website);
        return redirect('/admin/post/'.$website -> id);
    }
    public function show(Website $website, Post $item, Request $request)
    {
        $tag = new TagService();
        $tag = $tag -> getByUser($website -> user_id, $request);

        return view('admin.post.edit', [
           'title' => 'Edit Post',
           'data' => $item,
           'website' => $website,
           'tags' => $tag
        ]);
    }
    public function edit(Website $website, Post $item, EditPostRequest $request)
    {
        $this->postService->edit($request, $item);
        return redirect('/admin/post/' . $website -> id) ;
    }
    public function delete(Request $request): JsonResponse
    {
        $result = $this->postService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete Post success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }




}
