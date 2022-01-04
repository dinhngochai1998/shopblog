<?php

/**
 * Detail product
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Http\Controllers\Frontend\SingleProduct;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Services\ProductService;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    /**
     * Properties productService
     * 
     * @var ProductService|\App\Repositories\Services\ProductService
     */
    protected $productService;

    /**
     * Inject Productservices
     *
     * @param App\Repositories\Services\ProductService $productService ProductService inject
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Illuminate\Http\Request $request show data
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $detailProduct = $this->productService->getFirstProduct($request);
        $productNews = $this->productService->getNewProduct($request);

        return view('frontend.single-product.single-product', compact('detailProduct', 'productNews'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Illuminate\Http\Request $request show data
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $this->productService->detailaddToCart($request);

        return redirect()->route('cart.show');
    }
}
