<?php

/**
 * Eloquent category
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoriesPlanRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent  extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class category
     *
     * @return \Illuminate\Http\Response
     */
    public function model()
    {
        return Product::class;
    }

}
