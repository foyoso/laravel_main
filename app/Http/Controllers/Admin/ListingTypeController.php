<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Listing\CreateTypeRequest;
use App\Http\Requests\Listing\EditTypeRequest;
use App\Http\Services\ListingTypeService;
use App\Models\ListingType;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Utils\WebConst;

class ListingTypeController extends Controller
{
    protected $listingTypeService;
    public function __construct(ListingTypeService $listingTypeService)
    {
        $this -> listingTypeService = $listingTypeService;
    }
    //forwebsite
    public function index(Request $request)
    {

        $tag = $this -> listingTypeService-> getAll(ITEM_PER_PAGE, $request);

        return view('admin.listingType.index', [
            'title' => 'listing Type',
            'data' => $tag
         ]);
    }

    public function store(CreateTypeRequest $request)
    {

        $data = $this->listingTypeService->create($request);
        return redirect()->back();
    }


    public function edit(ListingType $item, EditTypeRequest $request )
    {
        $data = $this->listingTypeService->edit( $item, $request);
        //dd($data);

        return redirect()->back();
    }

    public function delete(Request $request): JsonResponse
    {
        $result = $this->listingTypeService->delete($request);

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
