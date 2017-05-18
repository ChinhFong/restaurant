<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

  protected $fillable = [
      'name','fa_desc',
  ];
    //
    public function submodules(){
      return $this->hasMany('App\Submodule');
    }
}
