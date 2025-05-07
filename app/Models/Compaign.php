<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compaign extends Model
{
    use HasFactory;

    protected $table = 'compaigns';

    protected $fillable = [
        'user_id',
        'name',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
