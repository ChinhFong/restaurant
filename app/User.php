<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role(){
      return $this->belongsTo('App\Role');
  }
    public function products(){
      return $this->hasMany('App\Product');
    }
    public function invoices(){
      return $this->hasMany('App\Invoice');
    }
    public function exchangerate(){
      return $this->hasOne('App\Exchangerate');
    }
}
