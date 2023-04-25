<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Listing\CreateListingRequest;
use App\Http\Requests\Listing\EditListingRequest;
use App\Http\Services\ContactService;
use App\Http\Services\VnProvinceService;
use App\Http\Services\BedroomService;
use App\Http\Services\BathroomService;
use App\Models\Listing;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class ContactController extends Controller
{
    protected $contactService;
    public function __construct(ContactService $contactService)
    {
        $this -> contactService = $contactService;

    }

    //list
    public function index(Website $website, Request $request)
    {
        return view('admin.contact.index', [
            'title' => 'List Submissions',
            'data' =>  $this -> contactService -> search(ITEM_PER_PAGE, $request, $website->id ),
            'website' => $website

         ]);

    }
    public function delete(Request $request): JsonResponse
    {
        $result = $this->contactService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete Submission success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }




}
