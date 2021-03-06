
<!DOCTYPE html>
<html lang='en'>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Reportes</title>
      <link rel="stylesheet" href="{{asset('css/cv/cv-bootstrap.css')}}">
  </head>

  <body>
   
    <div>      
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th style="width:20%; text-align: center;"> INFORME :</th>
            <th style="width:60%">Sueldo bruto pretendido por carrera</th>
            <th style="width:15%;text-align: center;">{{$today}}</th>
          </tr>
        </thead>
      </table>

      <div style="width:800px; margin:0 auto;">
        <div id="chartContainer-1" style="height: 350px;"></div>
      </div>
      
      <br>

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th style="width:10%; text-align: center;">#</th>
            <th style="width:60%">Carrera</th>
            <th style="width:30%">Sueldo promedio</th>    
          </tr>
        </thead>
        <tbody>
          @foreach( $SueldoPorCarrera as $key => $carrera )
            <tr>
              <td style="text-align: center;">{{$key + 1}}</td>
              <td>{{$carrera->carrera}}</td>
              <td>{{$carrera->promedio_sueldo}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>

<script src="{{asset('plugins/canvas/canvasjs.min.js')}}"></script>

<script type="text/javascript">
  window.onload = function () {
    @if(count($carrerasConMayorSueldoPretendido) > 0 )
      var array3 = [];
      @foreach( $carrerasConMayorSueldoPretendido as $sueldoCarrera )
           array3.push({y: {{$sueldoCarrera->promedio_sueldo}}, label:"{!!$sueldoCarrera->carrera!!}" });
      @endforeach

      var chart = new CanvasJS.Chart("chartContainer-1", {
        title: {
          text: "Promedio de sueldo bruto pretendido por carrera"
        },
        data: [{
          type: "column",
          yValueFormatString: "$#0.##",
          indexLabel: "{y}",
          dataPoints: array3
        }]
      });
      chart.render();
    @else
      var chart = new CanvasJS.Chart("chartContainer-1", {
          title: {
            text: "No hay datos."
          }
      });
      chart.render();
    @endif
  }

</script>