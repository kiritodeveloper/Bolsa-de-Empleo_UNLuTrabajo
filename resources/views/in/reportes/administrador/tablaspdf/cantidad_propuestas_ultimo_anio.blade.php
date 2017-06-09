
<!DOCTYPE html>
<html lang='en'>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Reportes</title>
      <link rel="stylesheet" href="{{asset('css/style-table.css')}}">
  </head>

  <body>
   
    <div>      
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th align="center" style="width:20%"> INFORME :</th>
            <th style="width:60%">Cantidad de Propuestas generadas en el último año</th>
            <th align="center" style="width:15%">{{$today}}</th>
          </tr>
        </thead>
      </table>

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th align="center" style="width:10%">#</th>
            <th style="width:60%">Mes</th>
            <th style="width:30%">Cantidad de Propuestas</th>    
          </tr>
        </thead>
        <tbody>
          @foreach($reporteMes as $key => $reporte)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$reporte['mes']}}</td>
                <td>{{$reporte['cantidad']}}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>