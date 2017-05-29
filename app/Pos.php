<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    //
    protected $fillable = [
      'invoice_id',
      'product_id',
      'price',
      'qty',
      'amount'
    ];

    public function invoice(){
      return $this->belongTo('App\Invoice');
    }
}
