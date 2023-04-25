<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Layout\CreateLayoutRequest;
use App\Http\Requests\Layout\EditLayoutRequest;
use App\Http\Services\LayoutService;
use App\Models\Layout;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class LayoutController extends Controller
{
    protected $layoutService;
    public function __construct(LayoutService $layoutService)
    {
        $this->layoutService = $layoutService;
    }
    //list
    public function index(Request $request)
    {
        return view('admin.layout.index', [
           'title' => 'List Layout',
           'data' => $this->layoutService -> getAll(2, $request)
        ]);
    }
    public function add()
    {
        return view('admin.layout.add', [
           'title' => 'Add Layout',
        ]);
    }
    public function store(CreateLayoutRequest $request)
    {
        $this->layoutService->create($request);
        return redirect()->route('layoutList');
    }
    public function show(Layout $item)
    {


        return view('admin.layout.edit', [
           'title' => 'Edit Layout',
           'data' => $item,


        ]);
    }
    public function edit(Layout $item, EditLayoutRequest $request)
    {
        $this->layoutService->edit($request, $item);
        return redirect() -> route('layoutList');
    }

    public function delete(Request $request): JsonResponse
    {
        $result = $this->layoutService->delete($request);
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
