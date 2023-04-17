<?php

namespace App\Http\Controllers\Admin;

use App\AppConst;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\AddTagRequest;
use App\Http\Requests\Tag\EditTagRequest;
use App\Http\Services\TagService;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Website;

class TagPostController extends Controller
{
    protected $tagPostService;
    public function __construct(TagService $tagPostService)
    {
        $this -> tagPostService = $tagPostService;
    }
    //forwebsite
    public function index(Website $website, Request $request)
    {

        $tag = $this -> tagPostService-> getByUser($website -> user_id, $request);

        return view('admin.tag.index', [
            'title' => 'Tag Blog',
            'website' => $website,
            'data' => $tag
         ]);
    }

    public function store(AddTagRequest $request)
    {

        $data = $this->tagPostService->create($request);
        return redirect()->back();
    }


    public function edit(Tag $item, EditTagRequest $request )
    {
        $data = $this->tagPostService->edit( $item, $request);
        //dd($data);

        return redirect()->back();
    }

    public function delete(Request $request): JsonResponse
    {
        $result = $this->tagPostService->delete($request);

        if ($result ) {
            return response()->json([
                'error' => false,
                'message' => 'Delete Tag success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }





}
