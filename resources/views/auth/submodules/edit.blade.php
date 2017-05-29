@extends('layouts.admin')
@section('title','Edit|Submodule')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection

@section('content')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Submodule / Edit #{{$submod->name}}</h1>
    </div>
    @include('includes.error-validate')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('submodules.update', $submod->id) }}" method="POST">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Submodule</label>
                      <input type="text" class="form-control" placeholder="Module Name" name="url" id="url" value="{{ $submod->url or old('name')}}">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Submodule Name:</label>
                      <input type="text" class="form-control" placeholder="Module Name" name="name" id="name" value="{{$submod->name or old('name')}}">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      {{-- <span class="input-group-addon">Name</span> --}}
                      <label for="">Icon :</label>
                      <input type="text" class="form-control" placeholder="fa fa .." name="fa_desc" id="fa_desc" value="{{$submod->fa_desc or old('name')}}">
                    </div>
                  </div>
                </div>
                <br/>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-link pull-right" href="{{ route('modules.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
