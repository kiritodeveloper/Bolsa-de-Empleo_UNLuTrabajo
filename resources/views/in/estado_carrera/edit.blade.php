@extends('template.in_main')

@section('headTitle', 'UNLu Trabajo | Estados de Carrera | Editar Estado de Carrera')

@section('bodyIndice')

  <div class="row">
    <div id="breadcrumb" class="col-xs-12">
      <ol class="breadcrumb">
        <li><a>Estados de Carrera</a></li>
        <li><a>Editar Estado de Carrera</a></li>
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
        <h4 class="page-header">Editar Estado de Carrera - {{$estado_carrera->nombre_estado_carrera}} </h4>

        <!-- Mostrar Mensaje -->
        @include('flash::message')
        @include('template.partials.errors')

        <!-- Formulario -->
        {!! Form::open(['route' => ['in.estado_carrera.update', $estado_carrera], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

          <div class="form-group">
            {!! Form::label('nombre_estado_carrera','Nombre Estado Carrera', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('nombre_estado_carrera', $estado_carrera->nombre_estado_carrera,['class' => 'form-control', 'placeholder' => 'Nombre Estado Carrera', 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('estado','Estado', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::select('estado', ['' => '','activo'=>'Activo', 'inactivo'=>'Inactivo'], $estado_carrera->estado, ['class'=>'populate placeholder', 'id'=>'selectEstado'] ) !!}﻿
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
              <button type="submit" class="btn btn-info btn-label-left">
                <span><i class="fa fa-check-square"></i></span>
                Aceptar
              </button>
            </div>
            <div class="col-sm-2">
              <button type="button" class="btn btn-default btn-label-left" id="reset">
                <span><i class="fa fa-times-circle txt-danger"></i></span>
                Restablecer
              </button>
            </div>
          </div>

        {!! Form::close()!!}

        <a href="{{ route('in.estado_carrera.index') }}"  style="margin-top: -5px" class="btn btn-info pull-right">
          <span><i class="fa fa-reply"></i></span>
          Volver al Listado
        </a>
      </div>
    </div>
  </div>

@endsection

@section('bodyJS')

  <script type="text/javascript">

    function restablecer (estado_carrera){
      $("input[name='nombre_estado_carrera']").val(estado_carrera['nombre_estado_carrera']);
      $('#selectEstado').select2().select2("val", estado_carrera['estado']);
      $('#selectEstado').select2();
    }

    $(document).ready(function() {

      var estado_carrera = [];
      estado_carrera['nombre_estado_carrera'] = "{{$estado_carrera->nombre_estado_carrera}}";
      estado_carrera['estado'] = "{{$estado_carrera->estado}}";

      $('#selectEstado').select2({
        placeholder: "Estado"
      });

      $("#reset").on("click", function() {
        restablecer(estado_carrera);
      });

    });
  </script>

@endsection
