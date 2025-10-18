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

table{
    width: 100%;
    text-align:center;
}

th {
    font-size:14px;
}

td {
    font-size:12px;
}

</style>

    <body>
        <h3 class="text-center">Listado de Clientes</h3>
        <h5 class="text-right">Fecha: {{ now()->format('d/m/Y') }} | Hora:{{now()->format('H:i')}} Hs</h5> 
        @if (!empty($citySearch))
            <h5 class="text-left">Ciudad:{{$citySearch}} </h4> 
        @endif
        @if (!empty($provinceSearch))
            <h5 class="text-left">Provincia:{{$provinceSearch}} </h4> 
        @endif
        @if (!empty($statusCustomerSearch))
            <h5 class="text-left">Estado:{{$statusCustomerSearch}} </h4> 
        @endif
        <br>
        <table class="table-bordered table-striped">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Provincia</th>
                <th>Estado</th>
            </thead>

            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td style="width:30px">{{$customer->id}}</td>
                    <td>{{$customer->name}} {{$customer->surname}}</td>
                    <td>{{$customer->dni}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->city}}</td>
                    <td>{{$customer->province}}</td>
                    <td>{{$customer->status}}</td>
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