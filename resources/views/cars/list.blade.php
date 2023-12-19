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
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Tipo de Motor</th>
                                    <th>Año</th>
                                    <th>Color</th>
                                    <th>Descripcion</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($cars as $car)
                                        <tr>
                                            <td>{{$car->id}}</td>
                                            <td>{{$car->brand->name}}</td>
                                            <td>{{$car->model}}</td>
                                            <td>{{$car->engine->description}}</td>
                                            <td>{{$car->year}}</td>
                                            <td>{{$car->color}}</td>
                                            <td>{{$car->description}}</td>
                                            <td>{{$car->stock}}</td>
                                            <td>{{$car->price}}</td>
                                            <td>{{$car->status}}</td>
                                            <td>
                                                <div class="list">
                                                    @if($car->status=="Habilitado")
                                                        <a href="{{ route('car.list',['id'=>$car->id,'status'=>'Deshabilitado']) }}" ="sucess" class="btn btn-danger btn-sm"> Deshabilitar</a>
                                                    @else
                                                        <a href="{{ route('car.list',['id'=>$car->id,'status'=>'Habilitado']) }}" ="sucess" class="btn btn-success btn-sm"> Habilitar</a>
                                                    @endif
                                                    <a href="{{ route('car.edit',['id'=>$car->id]) }}" ="sucess" class="btn btn-warning btn-sm"> Editar</a>
                                                    <a href="{{ route('car.delete',['id'=>$car->id]) }}"="sucess" class="btn  btn-danger btn-sm">Eliminar</a>
                                                </div>
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
