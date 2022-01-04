<?php

/**
 * CRUD category
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    protected $productService;

    public function __construct(ProductRepository $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $getCart = [];

        if (Session::get('cart')) {
            $getCart = Session::get('cart');
        }
        return view('frontend.cart.cart', compact('getCart'));
    }

    /**
     * Add to cart
     *
     * @param Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        $product = $this->productService->where('id', '=', $request->id)->first();
        $cart = Session::get('cart');
        $cart[$product->id] = [
            "id" => $product->id,
            "name" => $product->name,
            "price" => $product->price,
            "image" => $product->image,
            "total" => $product->price,
            "quantity" => 1,
        ];
        Session::put('cart', $cart);
        $count = count($cart);
        return response()->json(['count' => $count ]);
    }

    /**
     * Update cart
     *
     * @param Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request)
    {
        $cart = Session::get('cart');
        $cart[$request->id]['quantity'] = $request->quantity;
        $cart[$request->id]['total'] = ($cart[$request->id]['quantity'] * $cart[$request->id]['price']);
        Session::put('cart', $cart);
        // $total =  $cart['total'];
        return response()->json(['total' => number_format($cart[$request->id]['total'])]);
    }

    /**
     * Delete cart
     *
     * @param Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $cart = Session::get('cart');
        unset($cart[$request->id]);
        Session::put('cart', $cart);

        return back();
    }
}
