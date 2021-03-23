<?php

namespace App\DCB;

use App\casereg_model;
use App\Models\Unit;
use App\Superadmin;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $fillable=[
        'release_id',
        'unit_id',
        'case_id',
        'payment_method',
        'cheque_number',
        'account_number',
        'mobile_operator',
        'mobile_number',
        'tax_transaction_id',
        'reference',
        'bank_branch',
        'total',
        'user_id',
        'date',
    ];
    public function admin(){
        return $this->belongsTo(Superadmin::class,'user_id');
    }
    public function CaseDetails(){
        return $this->belongsTo(casereg_model::class,'case_id');
    }
    public function ReleaseDetails(){
        return $this->belongsTo(ReleaseCase::class,'release_id');
    }
    public function Unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
