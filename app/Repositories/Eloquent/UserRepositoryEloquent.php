<?php

/**
 * Eloquent category
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepository;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoriesPlanRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent  extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class category
     *
     * @return \Illuminate\Http\Response
     */
    public function model()
    {
        return User::class;
    }

}
