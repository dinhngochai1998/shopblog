<?php

/**
 * Model category
 * 
 * @package Controller
 * @author  hai <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{

    protected $fillable = [
        'name', 'parent_id'
    ];

    /**
     * Relationship with product.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
