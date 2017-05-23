@extends('layouts.admin')
@section('title','New|Product')
@section('content')
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-plus"></i> Product / Create </h1>
  </div>
    {{-- @include('error') --}}
    <div class="row">
        <div class="col-md-12">
        @include('includes.error-validate')
            <form action="{{ route('products.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Name:</label>
                      <input type="text" class="form-control" placeholder="Product Name" name="name" id="name" value="{{old('name')}}">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Price In:</label>
                      <input type="number" class="form-control" step="0.001" placeholder="$0.00" name="in_price" id="ip" value="{{old('in_price')}}">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Price Out</label>
                      <input type="number" class="form-control" step="0.001" placeholder="$0.00" name="out_price" id="op" value="{{old('out_price')}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group">
                      <label for="">Description:</label>
                      <textarea rows="5" cols="70" class="form-control" placeholder="Description" name="desc" id="desc"value="{{old('desc')}}" ></textarea>
                    </div>
                  </div>

                </div>
                <br/>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
