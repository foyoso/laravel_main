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
use App\Http\Services\PageService;
use App\Http\Services\UserService;
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
        return view('admin.website.index', [
           'title' => 'List Website',
           'data' => $this->websiteService -> getAll(ITEM_PER_PAGE, $request)
        ]);
    }
    public function add()
    {
        $layout = new LayoutService();
        $user = new UserService();
        return view('admin.website.add', [
           'title' => 'Add Website',
           'layout' => $layout ->getAllForSelectBox(),
           'user' => $user ->getAllForSelectBox()
        ]);
    }
    public function store(CreateRequest $request)
    {
        $this->websiteService->create($request);
        return redirect()->route('websiteList');
    }
    public function menu(Website $item, Request $request){
        $sType = $request -> get('sType');
        $sType != null?$sType:0;
        $page = new PageService();
        return view('admin.website.menu', [
            'title' => 'Edit Website',
            'website' => $item,
            'sType' => $sType,
            'pages' => $page -> getAllForSelectBox($item -> id),
            'menu' => $sType==0?$item -> menu:$item -> menu_footer
         ]);
    }
    public function saveMenu(Website $item,  Request $request)
    {
        $this->websiteService->menu($request, $item);
        return redirect('/admin/website/menu/' . $item -> id . '?sType='.$request -> input('type')) ;
    }
    public function show(Website $item)
    {
        $layout = new LayoutService();
        $user = new UserService();
        return view('admin.website.edit', [
           'title' => 'Edit Website',
           'data' => $item,
           'website' => $item,
           'layout' => $layout ->getAllForSelectBox(),
           'user' => $user ->getAllForSelectBox()
        ]);
    }
    public function edit(Website $item, EditRequest $request)
    {
        $this->websiteService->edit($request, $item);
        return redirect() -> route('websiteList');
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
