<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Listing\CreateListingRequest;
use App\Http\Requests\Listing\EditListingRequest;
use App\Http\Services\ListingService;
use App\Http\Services\VnProvinceService;
use App\Http\Services\BedroomService;
use App\Http\Services\BathroomService;
use App\Models\Listing;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class ListingController extends Controller
{
    protected $listingService;
    public function __construct(ListingService $listingService)
    {
        $this -> listingService = $listingService;

    }

    //list
    public function index(Website $website, Request $request)
    {
        return view('admin.listing.index', [
            'title' => 'List Listing',
            'data' =>  $this -> listingService -> getAll(ITEM_PER_PAGE, $request),
            'website' => $website

         ]);

    }

    public function add(Website $website)
    {
        $province = new VnProvinceService();

        return view('admin.listing.add', [
           'title' => 'Add Listing',
           'website' => $website,
           'province' => $province -> getAllForSelectBox(),
        ]);
    }
    public function store(Website $website, CreateListingRequest $request)
    {
        $listing  = $this->listingService->create($request, $website);
        return redirect('/admin/listing/edit/'.$website -> id.'/' .  $listing -> id);
    }
    public function show(Website $website, Listing $item)
    {
        $bed = new BedroomService();
        $bath = new BathroomService();
        $province = new VnProvinceService();
        return view('admin.listing.edit', [
           'title' => 'Edit Listing',
           'data' => $item,
           'website' => $website,
           'province' => $province -> getAllForSelectBox(),
           'beds' => $bed -> getAllForSelectBox(),
           'baths' => $bath -> getAllForSelectBox(),
        ]);
    }
    public function edit(Website $website, Listing $item, EditListingRequest $request)
    {
        $this->listingService->edit($request, $item);
        return redirect('/admin/listing/' . $website -> id) ;
    }
    public function delete(Request $request): JsonResponse
    {
        $result = $this->listingService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete Listing success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }




}
