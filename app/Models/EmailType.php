<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailType extends Model
{
    protected $table = 'email_type';

    use HasFactory;
     protected $fillable = ['account_detail_id', 'type', 'user_id','email_email','email_password'];

    // public function accountDetail()
    // {
    //     return $this->belongsTo(AccountDetail::class);
    // }

      public function accountDetail()
    {
        return $this->belongsTo(User::class);
    }
}
