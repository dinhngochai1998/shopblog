<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TagRepository;
use App\Http\Requests\Product\ProductStoreRequest;

class ProductController extends Controller
{
    protected $categoryRepo;
    protected $productRepository;
    protected $tagRepo;

    public function __construct(CategoryRepository $categoryRepo, ProductRepository $productRepository,TagRepository $tagRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->productRepository = $productRepository;
        $this->tagRepo = $tagRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->productRepository->paginate(4);
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->categoryRepo->all();
        $tag = $this->tagRepo->all();
        return view('backend.admin.product.store', compact(['category','tag']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            $image = $this->productRepository->image($request->file('image'));
            $data['image'] = $image;
        }
        $product = $this->productRepository->create($data);

        $tagId = [];
        if($request->tag_id) {
            foreach($request->tag_id as $value) {
                $tag = $this->tagRepo->firstOrCreate(['name' => $value]);
                $tagId[] = $tag->id;
            }
        }

        $product->tags()->attach($tagId);

        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->with(['categories','tags'])->find($id);
        $category = $this->categoryRepo->all();
        $tag = $this->tagRepo->all();

        return view('backend.admin.product.edit', compact(['product','category','tag']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, $id)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            $image = $this->productRepository->image($request->file('image'));
            $data['image'] = $image;
        }
        $product = $this->productRepository->update($data, $id);

        $tagId = [];
        if($request->tag_id) {
            foreach($request->tag_id as $value) {
                $tag = $this->tagRepo->firstOrCreate(['name' => $value]);
                $tagId[] = $tag->id;
            }
        }

        $product->tags()->sync($tagId);
        return redirect()->route('product.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->delete($id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product = $this->productRepository->delete($id);
        // return back();
    }
}
