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

                    <div class="card-header">{{ __('Lista de Usuarios') }}</div>
                        <div class="card-body">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>CP</th>
                                    <th>Ciudad</th>
                                    <th>Provincia</th>
                                    <th>Acción</th>
                                </thead>

                                <tbody>
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
                                            <td>
                                                <div class="listUser">
                                                    <a href="{{ route('user.editUser',['id'=>$user->id]) }}" class="btn btn-warning btn-sm"> Editar </a>
                                                    <a href="" class="btn btn-danger btn-sm"> Eliminar </a>
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
