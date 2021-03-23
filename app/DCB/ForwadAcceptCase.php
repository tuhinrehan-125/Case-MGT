<?php

namespace App\DCB;

use App\casereg_model;
use App\CaseWithdrawRequest;
use App\FineConsideration;
use App\Models\Unit;
use App\Superadmin;
use App\Unitauth;
use Illuminate\Database\Eloquent\Model;

class ForwadAcceptCase extends Model
{
   protected $fillable=[
       'case_id',
       'case_no',
       'unit_id',
       'forward_status',
       'forward_user',
       'accept_status',
       'accept_user',
       'box_no',
       'delete_status',
       'drop_status',
       'drop_user',
       'forward_date',
       'accept_date',
       'release_status',
   ];
//    protected $dates = [
//     'forward_date','created_at'
//    ];
   public function CaseDetails(){
       return $this->belongsTo(casereg_model::class,'case_id');
   }
   public function ForwardUser(){
       return $this->belongsTo(Unitauth::class,'forward_user');
   }
   public function AcceptUser(){
       return $this->belongsTo(Superadmin::class,'accept_user');
   }
   public function DropUser(){
       return $this->belongsTo(Superadmin::class,'drop_user');
   }
   public function Unit(){
       return $this->belongsTo(Unit::class,'unit_id');
   }
   public function box(){
       return $this->belongsTo(Box::class,'box_no');
   }
   public function Consider(){
       return $this->hasOne(FineConsideration::class,'forward_id');
   }
   public function WithdrawRequest(){
       return $this->hasOne(CaseWithdrawRequest::class,'forward_id');
   }
   public static function CaseData(){
    $forward= ForwadAcceptCase::with([
        'Consider'=>function($query){$query->select(['id','forward_id']);},
        'Unit'=>function($query){$query->select(['id','name']);},
        'CaseDetails'=>function($query){
            $query->select(['id','case_no','victim_name','victim_mb','vehical_reg','date_disposal','vehical_type']);
        }
    ,'DropUser']);
        return $forward;
   }


}
