<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $fillable = [
        'name',
        'desc',
        'status',
    ];
    public function invoices(){
      return $this->hasMany('App\Invoice');
    }
}
