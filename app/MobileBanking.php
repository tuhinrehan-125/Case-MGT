<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileBanking extends Model
{
    protected $fillable=[

        'name',
        'banking_details',
        'account_no',
        'account_holder_details',
        'account_type',
     ];
}
