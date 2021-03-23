<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addmp_model extends Model
{
    protected $table = "addmp";
    protected $fillable = [
      'name_mp','ba_no','mp_mb',
    ];
}
