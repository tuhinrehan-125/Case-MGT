<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crime_model extends Model
{
    //
    protected $table = "crime_models";
    protected $fillable =[
    		'type','crime','fine_crime','paper','crime_type',
    ];

}
