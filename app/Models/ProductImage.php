<?php

/**
 * Model product image
 *
 * @package Controller
 * @author  hai <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id', 'product_image'
    ];

}
