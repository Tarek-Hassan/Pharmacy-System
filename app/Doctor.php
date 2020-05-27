<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable implements BannableContract

{
    use Notifiable,Bannable;
    protected $guard='doctor';
    protected $fillable = [
        'docImage',
        'name',
        'email',
        'password',
        'national_id',
        'pharmacy_id',
    ];
    
    protected $hidden = [
        'password',
    ];
    
    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }

}
