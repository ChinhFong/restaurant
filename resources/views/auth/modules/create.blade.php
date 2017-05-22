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

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            <form action="{{ route('modules.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Name:</label>
                      <input type="text" class="form-control" placeholder="Module Name" name="name" id="name" value="{{old('name')}}">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">FA_Icon:</label>
                      <input type="text" class="form-control" placeholder="Font Awesome Icon" name="fa_module" id="fa_module"value="{{old('fa_module')}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Sub-Module Name:</label>
                      <input type="text" class="form-control" placeholder="Sub-Module name" name="submod_name" id="url_name" value="{{old('submod_name')}}">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Url_Fa</label>
                      <input type="text" class="form-control" placeholder="FA For Url" name="fa_url" id="fa_url" value="{{old('fa_url')}}">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Default_Url:</label>
                      <input type="text" class="form-control" value="{{old('url_default')}}" placeholder=".index"  name="def" id="url" disabled>
                      <input type="hidden" name="url_default" value="{{old('url_default')}}" id="url_def">
                    </div>
                  </div>
                </div>
                <br/>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('modules.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
