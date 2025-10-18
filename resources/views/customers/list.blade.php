@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
@include('includes.message')

                <div class="card-header">{{ __('Lista de Clientes') }}</div>
                    <div class="card-body">
                        
                        <form method="GET" action="{{ route('customer.list') }}">
                            @csrf
                                <div class="homeFilter align-items-center">
                                    <label class="filter-title"><b>Filtrar por:</b></label>
                                    <div class="filter-group">
                                        <label for="city" class="col-md-0 col-form-label text-md-end">Ciudad</label>
                                        <select id="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" value="{{ old('city') }}" name="city"/>
                                            <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city['city'] }}" {{ $citySearch == $city['city'] ? 'selected' : '' }}>
                                                    {{$city['city']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="filter-group">
                                        <label for="province" class="col-md-0 col-form-label text-md-end">Provincia</label>
                                        <select id="province" class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" value="{{ old('province') }}" name="province"/>
                                            <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province['province'] }}" {{ $provinceSearch == $province['province'] ? 'selected' : '' }}>
                                                    {{$province['province']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="filter-group">
                                        <label for="statusCustomer" class="col-md-0 col-form-label text-md-end">Estado</label>
                                        <select id="statusCustomer" type="text" class="form-control {{ $errors->has('statusCustomer') ? 'is-invalid' : '' }}" value="{{ old('statusCustomer') }}"name="statusCustomer"/>
                                        <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($statusCustomer as $status)
                                                <option value="{{ $status['status'] }}" {{ $statusCustomerSearch == $status['status'] ? 'selected' : '' }} >
                                                    {{$status['status']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="filter-buttons">
                                        <input type="submit" class="btn btn-primary" value="Buscar">
                                        <a href="{{ route('customer.list') }}" class="btn btn-success">Limpiar</a>
                                        <input type="submit" class="btn btn-info" formaction="{{ route('customer.report') }}" formmethod="GET" formtarget="_blank" value="Generar Informe"> @csrf
                                    </div>
                                </div>
                            </form>
                        <div class="table-responsive">
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
                                                <!-- Validacion del estado de los Clientes -->
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
</div>
@include('includes.footer')
@endsection
