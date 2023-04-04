<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Services\LayoutService;
use App\Http\Services\PageService;
use App\Models\Page;
use App\Models\Website;
use App\Utils\WebConst;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class PageController extends Controller
{
    protected $pageService;
    public function __construct(PageService $pageService)
    {
        $this -> pageService = $pageService;
    }

    //list
    public function index(Website $website, Request $request)
    {

        return view('admin.page.index', [
           'title' => 'List Page',
           'data' =>  $this -> pageService -> getAll( $website -> id),
           'pageDefault' =>  $this -> pageService -> getAll( $website -> id, 1),
           'website' => $website

        ]);
    }
    public function add(Website $website)
    {

        return view('admin.page.add', [
           'title' => 'Add page',
           'website' => $website
        ]);
    }
    public function store(Website $website, Request $request)
    {
        $this->pageService->create($request, $website -> id);
        return redirect('/admin/page/'.$website -> id);
    }
    public function show(Website $website, Page $item)
    {

        return view('admin.page.edit', [
           'title' => 'Edit Page',
           'data' => $item,
           'website' => $website,
        ]);
    }
    public function edit(Website $website, Page $item, Request $request)
    {
        $this->pageService->edit($request, $item);
        return redirect('/admin/page/' . $website -> id) ;
    }
    public function delete(Request $request): JsonResponse
    {
        $result = $this->pageService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete Page success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }





}
