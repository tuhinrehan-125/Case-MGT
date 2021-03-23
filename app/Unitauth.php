<?php

namespace App;

use App\Models\Unit;
use App\Models\UnitRole;
use App\Notifications\UnitauthResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Unitauth extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone','rank_id','ba_baf_no','unit_id', 'unit_role_id', 'password',
    ];
    public function UnitRole(){
        return $this->belongsTo(UnitRole::class,'unit_role_id');
    }
    public function Unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function Rank(){
        return $this->belongsTo(Rank::class,'rank_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UnitauthResetPassword($token));
    }
    public function CaseDetails(){
        return $this->hasMany(casereg_model::class,'id_mp');
    }
}
