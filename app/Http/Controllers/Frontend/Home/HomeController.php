<?php

/**
 * CRUD category
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;

class HomeController extends Controller
{

    protected $productService;
    protected $categoryRepo;

    /**
     * Inject Productservice
     *
     * @param App\Repositories\ProductRepository $productService Properties
     */
    public function __construct(ProductRepository $productService,CategoryRepository $categoryRepo)
    {
        $this->productService = $productService;
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Display a listing of the resource.show view product
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $productItems = $this->productService->with('categories')->get();
        // dd($productItems);
        return view('frontend.home.index', compact('productItems'));
    }


}
