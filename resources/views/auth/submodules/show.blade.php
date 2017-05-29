@extends('layouts.admin')
@section('content')
  <div class="page-header">
          <h1>Sub-Menu of "{{$module->name}}"</h1>

  </div>
    <div class="row">
        <div class="col-md-12">

          @if($submods->count())
              <table class="table table-condensed table-striped">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Url</th>
                          <th>Name</th>
                          <th>Fa_Desc</th>
                          <th class="text-right">OPTIONS</th>
                      </tr>
                  </thead>

                  <tbody>
                      @foreach($submods as $submod)
                          <tr>
                              <td>{{$submod->id}}</td>
                              <td>{{$submod->url}}</td>
                              <td>{{$submod->name}}</td>
                              <td><i class="{{$submod->fa_desc}}"></i> {{$submod->fa_desc}}</td>
                              <td class="text-right">
                                  <a class="btn btn-xs btn-warning" href="{{ route('submodules.edit', $submod->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                  <form action="{{ route('submodules.destroy', $submod->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                      <input type="hidden" name="_method" value="DELETE">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              {{-- {!! $modules->render() !!} --}}
          @else
              <h3 class="text-center alert alert-info">Empty!</h3>
          @endif
          <div class="well well-sm">
            <a class="btn btn-link" href="{{ route('modules.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
          </div>
        </div>
    </div>

@endsection
