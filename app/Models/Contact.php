<?php

/**
 * Model contact
 * 
 * @package Controller
 * @author  hai <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name','email','content','tel',
    ];
}
