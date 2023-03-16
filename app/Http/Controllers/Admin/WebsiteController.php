<?php

namespace App\Http\Controllers\Admin;

use App\Utils\WebConst;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\CreateRequest;
use App\Http\Requests\Website\EditRequest;
use App\Http\Services\WebsiteService;
use App\Models\Layout;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Services\HttpService;
use App\Http\Services\LayoutService;
use App\Models\Website;

class WebsiteController extends Controller
{
    protected $websiteService;
    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }
    //list
    public function index(Request $request)
    {
        return view('admin.layout.index', [
           'title' => 'List Website',
           'data' => $this->websiteService -> getAll(ITEM_PER_PAGE, $request)
        ]);
    }
    public function add()
    {
        $layout = new LayoutService();
        return view('admin.website.add', [
           'title' => 'Add Website',
           'layout' => $layout ->getAllForSelectBox()
        ]);
    }
    public function store(CreateRequest $request)
    {
        $this->websiteService->create($request);
        return redirect()->route('websiteList');
    }
    public function show(Website $item)
    {
        $layout = new LayoutService();
        return view('admin.website.edit', [
           'title' => 'Edit Website',
           'data' => $item,
           'website' => $item,
           'layout' => $layout ->getAllForSelectBox()
        ]);
    }
    public function edit(Layout $item, EditRequest $request)
    {
        $this->websiteService->edit($request, $item);
        return redirect() -> route('layoutList');
    }

    public function delete(Request $request): JsonResponse
    {
        $result = $this->websiteService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete layout success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
