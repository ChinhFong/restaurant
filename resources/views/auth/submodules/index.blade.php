@extends('layouts.admin')
@section('title','Sub-Modules')
@section('content')
  <div class="page-header clearfix">
      <h1>
          <i class="glyphicon glyphicon-align-justify"></i> SubModules
          <a class="btn btn-success pull-right" href="{{ route('modules.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
      </h1>

  </div>
    <div class="row">
        <div class="col-md-12">
            @if($modules->count())
                <table id="dataTable" class="display table table-condensed table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Fa_Desc</th>
                          <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($mods as $module)
                          <tr>
                              <td>{{$module->id}}</td>
                              <td>{{$module->name}}</td>
                              <td><i class="{{$module->fa_desc}}"></i> {{$module->fa_desc}}</td>
                              <td class="text-right">
                                  <a class="btn btn-xs btn-primary" href="{{ route('modules.show', $module->id) }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                  <a class="btn btn-xs btn-warning" href="{{ route('modules.edit', $module->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                  <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                      <input type="hidden" name="_method" value="DELETE">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
                {{-- <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Fa_Desc</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($mods as $module)
                            <tr>
                                <td>{{$module->id}}</td>
                                <td>{{$module->name}}</td>
                                <td><i class="{{$module->fa_desc}}"></i> {{$module->fa_desc}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('modules.show', $module->id) }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('modules.edit', $module->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
                {{-- {!! $modules->render() !!} --}}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
@section('scripts')
  <script>
  $(document).ready(function() {
      $('#dataTable').DataTable();
  } );
  </script>
@stop
