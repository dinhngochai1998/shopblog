<?php

/**
 * Model product
 *
 * @package Controller
 * @author  hai <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */

namespace App\Models;

use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    const ACCESSORY = 1;
    const PAGINATE = 5;
    const LIMIT = 5;

    protected $fillable = [
        'code', 'name', 'description', 'image', 'price', 'slug', 'category_id', 'image_description', 'quantity', 'schedule_status', 'schedule_product'
    ];

    /**
     * Relationship with category.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relationship with ProductImage.
     *
     * @return \Illuminate\Http\Response
     */
    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    /**
     * Relationship with tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_product', 'product_id', 'tag_id');
    }

    // /**
    //  * Get Accsetsory Category
    //  *
    //  * @param $idCate id category
    //  * 
    //  * @return \Illuminate\Http\Response
    //  */
    // public static function getAccsetsoryCategory($idCate)
    // {
    //     return self::select('products.*', 'categories.name')->join('categories', function ($join) {
    //         $join->on('products.category_id', '=', 'categories.id');
    //     })->where('categories.id', $idCate);
    // }
}
