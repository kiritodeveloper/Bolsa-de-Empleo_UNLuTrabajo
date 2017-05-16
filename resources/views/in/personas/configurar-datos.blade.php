@extends('template.in_main')

@section('headTitle', 'UNLu Trabajo | Datos Personales')

@section('bodyIndice')

  <div class="row">
    <div id="breadcrumb" class="col-xs-12">
      <ol class="breadcrumb">
        <li><a>Datos Personales</a></li>
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
        <h4 class="page-header">Datos Personales - {{$pfisica->nombre_persona}} {{$pfisica->apellido_persona}}</h4>

        <!-- Mostrar Mensaje -->
        @include('flash::message')
        @include('template.partials.errors')

        <!-- Formulario -->
        {!! Form::open(['route' => ['in.configurar-datos-persona'], 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) !!}

          <div class="form-group">
            {!! Form::label('domicilio_residencia','Domicilio', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('domicilio_residencia', $pfisica->persona->direccion->domicilio, ['class' => 'form-control', 'placeholder' => 'Calle - Numero', 'required'])!!}
            </div>
              {!! Form::label('localidad_residencia','Localidad', ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('localidad_residencia', $pfisica->persona->direccion->localidad, ['class' => 'form-control', 'placeholder' => 'Localidad', 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('provincia_residencia','Provincia', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('provincia_residencia', $pfisica->persona->direccion->provincia, ['class' => 'form-control', 'placeholder' => 'Provicia', 'required'])!!}
            </div>
            {!! Form::label('pais_residencia','Pais', ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-4">
              {!! Form::text('pais_residencia', $pfisica->persona->direccion->pais, ['class' => 'form-control', 'placeholder' => 'Pais', 'required'])!!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('telefono_fijo','Teléfono Fijo', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              @if ($telefono_fijo == '')
                {!! Form::text('telefono_fijo', null, ['class' => 'form-control', 'placeholder' => 'Telefono Fijo'])!!}
              @else
                {!! Form::text('telefono_fijo', $telefono_fijo, ['class' => 'form-control', 'placeholder' => 'Telefono Fijo'])!!}
              @endif
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('telefono_celular','Teléfono Celular', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
              @if ($telefono_celular == '')
                  {!! Form::text('telefono_celular', null, ['class' => 'form-control', 'placeholder' => 'Telefono Celular'])!!}
              @else
                  {!! Form::text('telefono_celular', $telefono_celular, ['class' => 'form-control', 'placeholder' => 'Telefono Celular'])!!}
              @endif
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('imagen','Imagen', ['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-4">
              <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-12">
                      {!!Form::hidden('img_default',asset('/img/fotoPerfil.jpg'),['id' => 'img_default'])!!}
                      {!!Form::hidden('imagen_cambiada',0,['id' => 'imagen_cambiada'])!!}
                      @if ((Auth::user()->imagen == null))
                        {!!Form::hidden('img_usuario_anterior',asset('/img/fotoPerfil.jpg'),['id' => 'img_usuario_anterior'])!!}
                        <div class="avatar-grande">
                          <img id="imagen_usuario" src={{asset('/img/fotoPerfil.jpg')}} class='img-rounded' alt="Avatar" />
                        </div>
                      @else
                        {!!Form::hidden('img_usuario_anterior',asset('img/usuarios'.'/'.Auth::user()->imagen),['id' => 'img_usuario_anterior'])!!}
                        <div class="avatar-grande">
                          <img id="imagen_usuario" src={{asset('img/usuarios'.'/'.Auth::user()->imagen)}} class='img-rounded' alt="Avatar" />
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="row eliminar_imagen">
                    <div class="col-sm-12">
                      <span class="fa fa-trash-o" aria-hidden="true"><a>Eliminar Imagen</a></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="imagen-info">
                    <p>La imagen debe ser jpeg, png, bmp, gif, o svg y no pesar más de 500kb</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  {!! Form::file('imagen', ['id' => 'imgInp']) !!}
                </div>
              </div>
              <div class="row error-imagen">
                <div class="col-sm-12">
                  <span>La imagen debe pesar menos de 500kb</span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
              <button type="submit" class="btn btn-info btn-label-left">
                <span><i class="fa fa-check-square"></i></span>
                Modificar
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

      </div>
    </div>
  </div>


@endsection

@section('bodyJS')

  <script type="text/javascript">

    function restablecer (pfisica){
      $("input[name='domicilio_residencia']").val(pfisica['domicilio_residencia']);
      $("input[name='localidad_residencia']").val(pfisica['localidad_residencia']);
      $("input[name='provincia_residencia']").val(pfisica['provincia_residencia']);
      $("input[name='pais_residencia']").val(pfisica['pais_residencia']);
      $("input[name='telefono_fijo']").val(pfisica['telefono_fijo']);
      $("input[name='telefono_celular']").val(pfisica['telefono_celular']);
    }

    $(document).ready(function() {

      //Valores para restableces.
      var pfisica = [];
      pfisica['domicilio_residencia'] = "{{$pfisica->persona->direccion->domicilio}}";
      pfisica['localidad_residencia'] = "{{$pfisica->persona->direccion->localidad}}";
      pfisica['provincia_residencia'] = "{{$pfisica->persona->direccion->provincia}}";
      pfisica['pais_residencia'] = "{{$pfisica->persona->direccion->pais}}";
      pfisica['telefono_fijo'] = "{{$telefono_fijo}}";
      pfisica['telefono_celular'] = "{{$telefono_celular}}";

      function readURL(input) {
        if (input.files && input.files[0]) {
          if (input.files[0].size > 512000) {
            $('.error-imagen').css('visibility', 'visible');
            $('#imgInp').val(null);
            $('#imagen_cambiada').val(0);
          }
          else {
            $('#imagen_cambiada').val(1);
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#imagen_usuario').attr('src', e.target.result);
              $('.error-imagen').css('visibility', 'hidden');
            }

            reader.readAsDataURL(input.files[0]);
          }
        }
      }

      $("#imgInp").change(function(){
          readURL(this);
      });

      $('.eliminar_imagen').click(function() {
        $('#imgInp').val(null);
        $('#imagen_usuario').attr('src', $('#img_default').val());
        $('#imagen_cambiada').val(1);
      });

      $('#reset').click(function() {
        $('#imgInp').val();
        $('#imagen_usuario').attr('src', $('#img_usuario_anterior').val());
        $('#imagen_cambiada').val(0);
        restablecer(pfisica);
      });

    });

  </script>

@endsection
