<?php

/**
 * Model tag
 * 
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Relationship with Post
     * 
     * @return \Illuminate\Http\Response
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'tag_post');
    }
}
