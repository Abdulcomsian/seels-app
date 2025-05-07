<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailFormat extends Model
{
    use HasFactory;

    protected $table = 'email_formats';

    protected $fillable = [
        'user_id',
        'subject',
        'snippet1',
        'snippet2',
        'snippet3',
        'snippet4',
    ];
}
