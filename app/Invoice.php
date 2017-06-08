<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = [
      'user_id',
      'table_id',
      'amount',
      'status',
    ];

    public function poses(){
      return $this->hasMany('App\Pos','invoice_id','id');
    }
    public function table(){
      return $this->belongTo('App\Table');
    }
    public function user(){
      return $this->belongTo('App\User');
    }
}
