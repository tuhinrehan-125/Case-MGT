<?php

namespace App\DCB;

use App\casereg_model;
use App\Models\Unit;
use App\Superadmin;
use Illuminate\Database\Eloquent\Model;

class ReleaseCase extends Model
{
    protected $fillable=[
        'forward_accept_id',
        'case_id',
        'case_no',
        'unit_id',
        'release_status',
        'packet_no',
        'release_user',
        'release_date',
        'box_no',
        'service_charge',
        'total_fine',
        'consider',
        'total',
        'comments',
    ];
    public function user(){
        return $this->belongsTo(Superadmin::class,'release_user');
    }
    public function CaseDetails(){
        return $this->belongsTo(casereg_model::class,'case_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function forward(){
        return $this->belongsTo(ForwadAcceptCase::class,'forward_accept_id');
    }
}
