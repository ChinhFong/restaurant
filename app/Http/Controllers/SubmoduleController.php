<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Submodule;
use DB;
use Illuminate\Support\Facades\Input;
class SubmoduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd(Input::input('mod_id'));
        $mod_id = Input::input('mod_id');
        $modules = Module::all();
        return view('auth.submodules.create',compact('modules','mod_id'));
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
        // dd($request->all());
        $this->validate($request,[
          'name'=>'required|min:6',
          'fa_desc'=> 'required|min:6',
          'url_default'=>'required|min:6',
        ]);
        $mod = Module::find($request->mod_id);
        $mod->submodules()->save(new Submodule(['name'=>$request->name,'fa_desc'=>$request->fa_desc,'url'=>$request->url_default]));
        return redirect()->route('modules.show',$request->mod_id);
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
        $modules = Module::all();
        $submod = Submodule::find($id);
        return view('auth.submodules.edit',compact('modules','submod'));

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
        $this->validate($request,[
          'url' => 'required|min:6',
          'name' => 'required|min:4',
          'fa_desc' =>  'required|min:6'
        ]);
        try {
          DB::beginTransaction();

          $submod = Submodule::find($id);
          $mod = $submod->module;
          $submod->update(['url'=>$request->url,'name'=>$request->name,'fa_desc'=>$request->fa_desc]);
          DB::commit();
        } catch (Exception $e) {
          DB::rollback();
        }
        return redirect()->route('modules.show',$mod->id);
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
