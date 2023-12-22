<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de Ventas</title>
</head>

<style>  

.cabezera{
    font-size:18px;
}

table {
   width: 100%;
   text-align:center; 
}

.contenido{
    font-size:14px;
}
</style>

    <body>
        <h3 class="text-center">Listado de Ventas</h3>
        <table class="table-bordered table-striped">
            <thead class="cabezera">
                <th>Id</th>
                <th>Vehiculo</th>
                <th>Cliente</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Fecha Compra</th>
            </thead>

            <tbody class="contenido">
                @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->id}}</td>
                    <td>({{$sale->car->id}})  {{$sale->car->brand->name}} {{$sale->car->model}} {{$sale->car->year}}</td>
                    <td>({{$sale->user->id}})  {{$sale->user->name}} {{$sale->user->surname}}</td>
                    <td>$ {{$sale->car->price}}</td>
                    <td>{{$sale->status}}</td>
                    <td>  {{$sale->created_at->format('d-m-Y')}}  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>