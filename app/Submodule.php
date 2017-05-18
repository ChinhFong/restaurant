<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submodule extends Model
{
  protected $fillable = [
      'name','module_id','url','fa_desc',
  ];
    //
    public function module(){
    return $this->belongsTo('App\Module');
  }
}
