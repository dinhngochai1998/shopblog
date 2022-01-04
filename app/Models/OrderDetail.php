<?php

/**
 * Model Order detail
 * 
 * @package Controller
 * @author  hai <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = [
        'price', 'total', 'quantity', 'product_id', 'order_id'
    ];
}
