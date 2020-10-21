{{-- Para que los iconos funcionen y se muestren se necesita importar
    las siguientes librerias en el master.blade.php
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha256-m/h/cUDAhf6/iBRixTbuc8+Rg2cIETQtPcH9D3p2Kg0=" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" /> 
    --}}
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="{{url('/')}}">
        <span class="oi oi-dashboard" aria-hidden="true"></span>
        Videoclub
    </a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    @if( Auth::check() )
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item" {{ Request::is('catalog*') && !Request::is('catalog/create')? ' class=active' : ''}}>
            <a class="nav-link" href="{{ url('/catalog') }}">
                <span class="oi oi-play-circle" aria-hidden="true"></span>
                Catálogo
            </a>
        </li>
        <li class="nav-item" {{ Request::is('catalog/create') ? ' class=active' : ''}}>
            <a class="nav-link" href="{{ url('/catalog/create') }}">
                <span class="oi oi-plus" aria-hidden="true"></span>
                Nueva película
            </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
            <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="oi oi-power-standby" aria-hidden="true"></span>
                Cerrar sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
    </ul>
    </div>
    @endif
  </nav>