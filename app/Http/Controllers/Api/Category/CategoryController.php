<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response                             
     */
    public function index()
    {
        $category = $this->categoryRepo->all();
        return response()->json($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.category.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = $this->categoryRepo->create($request->validated());
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category = $this->categoryRepo->find($id);
        // dd($category);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $request, $id)
    {
        // dd($id);
        $category = $this->categoryRepo->update($request->validated(), $id);
        return response()->json($category);
    }

    public function updateCate(CategoryStoreRequest $request, $id)
    {
        // dd($id);
        $category = $this->categoryRepo->update($request->validated(), $id);
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        
        $category = $this->categoryRepo->delete($request->id);
        return redirect()->route('category.index');
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = $this->categoryRepo->delete($id);
        return response()->json(1);
    }
}
