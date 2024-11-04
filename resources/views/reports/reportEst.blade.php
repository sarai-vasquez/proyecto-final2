<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reporte de estados</title>
        <style> 
            table { 
                width: 100%; font-size: 
                18px; border:1px solid
                black; border-collapse: 
                collapse; 
                } th { 
                background-color: burlywood; 
                border:1px solid black; 
                } td { 
                border:1px solid black; 
            } 
        </style>
    </head>
    <body>
        <h1 align="center">Listado de estados</h1>
        <hr><br> 
        <p>Reporte generado el {{ date('d/m/Y') }} Por {{ Auth::user()->name }}</p>
        <table>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
            </tr> 
            @foreach ($data as $item) 
                <tr>
                    <td align="center" style="background-color: bisque">{{$item['codigo']}}</td>
                    <td>{{$item['nombre']}}</td>
                </tr> 
            @endforeach 
        </table> 
    </body>
</html>