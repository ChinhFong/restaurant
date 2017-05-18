<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="navbar-default sidebar" role="navigation" style="background-color:white;">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                <?php
                  $user = Auth::user();
                  $ur = $user->role;
                ?>
            </li>
            @foreach($modules as $module)
              @if ($ur->id!=2 && $module->name=="Modules")
                <?php continue; ?>
              @endif
            <li>
                <a href="#"><i class="{{$module->fa_desc}}"></i> {{$module->name}}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @foreach ($module->submodules as $submod )
                      <li>
                          <a href="{{ route ($submod->url)}}"><i class="{{$submod->fa_desc}}"></i> {{$submod->name}}</a>
                      </li>
                    @endforeach
                </ul>

                <!-- /.nav-second-level -->
            </li>
            @endforeach
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
{{-- <div class="collapse navbar-collapse navbar-ex1-collapse" id="accordion">
    <ul class="nav navbar-nav side-nav style-nav">
        <li class="active">
            <a href="/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        @foreach($modules as $module)
        <li>
            <a href="javascript:;" data-toggle="collapse" data-parent="#accordion" data-target="#demo{{$module->id}}"><i class="{{$module->fa_desc}}"></i> {{ $module->name }} <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo{{$module->id}}" class="collapse">
                @foreach ($module->urls as $mourl )
                  <li>
                      <a href="{{ route ($mourl->url)}}"><i class="{{$mourl->fa_desc}}"></i> {{$mourl->name}}</a>
                  </li>
                @endforeach
            </ul>
        </li>
        @endforeach

    </ul>
</div> --}}
