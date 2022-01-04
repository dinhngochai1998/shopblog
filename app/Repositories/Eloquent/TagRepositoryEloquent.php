<?php

/**
 * Eloquent category
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Repositories\Eloquent;

use App\Models\Tag;
use App\Repositories\TagRepository;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoriesPlanRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TagRepositoryEloquent extends BaseRepository implements TagRepository
{
    /**
     * Specify Model class category
     *
     * @return \Illuminate\Http\Response
     */
    public function model()
    {
        return Tag::class;
    }

}
