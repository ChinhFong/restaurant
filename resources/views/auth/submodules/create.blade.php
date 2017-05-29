@extends('layouts.admin')

{{-- @section('header')

@endsection --}}

@section('content')
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-plus"></i> Modules / Create </h1>
  </div>
    {{-- @include('error') --}}
    <div class="row">
        <div class="col-md-12">
        @include('includes.error-validate')
            <form action="{{ route('submodules.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">

                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Submodule Name :</label>
                      <input type="text" class="form-control" placeholder="SubModule Name" name="name" id="name" value="{{ old('name') }}">
                      <input type="hidden" name="mod_id" value="{{ $mod_id or old('mod_id')}}" id="">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Submodule :</label>
                      <input type="text" class="form-control" placeholder="Font awesome" name="fa_desc" id="fa_desc" value="{{ old('fa_desc') }}">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Icon :</label>
                      <input type="text" class="form-control" placeholder="submodule" name="url" id="url" value="{{ old('url_default') }}" disabled>
                      <input type="hidden" name="url_default" value="{{old('url_default')}}" id="url_def">
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
