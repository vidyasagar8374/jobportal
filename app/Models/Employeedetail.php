<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeedetail extends Model
{
    use HasFactory;
    protected $fillable = ['middlename', 'lastname', 'firstname', 'user_id', 'number', 'companyname', 'companyaddress', 'ein', 'companyemail', 'companynumber', 'companywebsite','companyaddresstwo',  'countryIso',
        'countryid',
        'stateid'];
}
