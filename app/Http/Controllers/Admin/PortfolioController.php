<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\CreatePortfolioRequest;
use App\Http\Requests\Portfolio\EditPortfolioRequest;
use App\Http\Services\PortfolioService;
use App\Http\Services\TagPortfolioService;
use App\Http\Services\TagService;
use App\Models\portfolio;
use App\Models\Tagportfolio;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class PortfolioController extends Controller
{
    protected $portfolioService;
    public function __construct(PortfolioService $portfolioService)
    {
        $this -> portfolioService = $portfolioService;

    }

    //list
    public function index(Website $website, Request $request)
    {
        return view('admin.portfolio.index', [
            'title' => 'List portfolio',
            'data' =>  $this -> portfolioService -> search(ITEM_PER_PAGE, $request, $website -> user_id),
            'website' => $website,
         ]);
    }

    public function add(Website $website)
    {
        return view('admin.portfolio.add', [
           'title' => 'Add portfolio',
           'website' => $website
        ]);
    }
    public function store(Website $website, CreatePortfolioRequest $request)
    {
        $this->portfolioService->create($request, $website);
        return redirect('/admin/portfolio/'.$website -> id);
    }
    public function show(Website $website, Portfolio $item, Request $request)
    {
        $tag = new TagPortfolioService();
        $tag = $tag -> getByWebsite($website -> id, $request);

        return view('admin.portfolio.edit', [
           'title' => 'Edit portfolio',
           'data' => $item,
           'website' => $website,
           'tags' => $tag
        ]);
    }
    public function edit(Website $website, Portfolio $item, EditPortfolioRequest $request)
    {
        $this->portfolioService->edit($request, $item);
        return redirect('/admin/portfolio/' . $website -> id) ;
    }
    public function delete(Request $request): JsonResponse
    {
        $result = $this->portfolioService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete portfolio success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }




}
