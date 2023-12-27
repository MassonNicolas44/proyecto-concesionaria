<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de Vehiculos</title>
</head>

<style>  

table{
    width: 100%;
    text-align:center;
}

th {
    font-size:16px;
}

td {
    font-size:14px;
}

</style>

    <body>
        <h4 class="text-center">Listado de Vehiculos</h4>
        <table class="table-bordered table-striped">
            <thead>
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

            <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td style="width:30px">{{$car->id}}</td>
                        <td>{{$car->brand->name}}</td>
                        <td>{{$car->model}}</td>
                        <td style="width:40px">{{$car->year}}</td>
                        <td>{{$car->engine->description}}</td>
                        <td>{{$car->color}}</td>
                        <td>{{$car->description}}</td>
                        <td style="width:40px">{{$car->stock}}</td>
                        <td>$ {{$car->price}}</td>
                        <td>{{$car->status}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 780, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script>

    </body>
</html>