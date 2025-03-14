<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';

    protected $fillable = [
        'user_id', 'company', 'city', 'corporate_phone', 'employees', 'industry',
        'website', 'company_linkedin_url', 'vv_straat','street', 's15_data_source',
        'snippet_3', 'first_name', 'last_name', 'title', 'email', 'person_linkedin_url','status'
    ];    
}
