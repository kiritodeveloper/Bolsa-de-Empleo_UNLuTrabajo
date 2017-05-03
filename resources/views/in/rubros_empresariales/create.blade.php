@extends('template.in_main')

@section('headTitle', 'Rubros Empresariales | Registrar Rubro Empresarial')

@section('bodyIndice')

  <div class="row">
    <div id="breadcrumb" class="col-xs-12">
      <ol class="breadcrumb">
        <li><a>Rubros Empresariales</a></li>
        <li><a>Registrar Rubro Empresarial</a></li>
      </ol>
    </div>
  </div>

@endsection

@section('bodyContent')

  <div class="row" style="margin-top:-20px">
    <!-- Box -->
    <div class="box">
      <!-- Cuerpo del Box-->
      <div class="box-content dropbox">
        <h4 class="page-header">Registro de Rubro Empresarial</h4>

        <!-- Mostrar Mensaje -->
        @include('flash::message')
        @include('template.partials.errors')

        <!-- Formulario -->
        {!! Form::open(['route' => 'in.rubros-empresariales.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

      		<div class="form-group">
      			{!! Form::label('nombre_rubro_empresarial','Nombre Rubro Empresarial', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('nombre_rubro_empresarial',null,['class' => 'form-control', 'placeholder' => 'Nombre Rubro Empresarial', 'required'])!!}
            </div>
      		</div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
              <button type="submit" class="btn btn-primary btn-label-left">
                <span><i class="fa fa-check-square"></i></span>
                Aceptar
              </button>
            </div>
            <div class="col-sm-2">
              <button type="reset" class="btn btn-default btn-label-left">
                <span><i class="fa fa-times-circle txt-danger"></i></span>
                Borrar
              </button>
            </div>
          </div>

      	{!! Form::close()!!}

        <a href="{{ route('in.rubros-empresariales.index') }}"  style="margin-top: -5px" class="btn btn-info pull-right">
          <span><i class="fa fa-reply"></i></span>
          Volver a la Tabla
        </a>
      </div>
    </div>
  </div>

@endsection
