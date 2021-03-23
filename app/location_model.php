<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location_model extends Model
{
    //
    protected $table = "location";
    protected $fillable =[
    	'type','location'
    ];
}
