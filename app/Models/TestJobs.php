<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 * @property int    $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $send_type
 */
class TestJobs extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'name', 'email', 'phone', 'send_type', 'status'
        ];

}
