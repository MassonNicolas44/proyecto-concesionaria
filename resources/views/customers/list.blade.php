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

                    <div class="card-header">{{ __('Lista de Clientes') }}</div>
                        <div class="card-body">

                        <div class="report">
                            <a href="{{ route('customer.report')}}" ="sucess" class="btn btn-info">Generar Informe</a>
                        </div>

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>CP</th>
                                    <th>Ciudad</th>
                                    <th>Provincia</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </thead>

                                <tbody>
                                    @foreach($customers as $customer)  
                                        <tr>
                                            <td>{{$customer->id}}</td>
                                            <td>{{$customer->name}} {{$customer->surname}}</td>
                                            <td>{{$customer->dni}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->address}}</td>
                                            <td>{{$customer->postalCode}}</td>
                                            <td>{{$customer->city}}</td>
                                            <td>{{$customer->province}}</td>
                                            <td>{{$customer->status}}</td>
                                            <td>
                                                <div class="listCustomer">
                                                    @if($customer->status=="Habilitado")
                                                        <a href="{{ route('customer.list',['id'=>$customer->id,'status'=>'Deshabilitado']) }}" ="sucess" class="btn btn-danger btn-sm"> Deshabilitar</a>
                                                    @else
                                                        <a href="{{ route('customer.list',['id'=>$customer->id,'status'=>'Habilitado']) }}" ="sucess" class="btn btn-success btn-sm"> Habilitar</a>
                                                    @endif
                                                    <a href="{{ route('customer.edit',['id'=>$customer->id]) }}" class="btn btn-warning btn-sm"> Editar </a>
                                                    <a href="{{ route('customer.delete',['id'=>$customer->id]) }}" class="btn btn-danger btn-sm"> Eliminar </a>
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
