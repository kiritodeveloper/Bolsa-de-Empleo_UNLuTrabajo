@extends('template.in_main')

@section('headTitle', 'Mis Propuestas')

@section('bodyIndice')

  <div class="row">
    <div id="breadcrumb" class="col-xs-12">
      <ol class="breadcrumb">
        <li><a>Mis Propuestas</a></li>
      </ol>
    </div>
  </div>

@endsection

@section('bodyContent')

  <div class="row">
    <!-- Box -->
    <div class="box" style="margin-top: -20px">
      <!-- Cuerpo del Box-->
      <div class="box-content dropbox">
        <!-- Titulo del Cuerpo del Box -->
        <h4 class="page-header">Mis Propuestas
          @if(Entrust::can('crear_propuesta_laboral'))
            <a href="{{ route('in.propuestas_laborales.create') }}"  style="margin-top: -5px" class="btn btn-info pull-right">
              <span><i class="fa fa-plus"></i></span>
              Realizar Propuesta
            </a>
          @endif
        </h4>

        @include('flash::message')
        @include('template.partials.errors')

        <div class="row">
          <div class="col-sm-2 buscar">
            <input name="buscar" class="form-control" placeholder="Buscar">
            <span class="fa fa-search iconspan"></span>
          </div>
        </div>

        <div class="anuncios">
          @if(count($mis_propuestas) > 0)
            @foreach($mis_propuestas as $propuesta)
              <a href={{ route('in.propuestas_laborales.detalle', $propuesta->id) }}>
                <div class="anuncio col-md-12">
                  @if(Auth::user()->imagen != null)
                    <div class="avatar-grande col-md-2 text-center logo-anuncio">
                      <img src="{{asset('img/usuarios').'/'.Auth::user()->imagen}}" class="img-rounded" alt="Logo de la Empresa" />
                    </div>
                    <div class="descripcion col-md-10">
                  @else
                    <div class="descripcion col-md-12">
                  @endif
                    <div class="row">
                      <div class="col-md-12 anuncio-titulo">
                        <h2>{{ $propuesta->titulo }}</h2>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 anuncio-subtitulo">
                        <p>{{ Auth::user()->persona->juridica->nombre_comercial }} - {{ $propuesta->lugar_de_trabajo }} - {{ $propuesta->tipoJornada->nombre_tipo_jornada }}</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="detalle col-md-12">
                        <p>{{ $propuesta->descripcion }}</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 anuncio-subtitulo">
                        <p>Publicado: {{ $propuesta->fecha_inicio_propuesta }}</p>
                      </div>
                    </div>
                    </div>
                  </div>
                </a>
            @endforeach
          @else
            <div class="col-md-12 text-center">
              <p>No ha realizado Propuestas.</p>
            </div>
          @endif
          </div>

          <div class="text-center">
           {!! $mis_propuestas->render()!!}
          </div>

      </div>
    </div>
  </div>

@endsection

@section('bodyJS')

  <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('plugins/datatables/ZeroClipboard.js')}}"></script>
  <script src="{{asset('plugins/datatables/TableTools.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}"></script>

@endsection