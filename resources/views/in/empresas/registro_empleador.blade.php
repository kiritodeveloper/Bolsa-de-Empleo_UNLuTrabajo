@extends('template.in_main')

@section('headTitle', 'Nuevo Empleador')

@section('bodyIndice')

  <div class="row">
    <div id="breadcrumb" class="col-xs-12">
      <ol class="breadcrumb">
        <li><a>Nuevo Empleador</a></li>
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
        <h4 class="page-header">Nuevo Empleador</h4>

        <!-- Mostrar Mensaje -->
        @include('flash::message')
        @include('template.partials.errors')

        <!-- Formulario -->
        {!! Form::open(['route' => 'in.registro-empleador', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

          <div class="form-group">
            {!! Form::label('nombre_comercial','Nombre Comercial', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('nombre_comercial',null,['class' => 'form-control', 'placeholder' => 'Nombre Comercial', 'data-toggle' => "tooltip", 'data-placement' => "bottom", 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('fecha_fundacion','Fecha Fundacion', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
              {!! Form::text('fecha_fundacion', null, ['id' => 'input_date', 'class' => 'form-control', 'placeholder' => 'dd/mm/aaaa', 'required'])!!}
            </div>
            {!! Form::label('rubro_empresarial','Rubro Empresarial', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
              <select name="rubro_empresarial" class="populate placeholder" id="selectSimple" required>
                <option value=""></option>
                @foreach($rubros_empresariales as $rubro_empresarial)
                  <option value="{{$rubro_empresarial->id}}">{{$rubro_empresarial->nombre_rubro_empresarial}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('cuit','Cuit', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('cuit', null, ['class' => 'form-control', 'placeholder' => 'Cuit', 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('domicilio_residencia','Domicilio', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('domicilio_residencia', null, ['class' => 'form-control', 'placeholder' => 'Calle - Numero', 'required'])!!}
            </div>
              {!! Form::label('localidad_residencia','Localidad', ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('localidad_residencia', null, ['class' => 'form-control', 'placeholder' => 'Localidad', 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('provincia_residencia','Provincia', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('provincia_residencia', null, ['class' => 'form-control', 'placeholder' => 'Provincia', 'required'])!!}
            </div>
            {!! Form::label('pais_residencia','Pais', ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('pais_residencia', null, ['class' => 'form-control', 'placeholder' => 'Pais', 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('telefono_fijo','Teléfono Fijo', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('telefono_fijo', null, ['class' => 'form-control', 'placeholder' => 'Telefono Fijo'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('telefono_celular','Teléfono Celular', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('telefono_celular', null, ['class' => 'form-control', 'placeholder' => 'Telefono Celular'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('nombre_usuario','Nombre Usuario', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('nombre_usuario',null,['class' => 'form-control', 'placeholder' => 'Nombre Usuario', 'data-toggle' => "tooltip", 'data-placement' => "bottom", 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('email','E-mail', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@correo.com', 'required'])!!}
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

        <a href="{{ route('in.index') }}"  style="margin-top: -5px" class="btn btn-info pull-right">
          <span><i class="fa fa-reply"></i></span>
          Volver
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
        placeholder: "Rubro"
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
      dateFormat: 'dd-mm-yy',
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
