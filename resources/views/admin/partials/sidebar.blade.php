<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('home') }}">Ekskul</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">EK</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item {{ Request::route()->getName() == 'administrator/dashboard' ? 'active' : '' }}"><a class="nav-link" href="{{ route('administrator.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

        <li class="menu-header">Data Ekskul</li>
        @if(Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/users' ? 'active' : '' }}"><a href="{{ route('administrator.users.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Pengguna</span></a></li>
        @endif
        @if(Auth::user()->can('manage-rohis') || Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/rohis' ? 'active' : '' }}"><a href="{{ route('administrator.rohis.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Rohis</span></a></li>
        @endif
        @if(Auth::user()->can('manage-pramuka') || Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/pramuka' ? 'active' : '' }}"><a href="{{ route('administrator.pramuka.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Pramuka</span></a></li>
        @endif
        @if(Auth::user()->can('manage-pmr') || Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/pmr' ? 'active' : '' }}"><a href="{{ route('administrator.pmr.index') }}" class="nav-link"><i class="far fa-user"></i> <span>PMR</span></a></li>
        @endif
        @if(Auth::user()->can('manage-silat') || Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/silat' ? 'active' : '' }}"><a href="{{ route('administrator.silat.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Pencak Silat</span></a></li>
        @endif
        @if(Auth::user()->can('manage-volly') || Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/volly' ? 'active' : '' }}"><a href="{{ route('administrator.volly.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Volly</span></a></li>
        @endif
        @if(Auth::user()->can('manage-paskibra') || Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/paskibra' ? 'active' : '' }}"><a href="{{ route('administrator.paskibra.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Paskibra</span></a></li>
        @endif
        @if(Auth::user()->can('manage-futsal') || Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/futsal' ? 'active' : '' }}"><a href="{{ route('administrator.futsal.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Futsal</span></a></li>
        @endif
        @if(Auth::user()->can('manage-marching') || Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/marching' ? 'active' : '' }}"><a href="{{ route('administrator.marching.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Marching</span></a></li>
        @endif
        @if(Auth::user()->can('manage-seni') || Auth::user()->can('manage'))
        <li class="nav-item {{ Request::route()->getName() == 'administrator/seni' ? 'active' : '' }}"><a href="{{ route('administrator.seni.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Seni</span></a></li>
        @endif
    </ul>
  </aside>
