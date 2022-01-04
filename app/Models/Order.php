<?php

/**
 * Model product
 *
 * @package Controller
 * @author  hai <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'total', 'order_date', 'order_number', 'customer_address', 'customer_name', 'customer_email', 'customer_phone',
    ];

    /**
     * Relationship with tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_detail', 'order_id', 'product_id');
    }

}
