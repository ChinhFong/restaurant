@extends('layouts.admin')
@section('title','Edit|Products')

@section('content')
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-edit"></i> Products / Edit :{{$product->name}}</h1>
  </div>
  @include('includes.error-validate')
  <form  action="{{route('products.update', $product->id )}}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    <div class="row">
      <div class="col-md-3">
        <div class="input-group">
          {{-- <span class="input-group-addon">Name</span> --}}
          <label for="">Name:</label>
          <input type="text" class="form-control" placeholder="Product Name" name="name" id="name" value="{{ $product->name or old('name') }}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="input-group">
          {{-- <span class="input-group-addon">Name</span> --}}
          <label for="">Price In:</label>
          <input type="number" class="form-control" step="0.01" placeholder="$0.00" name="in_price" id="ip" value="{{ $product->in_price or old('in_price')}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="input-group">
          {{-- <span class="input-group-addon">Name</span> --}}
          <label for="">Price Out</label>
          <input type="number" class="form-control" step="0.01" placeholder="$0.00" name="out_price" id="op" value="{{ $product->out_price or old('out_price')}}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <label for="">Description:</label>
          <textarea rows="5" cols="70" class="form-control" placeholder="Description" name="desc" id="desc">{{ $product->desc or old('desc')}}</textarea>
        </div>
      </div>

    </div>
    <br/>
    <div class="well well-sm">
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-link pull-right" href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
    </div>
  </form>
@endsection

@section('scripts')

@endsection
