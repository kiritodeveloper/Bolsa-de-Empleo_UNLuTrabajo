<div id="screensaver">
  <canvas id="canvas"></canvas>
  <i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
  <div class="devoops-modal">
    <div class="devoops-modal-header">
      <div class="modal-header-name">
        <span>Basic table</span>
      </div>
      <div class="box-icons">
        <a class="close-link">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>
    <div class="devoops-modal-inner">
    </div>
    <div class="devoops-modal-bottom">
    </div>
  </div>
</div>
<header class="navbar">
  <div class="container-fluid expanded-panel">
    <div class="row">
      <div id="logo" class="col-xs-12 col-sm-2">
        <a href="index.html">UNLu Trabajo</a>
      </div>
      <div id="top-panel" class="col-xs-12 col-sm-10">
        <div class="row">
          <div class="col-xs-8 col-sm-4">
            <a href="#" class="show-sidebar">
              <i class="fa fa-bars"></i>
            </a>
            @if(Entrust::hasRole('estudiante'))
              <div id="search">
                <input type="text" placeholder="Buscar"/>
                <i class="fa fa-search"></i>
              </div>
            @endif
          </div>
          <div class="col-xs-4 col-sm-8 top-panel-right">
            <ul class="nav navbar-nav pull-right panel-menu">
              @if(Entrust::hasRole('estudiante'))  
                <li class="hidden-xs">
                  <a href="index.html" class="modal-link">
                    <i class="fa fa-bell"></i>
                    <span class="badge">7</span>
                  </a>
                </li>
              @endif
              <li class="dropdown">
                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                  @if(Auth::user()->imagen != null)
                    <div class="avatar">
                      <img src="{{asset('img/usuarios').'/'.Auth::user()->imagen}}" class="img-rounded" alt="avatar" />
                    </div>
                  @else
                    <div class="avatar">
                      <img src="{{asset('/img/fotoPerfil.jpg')}}" class="img-rounded" alt="avatar" />
                    </div>
                  @endif
                  <i class="fa fa-angle-down pull-right"></i>
                  <div class="user-mini pull-right">
                    <span class="welcome">Bienvenido,</span>
                    <span>{{ Auth::user()->nombre_usuario }}</span>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-user"></i>
                      <span class="hidden-sm text">Perfil</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-cog"></i>
                      <span class="hidden-sm text">Configuración</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('auth.logout')}}">
                      <i class="fa fa-power-off"></i>
                      <span class="hidden-sm text">Logout</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
