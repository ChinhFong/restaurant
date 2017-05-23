<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name','desc','in_price','out_price','user_id',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
