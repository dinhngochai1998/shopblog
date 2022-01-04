<?php

/**
 * Eloquent category
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoriesPlanRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class category
     *
     * @return \Illuminate\Http\Response
     */
    public function model()
    {
        return Order::class;
    }

}
