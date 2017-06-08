<a class="btn btn-xs btn-warning" href="#" data-toggle="modal" data-target=".bs-example-modal-sm{{$pos->id}}" data-keyboard="false" data-backdrop="static"><i class="glyphicon glyphicon-edit edit_btn"></i></a>
<form action="{{ route('pointofsale.destroy', $pos->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
  {{ method_field('DELETE') }}
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
</form>
