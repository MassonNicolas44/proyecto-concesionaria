@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
@include('includes.message')

                    <div class="card-header">{{ __('Lista de Personal Administrativo') }}</div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Cod. Ingreso</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Rol</th>
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
                                    @foreach($users as $user)  
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->loginCode}}</td>
                                            <td>{{$user->name}} {{$user->surname}}</td>
                                            <td>{{$user->dni}}</td>
                                            <td>{{$user->rol}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->postalCode}}</td>
                                            <td>{{$user->city}}</td>
                                            <td>{{$user->province}}</td>
                                            <td>{{$user->status}}</td>
                                            <td>
                                                <div class="listUser">
                                                    <!-- Validacion del estado del Personal Administrativo -->
                                                    @if($user->status=="Habilitado")
                                                        <a href="{{ route('user.list',['id'=>$user->id,'status'=>'Deshabilitado']) }}" ="sucess" class="btn btn-danger btn-sm"> Deshabilitar</a>
                                                    @else
                                                        <a href="{{ route('user.list',['id'=>$user->id,'status'=>'Habilitado']) }}" ="sucess" class="btn btn-success btn-sm"> Habilitar</a>
                                                    @endif
                                                    <a href="{{ route('user.edit',['id'=>$user->id]) }}" class="btn btn-warning btn-sm"> Editar </a>
                                                    <a href="{{ route('user.delete',['id'=>$user->id]) }}" class="btn btn-danger btn-sm"> Eliminar </a>
                                                    
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
@include('includes.footer')
@endsection
