<?php

/**
 * CRUD Order
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Mail\SendMail;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Auth\Events\Validated;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Jobs\NewJob;
use Carbon\Carbon;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.checkout.checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Order\StoreOrderRequest $request create
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreOrderRequest $request)
    {
       $order = $this->orderRepository->create($request->validated());
    //    dd($order->customer_email);
        dispatch(New NewJob($order))->delay(Carbon::now()->addMinutes(20));      
        return back();
    }

}
