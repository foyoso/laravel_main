<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\CreateWebTypeRequest;
use App\Http\Requests\Website\EditWebTypeRequest;
use App\Http\Services\WebsiteTypeService;
use App\Models\ListingType;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\WebsiteType;
use App\Utils\WebConst;

class WebsiteTypeController extends Controller
{
    protected $websiteTypeService;
    public function __construct(WebsiteTypeService $websiteTypeService)
    {
        $this -> websiteTypeService = $websiteTypeService;
    }
    //forwebsite
    public function index(Request $request)
    {

        $tag = $this -> websiteTypeService-> getAll(ITEM_PER_PAGE, $request);

        return view('admin.webType.index', [
            'title' => 'Website Type',
            'data' => $tag
         ]);
    }

    public function store(CreateWebTypeRequest $request)
    {

        $data = $this->websiteTypeService->create($request);
        return redirect()->back();
    }


    public function edit(WebsiteType $item, EditWebTypeRequest $request )
    {
        $data = $this->websiteTypeService->edit( $item, $request);
        //dd($data);

        return redirect()->back();
    }

    public function delete(Request $request): JsonResponse
    {
        $result = $this->websiteTypeService->delete($request);

        if ($result ) {
            return response()->json([
                'error' => false,
                'message' => 'Delete listing type success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }





}
