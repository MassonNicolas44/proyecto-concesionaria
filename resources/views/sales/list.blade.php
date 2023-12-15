@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="container-avatar">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
        
                    @endif
                </div>

                    <div class="card-header">{{ __('Lista de Vehiculos') }}</div>
                        <div class="card-body">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <th>Id</th>
                                    <th>Vehiculo</th>
                                    <th>Cliente</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Precio</th>
                                    <th>Fecha Compra</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($sales as $sale)
                                        <tr>
                                            <td>{{$sale->id}}</td>
                                            <td>{{$sale->car->id}}  --  {{$sale->car->brand->name}} {{$sale->car->model}} {{$sale->car->year}}</td>
                                            <td>{{$sale->user->name}} {{$sale->user->surname}}</td>
                                            <td>{{$sale->user->address}}</td>
                                            <td>{{$sale->user->phone}}</td>
                                            <td>$ {{$sale->car->price}}</td>
                                            <td>{{$sale->created_at}}</td>
                                            <td>
                                                <a href="{{ route('sale.delete',['idSale'=>$sale->id,'idCar'=>$sale->car->id]) }}"="sucess" class="btn  btn-danger btn-sm">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
