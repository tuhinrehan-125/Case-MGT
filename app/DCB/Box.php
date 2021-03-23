<?php

namespace App\DCB;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
 protected  $fillable=[
     'name',
     'number',
     'qty',
     'delete_Status',
 ];
}
