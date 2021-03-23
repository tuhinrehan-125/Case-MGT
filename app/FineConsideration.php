<?php

namespace App;

use App\DCB\ForwadAcceptCase;
use Illuminate\Database\Eloquent\Model;

class FineConsideration extends Model
{
    protected $filable=[

        'case_id',
        'forward_id',
        'comments',
        'amount',
        'user_id',
    ];
    public function CaseDetails(){
        return $this->belongsTo(casereg_model::class,'case_id');
    }
    public function forward(){
        return $this->belongsTo(ForwadAcceptCase::class,'forward_id');
    }
    public function Admin(){
        return $this->belongsTo(Superadmin::class,'user_id');
    }
}
