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
        'compaign_id',
        'subject',
        'description',
        'email_name'
    ];

    public function comments()
{
    return $this->hasMany(Comment::class, 'email_format_id');
}

}
