@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('title','Edit | Table')
@section('content')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Table / Edit #{{$table->name}}</h1>
    </div>
    @include('includes.error-validate')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('tables.update', $table->id) }}" method="POST">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Table Name :</label>
                      <input type="text" class="form-control" placeholder="Table name" name="name" id="name" value="{{ $table->name or old('name') }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group">
                      <label for="">Description :</label>
                      <textarea rows="5" cols="70" class="form-control" placeholder="Description" name="desc" id="desc"value="" >{{ $table->desc or old('desc')}}</textarea>
                    </div>
                  </div>

                </div>
                <br/>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-link pull-right" href="{{ route('tables.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
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
