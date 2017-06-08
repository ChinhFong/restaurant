@extends('layouts.admin')

{{-- @section('header')

@endsection --}}
@section('title','Order | Table')
@section('content')
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-plus"></i> Order | {{$table[0]->name}} </h1>
  </div>
    @include('includes.error-validate')
    <div class="row">
        <div class="col-md-12">
        @include('includes.error-validate')
            <form class="order" action="/dashboard/pointofsale" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{Form::hidden('table_id',''.$table[0]->id)}}
                @php
                  $inv="";
                  $i=1;
                  if($invoice==null){
                    $inv=0;
                  }
                  else{
                    $inv = $invoice->id;
                  }
                @endphp
                <input type="hidden" name="invoice_id" value="{{ $inv }}">
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          {{ Form::label('product','Food & Beverage :')}}
                          {{ Form::select('product',['0'=>'Choose you foods']+$products,0,['class'=>'form-control select_opt']) }}
                        </div>
                    </div>
                    <div class="col-md-2  toggle_left">
                      {{ Form::label('qty','Quantity :')}}
                      {{ Form::number('qty','1',['class'=>'form-control','id'=>'qty','min'=>1])}}
                    </div>
                    <div class="col-md-2 col-md-offset-5 pull-right">
                      <div class="form-group">
                        {{Form::label('&nbsp;','')}}
                        <button type="submit" class="btn btn-primary add-order" style="padding:8px 20px;"> Add  </button>
                      </div>
                    </div>
                  </div>
                </form>
                  <div class="row">
                    @foreach ($poses as $pos)
                      @php
                        $product = $pos->product;
                      @endphp
                      <a class="update_order_qty" href="#" data-toggle="modal" data-target=".bs-example-modal-sm{{$pos->id}}-qty" data-keyboard="false" data-backdrop="static"></a>
                      @include('includes.modal_pos')
                    @endforeach
                    @if($invoice!=null)
                        <table id="dataTable" class="dataTable display table table-condensed table-striped" cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th class="text-right">OPTIONS</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($poses as $pos)
                            <tr>
                              <td>{{''.$i}}</td>
                              <td>
                              @php
                                $product = $pos->product;
                                echo $product->name;
                                $i++;
                              @endphp
                              </td>
                              <td>${{$pos->price}}</td>
                              <td>{{$pos->qty}}</td>
                              <td>${{$pos->amount}}</td>
                              <td class="text-right">
                                @include('includes.eventforpos')
                              </td>
                            </tr>
                            @endforeach
                            <tr>
                              <td>Ptas Pu</td>
                              <td></td>
                              <td></td>
                              <td>Total Amount :</td>
                              <td>${{$invoice->amount}}</td>
                              <td></td>
                            </tr>
                        </tbody>
                      </table>
                      @else
                          <h3 class="text-center alert alert-info">Empty!</h3>
                      @endif
                  </div>
                <br/>
                <div class="well well-sm">
                    &nbsp;
                    <a class="btn btn-link pull-right" href="{{ route('pointofsale.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    <br/>
                    &nbsp;
                </div>
        </div>
    </div>
@endsection
@section('scripts')
  <script src="{{asset('js/modules.js')}}"></script>
  <script src="{{asset('js/function.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>

    $(document).ready(function() {
        // $('.date-picker').datepicker({
        // });
    } );
  </script>
@endsection
