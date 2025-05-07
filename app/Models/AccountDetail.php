<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
    use HasFactory;

    protected $table = 'account_details';

    protected $fillable = [
        'user_id',
        'email_email',
        'email_password',
        'linkedin_email',
        'linkedin_password'
    ];
}
