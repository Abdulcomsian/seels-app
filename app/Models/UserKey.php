<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKey extends Model
{
    use HasFactory;

    protected $table = 'user_key';

    protected $fillable = [
        'user_id',
        'key'
    ];
}
