@extends('layouts.admin')
@section('title','Exchnage Rate')
@section('content')
  <div class="page-header clearfix">
      <h1>
          <i class="fa fa-cart-arrow-down "></i> Exchange Rate
          {{-- <a class="btn btn-success pull-right" href="{{ route('tables.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a> --}}
      </h1>

  </div>
    <div class="row">
        <div class="col-md-12">
          <form class="create-form" action="{{route('exchangerate.store')}}" method="POST">
            {{-- {{method_field('PUT')}} --}}
            <input type="hidden" name="id" value="{{$erate->id}}">
            {{csrf_field()}}
            {{-- <input type="hidden" name="value" class="btn_value"> --}}
            <div class="input-group">
              <label for="">Exchange Rate Now: {{$erate->value}} riel/1usd</label>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="input-group">
                  <span class="input-group-addon">Exchange Rate:</span>
                {{ Form::number('value',''.$erate->value,['class'=>'form-control','id'=>'value','min'=>3500])}}
                </div>
              </div>
              <div class="col-md-2">
                <button type="submit" name="button" class="btn btn-primary">Save</button>
              </div>
            </div>

          </form>
        </div>
    </div>
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    $('#value').focusout(function(){
      if($(this).val()==""){
        $(this).val(3500);
      }
    });
  });
</script>

@stop
