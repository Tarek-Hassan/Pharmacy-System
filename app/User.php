<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','password_confirmation',
        'national_id',
        'gender',
        'birht_date',
        'mobile',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin() : bool
    {
        return (bool) $this->is_admin;
    }

    public function createAdmin(array $details) : self
    {
        $user = new self($details);
        if (! $this->isAdminExists()) {
            $user->is_admin = 1;
        }
        $user->save();

        return $user;
    }
    public function isAdminExists() : int
    {
        return self::where('is_admin', 1)->count();
    }
}
