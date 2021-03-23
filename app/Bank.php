<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable=[

       'name',
       'bank_details',
       'account_no',
       'branch',
       'account_holder_details',
    ];
}
