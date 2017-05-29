@extends('layouts.admin')

{{-- @section('header')

@endsection --}}
@section('title','New | Table')
@section('content')
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-plus"></i> Table / Create </h1>
  </div>
    {{-- @include('error') --}}
    <div class="row">
        <div class="col-md-12">
        @include('includes.error-validate')
            <form action="{{ route('tables.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">

                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Table Name :</label>
                      <input type="text" class="form-control" placeholder="Table name" name="name" id="name" value="{{ old('name') }}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="input-group">
                      <label for="">Description :</label>
                      <textarea rows="5" cols="70" class="form-control" placeholder="Description" name="desc" id="desc"value="{{old('desc')}}" ></textarea>
                    </div>
                  </div>

                </div>
                <br/>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('modules.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="{{asset('js/modules.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
