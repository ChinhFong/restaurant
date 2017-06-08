<form class="edit-qty" action="{{route('pointofsale.update',$pos->id)}}" method="Post" style="display: inline;">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
  {{Form::hidden('inv',$inv,['class'=>'inv_id'])}}
  <div class="modal fade bs-example-modal-sm{{$pos->id}}-qty" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" name="update_qty" value="1">
          <input type="hidden" name="product" value="{{$product->id}}">
        </div>
        <div class="modal-body">
          <div class="input-group">
            <span class="input-group-addon">Name:</span>
            <input type="text" class="form-control" placeholder="" value="{{$product->name}}" disabled="true">
          </div>

          <br/>
          <div class="input-group">
            <span class="input-group-addon">Qty:</span>
            {{ Form::number('qty_update','1',['class'=>'form-control qty-update','id'=>'qty-update','min'=>1])}}
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="update-qty btn btn-success" name="button">Update</button>
          <button type="button" class="btn btn-warning cancel" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</form>
<form class="edit-order" action="{{route('pointofsale.update',$pos->id)}}" method="Post" style="display: inline;">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
  {{Form::hidden('inv',$inv,['class'=>'inv_id'])}}
  <div class="modal fade bs-example-modal-sm{{$pos->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" name="update_qty" value="0">
          <input type="hidden" name="product" value="{{$product->id}}">
        </div>
        <div class="modal-body">
          <div class="form-group">
            {{ Form::label('product','Food & Beverage :')}}
            {{ Form::select('product',['0'=>'Choose you foods']+$products,0,['class'=>'form-control select_opt_edit']) }}
          </div>
          <div class="input-group">
            <span class="input-group-addon">Qty:</span>
            {{ Form::number('qty_update','1',['class'=>'form-control qty-update','id'=>'qty-update','min'=>1])}}
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="update-order btn btn-success" name="button">Update</button>
          <button type="button" class="btn btn-warning cancel" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</form>
