<?php

/**
 * Eloquent category
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoriesPlanRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class category
     *
     * @return \Illuminate\Http\Response
     */
    public function model()
    {
        return Category::class;
    }

}
