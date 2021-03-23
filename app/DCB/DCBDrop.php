<?php

namespace App\DCB;

use App\casereg_model;
use App\Superadmin;
use Illuminate\Database\Eloquent\Model;

class DCBDrop extends Model
{
    protected $fillable = [
        'case_id',
        'comment',
        'user',
        'delete_status',
    ];
    public function caseDetails(){
        return $this->belongsTo(casereg_model::class,'case_id');
    }
    public function AdminDetails(){
        return $this->belongsTo(Superadmin::class,'user');
    }
}
