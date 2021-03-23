<?php

namespace App;

use App\DCB\ForwadAcceptCase;
use Illuminate\Database\Eloquent\Model;

class CaseWithdrawRequest extends Model
{
   protected $fillable=[
                    'case_id',
                    'forward_id',
                    'payment_method',
                    'fine',
                    'service_charge',
                    'total',
                    'payment_method',
                    'cheque_number',
                    'account_number',
                    'mobile_number',
                    'mobile_operator',
                    'tax_transaction_id',
                    'reference',
                    'bank_branch',
                    'courier_address',
                    'status',
                    'admin_id',
                    'date',
                ];
            public function admin(){
                return $this->belongsTo(Superadmin::class,'admin_id');
            }
            public function CaseDetails(){
                return $this->belongsTo(casereg_model::class,'case_id');
            }
            public function ForwardDetails(){
                return $this->belongsTo(ForwadAcceptCase::class,'forward_id');
            }
}
