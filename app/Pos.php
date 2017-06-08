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
      return $this->belongsTo('App\Invoice','invoice_id','id');
    }
    public function product(){
      return $this->belongsTo('App\Product','product_id','id');
    }
}
