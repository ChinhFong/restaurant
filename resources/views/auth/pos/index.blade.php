@extends('layouts.admin')
@section('title','Pos')
@section('content')
  <div class="page-header clearfix">
      <h1>
          <i class="fa fa-cart-arrow-down "></i> P.O.S
          {{-- <a class="btn btn-success pull-right" href="{{ route('tables.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a> --}}
      </h1>

  </div>
    <div class="row">
        <div class="col-md-12">
          <form class="create-form" action="{{route('pointofsale.create')}}" method="get">
            <input type="hidden" name="value" class="btn_value">
            <div class="row">
              @foreach($tables as $table)
                <div class="col-md-1" style="margin:5px; text-align:center;">
                  <input type="button" class="btn btn-lg btn-style" name="value" value="{{$table->name}}">
                </div>
              @endforeach
            </div>
          </form>
        </div>
    </div>
@endsection
@section('scripts')
  <script src="{{asset('js/pos.js')}}">
  </script>
@stop
