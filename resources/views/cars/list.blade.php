@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
@include('includes.message')

                    <div class="card-header">{{ __('Lista de Vehiculos') }}</div>
                        <div class="card-body">

                            <form method="GET" action="{{ route('car.list') }}">
                            @csrf
                                <div class="homeFilter align-items-center">
                                    <label class="filter-title"><b>Filtrar por:</b></label>
                                 <div class="filter-group">
                                        <label for="brand_id" class="col-md-0 col-form-label text-md-end">Marca</label>
                                        <select id="brand_id" class="form-control {{ $errors->has('brand_id') ? 'is-invalid' : '' }}" value="{{ old('brand_id') }}" name="brand_id"/>
                                            <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand['id'] }}" {{ $brandSearch == $brand['id'] ? 'selected' : '' }}>
                                                    {{$brand['name']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="filter-group">
                                        <label for="engine_id" class="col-md-0 col-form-label text-md-end">Motor</label>
                                        <select id="engine_id" type="text" class="form-control {{ $errors->has('engine_id') ? 'is-invalid' : '' }}" value="{{ old('engine_id') }}"name="engine_id"/>
                                        <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($engines as $engine)
                                                <option value="{{ $engine['id'] }}" {{ $engineSearch == $engine['id'] ? 'selected' : '' }}>
                                                    {{$engine['description']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="filter-group">
                                        <label for="year" class="col-md-0 col-form-label text-md-end">Año</label>
                                        <select id="year" type="text" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" value="{{ old('year') }}"name="year"/>
                                        <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year['year'] }}" {{ $yearSearch == $year['year'] ? 'selected' : '' }} >
                                                    {{$year['year']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="filter-group">
                                        <label for="statusCar" class="col-md-0 col-form-label text-md-end">Estado</label>
                                        <select id="statusCar" type="text" class="form-control {{ $errors->has('statusCar') ? 'is-invalid' : '' }}" value="{{ old('statusCar') }}"name="statusCar"/>
                                        <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($statusCar as $status)
                                                <option value="{{ $status['status'] }}" {{ $statusCarSearch == $status['status'] ? 'selected' : '' }} >
                                                    {{$status['status']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    
                                    <div class="filter-buttons">
                                        <input type="submit" class="btn btn-primary" value="Buscar">
                                        <a href="{{ route('car.list') }}" class="btn btn-success">Limpiar</a>
                                        <input type="submit" class="btn btn-info" formaction="{{ route('car.report') }}" formmethod="GET" formtarget="_blank" value="Generar Informe"> @csrf
                                    </div>

                                </div>
                            </form>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
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
                                            <td>$ {{$car->price}}</td>
                                            <td>{{$car->status}}</td>
                                            <td>
                                                <div class="list">
                                                    <!-- Validacion del estado del Vehiculo -->
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
</div>

@include('includes.footer')

@endsection
