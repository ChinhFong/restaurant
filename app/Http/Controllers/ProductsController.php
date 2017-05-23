<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Product;
use DB;
use App\User;
use Auth;
class ProductsController extends Controller
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
        $products=Product::all();
        return view('auth.products.index',compact('modules','products'));
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
        return view('auth.products.create',compact('modules'));
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
          'name'=>'required|min:3',
          'in_price'=>'required',
          'out_price'=> 'required',
        ]);

        try {
          DB::beginTransaction();

          $user = User::find(Auth::user()->id);
          $user->products()->save(new Product(['name'=>$request->name,'in_price'=>$request->in_price,'out_price'=>$request->out_price,'desc'=>$request->desc]));

          DB::commit();
        } catch (Exception $e) {
          DB::rollback();
        }
        return redirect()->route('products.index');
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
        $product = Product::find($id);
        // dd($product);
        return view('auth.products.edit',compact('product','modules'));
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
          'name'=>'required|min:3',
          'in_price'=>'required',
          'out_price'=> 'required',
        ]);

        try {
          DB::beginTransaction();

          $user = User::find(Auth::user()->id);
          $product = Product::find($id);
          $userName= $user->name;
          $user->products()->whereId($product->id)->update(['name'=>$request->name,'in_price'=>$request->in_price,'out_price'=>$request->out_price,'desc'=>$request->desc,'updated_by'=>$userName]);

          DB::commit();
        } catch (Exception $e) {
          DB::rollback();
        }
        return redirect()->route('products.index');

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
