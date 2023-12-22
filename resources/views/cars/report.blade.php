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
    font-size:16px;
}
table {
   width: 100%;
   text-align:center
 
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
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Tipo de Motor</th>
                <th>Color</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Estado</th>
            </thead>

            <tbody class="contenido">
                @foreach($cars as $car)
                <tr>
                    <td>{{$car->id}}</td>
                    <td>{{$car->brand->name}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->year}}</td>
                    <td>{{$car->engine->description}}</td>
                    <td>{{$car->color}}</td>
                    <td>{{$car->description}}</td>
                    <td>{{$car->stock}}</td>
                    <td>{{$car->price}}</td>
                    <td>{{$car->status}}</td>




                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>