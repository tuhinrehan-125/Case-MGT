<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperAdminRole extends Model
{
    protected $fillable=[
        'name','details','delete_status'
    ];
}
