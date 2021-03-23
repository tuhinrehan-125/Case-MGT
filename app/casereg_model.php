<?php

namespace App;

use App\Models\Unit;

use App\DCB\ForwadAcceptCase;
use App\DCB\ReleaseCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class casereg_model extends Model
{
    protected $table ="casereg";
    protected $fillable =[
    			'id_mp','case_no','victim_name','victim_mb','vehical_reg','date_off',
    			'time_off','date_disposal','time_disposal','loc','victim',
    			'vehical_type','crime_type','paper',
    			'forwared','drop_type','unit_id','user_id', ];
    public function unitauth(){
       return $this->belongsTo(Unitauth::class,'id_mp');
    }
    public function crimes(){
       return $this->belongsTo(crime_model::class,'crime_type');
    }
    public function unit(){
       return $this->belongsTo(Unit::class,'unit_id');
    }
    public function ForwadAcceptCase(){
        return $this->hasOne(ForwadAcceptCase::class, 'case_id');
    }
    public function CaseWithdrawRequest(){
        return $this->hasOne(CaseWithdrawRequest::class, 'case_id');
    }
    public function ReleaseCase(){
        return $this->hasOne(ReleaseCase::class, 'case_id');
    }
    public static function NewCaseInComplete(){
        $case=casereg_model::where('forwared', '=', '0')
            ->where('drop_type', '=', '0')
            ->where('unit_id', Auth::user()->unit_id)
            ->select(['id','case_no','id_mp','victim_name','victim_mb','vehical_reg','date_off','time_off','date_disposal','loc','victim','vehical_type','paper','crime_type','unit_id'])
            ->where(function ($query) {
                $query->orwhereNull([
                    'id_mp','victim_name','victim_mb','vehical_reg','date_off',
                    'time_off','date_disposal','loc','victim',
                    'vehical_type','crime_type','paper'])
                    ->orwhere('crime_type', '=', 'null')
                    ->orwhere('paper', '=', 'null');

                })
                ->orderBy('id', 'asc');
                return $case;
    }
    public static function NewCaseComplete(){
        $attributes = [
            'id_mp','victim_name','victim_mb','vehical_reg',/*'date_off',
            'time_off','date_disposal',*/'loc','victim',
            'vehical_type','crime_type','paper'];
            $newcasecomplet = casereg_model::where('forwared', '=', '0')
                  ->where('drop_type', '=', '0')
                  ->where('unit_id', Auth::user()->unit_id)
                  ->whereNotNull($attributes)
                  ->where('crime_type', '!=', 'null')
                  ->where('paper', '!=', 'null')
                  ->orderBy('id', 'asc');
                  return $newcasecomplet;
    }
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
