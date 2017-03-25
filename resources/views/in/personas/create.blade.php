@extends('template.in_main')

@section('headTitle', 'Personas | Registrar Persona')

@section('bodyIndice')

  <div class="row">
    <div id="breadcrumb" class="col-xs-12">
      <ol class="breadcrumb">
        <li><a>Personas</a></li>
        <li><a>Registrar Persona</a></li>
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
        <h4 class="page-header">Registro de Persona</h4>

        <!-- Mostrar Mensaje -->
        @include('flash::message')
        @include('template.partials.errors')

        <!-- Formulario -->
        {!! Form::open(['route' => 'in.personas.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

          <div class="form-group">
            {!! Form::label('nombre_persona','Nombre', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('nombre_persona',null,['class' => 'form-control', 'placeholder' => 'Nombre', 'data-toggle' => "tooltip", 'data-placement' => "bottom", 'required'])!!}
            </div>
            {!! Form::label('apellido_persona','Apellido', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('apellido_persona',null,['class' => 'form-control', 'placeholder' => 'Apellido', 'data-toggle' => "tooltip", 'data-placement' => "bottom", 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('fecha_nacimiento_persona','Fecha Nacimiento', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
              {!! Form::text('fecha_nacimiento_persona', null, ['id' => 'input_date', 'class' => 'form-control', 'placeholder' => 'dd/mm/aaaa', 'required'])!!}
            </div>
            {!! Form::label('tipo_documento_persona','Documento', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
              {!! Form::select('tipo_documento_persona',['' => '', 'DNI' => 'DNI', 'LC' => 'LC', 'CI' => 'CI'], null, ['class' =>'populate placeholder', 'id' => 'selectSimple', 'required'])!!}
            </div>
            <div class="col-sm-4">
              {!! Form::text('nro_documento_persona', null, ['class' => 'form-control', 'placeholder' => 'N°Documento', 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('domicilio_residencia_persona','Domicilio', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('domicilio_residencia_persona', null, ['class' => 'form-control', 'placeholder' => 'Calle - Numero', 'required'])!!}
            </div>
              {!! Form::label('localidad_residencia_persona','Localidad', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('localidad_residencia_persona', null, ['class' => 'form-control', 'placeholder' => 'Localidad', 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('provincia_residencia_persona','Residencia', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-5">
              {!! Form::text('provincia_residencia_persona', null, ['class' => 'form-control', 'placeholder' => 'Provicia', 'required'])!!}
            </div>
            <div class="col-sm-5">
              {!! Form::text('pais_residencia_persona', null, ['class' => 'form-control', 'placeholder' => 'Pais', 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('telefono_contacto_persona','Telefono', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-5">
              {!! Form::text('telefono_contacto_persona', null, ['class' => 'form-control', 'placeholder' => 'Telefono', 'required'])!!}
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

        <a href="{{ route('in.personas.index') }}"  style="margin-top: -5px" class="btn btn-info pull-right">
          <span><i class="fa fa-reply"></i></span>
          Volver a la Tabla
        </a>
      </div>
    </div>
  </div>

@endsection

@section('bodyJS')

  <script type="text/javascript">

    $(document).ready(function() {
      // Fecha Nac.
      $('#input_date').datepicker({setDate: new Date()});

      // Select
      $('#selectSimple').select2({
        placeholder: "Tipo"
      });
    });

    <!-- Cambiar el idioma de datepiker -->
    $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '< Ant',
      nextText: 'Sig >',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
      weekHeader: 'Sm',
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $(function () {
      $("#fecha").datepicker();
    });

  </script>

@endsection
