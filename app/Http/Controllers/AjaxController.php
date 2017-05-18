<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
class AjaxController extends Controller
{
    //
    function getModule(){
      $module = Module::all();
      // dd(response()->json($module));
      return $module;
    }
}
