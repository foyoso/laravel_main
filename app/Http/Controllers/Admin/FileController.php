<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
class FileController extends Controller
{
    protected $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    //list
    public function getForAjax(Request $request)
    {
        $data = $this -> fileService -> getItem(FOLDER_PREFIX. '/'. $request ->input('folder').'/');
        $compiled = view('admin.image.gallery')->with('data', $data)->render();
        return response()->json(['html'=> $compiled]);
    }
    public function getlist(Request $request)
    {
        $data = $this -> fileService -> getItem(FOLDER_PREFIX . '/' . $request ->input('folder') . '/');
        $compiled = view('admin.image.ajax')->with('data', $data)->render();
        return response()->json(['html'=> $compiled]);
    }
    public function save(Request $request): JsonResponse {
        $folder = FOLDER_PREFIX . '/'. $request -> input('folder'). '/';
        $data = array();
        $validator = Validator::make($request->all(), [
           'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($validator->fails()) {

           $data['success'] = 0;
           $data['error'] = $validator->errors()->first('file');// Error response

        }else{
           if($request->file('file')) {
               $this -> fileService -> saveItem($folder, $request);
               // Response
               $data['success'] = 1;
               $data['message'] = 'Uploaded Successfully!';
           }else{
               // Response
               $data['success'] = 2;
               $data['message'] = 'File not uploaded.';
           }
        }

        return response()->json($data);
    }
}
