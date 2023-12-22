<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de Clientes</title>
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
        <h3 class="text-center">Listado de Clientes</h3>
        <table class="table-bordered table-striped">
            <thead class="cabezera">
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>CP</th>
                <th>Ciudad</th>
                <th>Provincia</th>
                <th>Estado</th>
            </thead>

            <tbody class="contenido">
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}} {{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->postalCode}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->province}}</td>
                    <td>{{$user->status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>