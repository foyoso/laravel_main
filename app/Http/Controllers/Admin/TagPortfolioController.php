<?php

namespace App\Http\Controllers\Admin;

use App\AppConst;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\AddTagPortfolioRequest;
use App\Http\Requests\Tag\EditTagPortfolioRequest;
use App\Http\Services\TagPortfolioService;
use App\Models\TagPortfolio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Website;

class TagPortfolioController extends Controller
{
    protected $tagPortfolioService;
    public function __construct(TagPortfolioService $tagPortfolioService)
    {
        $this -> tagPortfolioService = $tagPortfolioService;
    }
    //forwebsite
    public function index(Website $website, Request $request)
    {

        $tag = $this -> tagPortfolioService-> getByWebsite($website -> id, $request);

        return view('admin.tagPortfolio.index', [
            'title' => 'Tag Blog',
            'website' => $website,
            'data' => $tag
         ]);
    }

    public function store(AddTagPortfolioRequest $request)
    {

        $data = $this->tagPortfolioService->create($request);
        return redirect()->back();
    }


    public function edit(TagPortfolio $item, EditTagPortfolioRequest $request )
    {
        $data = $this->tagPortfolioService->edit( $item, $request);
        //dd($data);

        return redirect()->back();
    }

    public function delete(Request $request): JsonResponse
    {
        $result = $this->tagPortfolioService->delete($request);

        if ($result ) {
            return response()->json([
                'error' => false,
                'message' => 'Delete Tag portfolio success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }





}
