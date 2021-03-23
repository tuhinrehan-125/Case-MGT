<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle_model extends Model
{
    //
    protected $table = "vehicle_models";
    protected $fillable =[
    	 'type','vehicle',	
    ];
}
