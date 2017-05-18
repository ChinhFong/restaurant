<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Submodule;
use DB;
use Artisan;
class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modules = Module::all();
        $mods = Module::orderBy('name','desc')->get();
        // dd($modules);
        return view('auth.modules.index',compact('modules','mods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $modules = Module::all();
        return view('auth.modules.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
        $this->validate($request,[
          'name'=>'required|min:6',
          'fa_module'=>'required|min:6',
          'url_name'=> 'required|min:4',
          'fa_url'=>'required|min:6',
          'url_default'=>'required|min:6',
        ]);
        // dd($request->all());
        try {
          DB::beginTransaction();
          $mod = new Module();
          $submod = new Submodule();
          //module
          $mod->name = $request->name;
          $mod->fa_desc = $request->fa_module;
          $mod->save();
          // dd($mod);
          //submod
          $submod->url = $request->url_def;
          $submod->name = $request->submod_name;
          $submod->fa_desc = $request->fa_url;

          $mod->submodules()->save($submod);
          DB::commit();
          Artisan::call('make:controller',['name' =>  $mod->name.'Controller','-r'=>'true']);
          Artisan::call('make:view',['name'=>'auth.'.strtolower($mod->name),'--resource'=>'true','--extends'=>'layouts.admin','--section'=>['title','content','scripts']]);
        } catch (Exception $e) {
          DB::rollback();
        }
        return redirect()->route('modules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
