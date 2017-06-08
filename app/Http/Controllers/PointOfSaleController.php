<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Pos;
use App\Table;
use App\Invoice;
use App\Product;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
// use Illuminate\Database\Query\Builder;

class PointOfSaleController extends Controller
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
        $tables = Table::all();
        return view('auth.pos.index',compact('modules','tables'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        $table = Table::where(['name'=>Input::input('value')])->get();
        $invoice = Invoice::where(['table_id'=>$table[0]->id])->where(['payment'=>"not pay"])->first();
        $poses=null;
        if($invoice!=null){
          $poses = Pos::where(['invoice_id'=>$invoice->id])->get();
        }
        // dd($poses[0]->id);
        $products = Product::pluck('name','id')->all();
        return view('auth.pos.create',compact('modules','invoice','table','products','poses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->invoice_id>0){ //table already had some order
        $pos = Pos::where(['invoice_id'=>$request->invoice_id,'product_id'=>$request->product])->first();
        if($pos==null){ //product doesn't have in order
          try {
            DB::beginTransaction();
            $invoice = Invoice::find($request->invoice_id);
            $product = Product::find($request->product);
            $invoice->poses()->save(new Pos(['product_id'=>$request->product,'price'=>$product->out_price,'qty'=>$request->qty,'amount'=>$product->out_price*$request->qty]));
            $invoice->whereId($invoice->id)->update(['amount'=>$invoice->amount+($product->out_price*$request->qty)]);
            DB::commit();
          }
          catch (Exception $e) {
            DB::rollback();
          }
        }
        else{ //product already exist in order
          try {
            DB::beginTransaction();
            $invoice = Invoice::find($request->invoice_id);
            $old_amount= $pos->amount;
            $invoice->poses()->whereId($pos->id)->update(['qty'=>$pos->qty+$request->qty,'amount'=>($pos->qty+$request->qty)*$pos->price]);
            $invoice->whereId($invoice->id)->update(['amount'=>($invoice->amount-$old_amount)+($pos->qty+$request->qty)*$pos->price]);
            DB::commit();
          }
          catch (Exception $e) {
            DB::rollback();
          }
        }
      }
      else{//new table new order
        try {
          DB::beginTransaction();
          $product = Product::find($request->product);
          $user = Auth::user();
          $invoice = new Invoice(['table_id'=>$request->table_id,'payment'=>"not pay",'amount'=>$product->out_price*$request->qty]);
          $invoice->payment="not pay";
          $user->invoices()->save($invoice);
          $invoice->poses()->save(new Pos(['product_id'=>$product->id,'price'=>$product->out_price,'qty'=>$request->qty,'amount'=>$product->out_price*$request->qty]));
          DB::commit();
        } catch (Exception $e) {
          DB::rollback();
        }
      }
      return redirect()->back();
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

        if($request->update_qty<=0){
          try {
            DB::beginTransaction();
            // dd($request->all());
            $product = Product::find($request->product);
            $invoice = Invoice::find($request->inv);
            $user = Auth::user();
            $pos = Pos::find($id);
            $old_amount = $pos->amount;                                                                                             // dd($product->out_price);
            $user->invoices()->whereId($invoice->id)->update(['user_id'=>$user->id,'amount'=>($invoice->amount-$old_amount)+($product->out_price*$request->qty_update)]);
            $invoice->poses()->whereId($id)->update(['product_id'=>$product->id,'price'=>$product->out_price,'qty'=>$request->qty_update,'amount'=>$product->out_price*$request->qty_update])  ;
            DB::commit();
          } catch (Exception $e) {
            DB::rollback();
          }
        }
        else{
          try {
            DB::beginTransaction();
            $invoice = Invoice::find($request->inv);
            $product = Product::find($request->product);
            $pos = Pos::find($id);
            $old_amount = $pos->amount;
            $invoice->poses()->whereId($id)->update(['qty'=>$request->qty_update,'amount'=>$product->out_price*$request->qty_update]);
            $invoice->whereId($invoice->id)->update(['amount'=>($invoice->amount-$old_amount)+($product->out_price*$request->qty_update)]);
            DB::commit();
          } catch (Exception $e) {
            DB::rollback();
          }
        }
        return redirect()->back();
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
