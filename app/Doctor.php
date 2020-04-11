<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CogBanContractsHasBans as HasBansContract;
use CogBanTraitsHasBans;
use IlluminateNotificationsNotifiable;
use IlluminateFoundationAuthUser as Authenticatable;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DoctorRequest;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Laravel\Sanctum\HasApiTokens;


class Doctor extends Model implements BannableContract
{
    use Bannable;
    //
    protected $guard='doctor';
    
    protected $fillable = [
        'national_id',
        'doctor_name',
        'img',
        'email',
        'password',
        'pharmacy_id' //for now it is fillable
    ];


    protected $hidden = [
        'password','remember_token',
    ];
    
    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

 
}
