@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
@include('includes.message')

                <div class="card-header">{{ __('Lista de Ventas') }}</div>
                    <div class="card-body">

                          <form method="GET" action="{{ route('sale.list') }}">
                            @csrf
                                <div class="homeFilter align-items-center">
                                    <label class="filter-title"><b>Filtrar por:</b></label>
                                    <div class="filter-group">
                                        <label for="user_id" class="col-md-0 col-form-label text-md-end">Vendedor</label>
                                        <select id="user_id" class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" value="{{ old('user_id') }}" name="user_id"/>
                                            <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user['id'] }}" {{ $userSearch == $user['id'] ? 'selected' : '' }}>
                                                    {{$user['name']}} {{$user['surname']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="filter-group">
                                        <label for="customer_id" class="col-md-0 col-form-label text-md-end">Cliente</label>
                                        <select id="customer_id" class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" value="{{ old('customer_id') }}" name="customer_id"/>
                                            <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer['id'] }}" {{ $customerSearch == $customer['id'] ? 'selected' : '' }}>
                                                    {{$customer['name']}} {{$customer['surname']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    
                                    <div class="filter-group">
                                        <label for="statusSale" class="col-md-0 col-form-label text-md-end">Estado</label>
                                        <select id="statusSale" type="text" class="form-control {{ $errors->has('statusSale') ? 'is-invalid' : '' }}" value="{{ old('statusSale') }}"name="statusSale"/>
                                        <option value="">-- Escoja una Opcion --</option>
                                            @foreach ($statusSale as $status)
                                                <option value="{{ $status['status'] }}" {{ $statusSaleSearch == $status['status'] ? 'selected' : '' }} >
                                                    {{$status['status']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="filter-group">
                                            <label for="dateIni" class="col-md-0 col-form-label text-md-end">Desde: </label>
                                            <input id="dateIni" type="date" class="form-control @error('dateIni') is-invalid @enderror" name="dateIni" value="{{ old('dateIni', request('dateIni')) }}"  autocomplete="dateIni" autofocus> 
                                            <label for="dateEnd" class="col-md-0 col-form-label text-md-end">Hasta: </label>
                                            <input id="dateEnd" type="date" class="form-control @error('dateEnd') is-invalid @enderror" name="dateEnd" value="{{ old('dateEnd', request('dateEnd')) }}"  autocomplete="dateEnd" autofocus>
                                        </div>
                                     </div>
                                    
                                    
                                    <div class="filter-buttons">
                                        <input type="submit" class="btn btn-primary" value="Buscar">
                                        <a href="{{ route('sale.list') }}" class="btn btn-success">Limpiar</a>
                                        <input type="submit" class="btn btn-info" formaction="{{ route('sale.report') }}" formmethod="GET" formtarget="_blank" value="Generar Informe"> @csrf
                                    </div>

                                </div>
                            </form>
                            
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                            <thead>
                                <th>Id</th>
                                <th>Vehiculo</th>
                                <th>Vendedor</th>
                                <th>Cliente</th>
                                <th>Fecha Compra</th>
                                <th>Fecha Actualizacion</th>
                                <th>Estado</th>
                                <th>Precio</th>
                                <th>Accion</th>
                            </thead>

                            <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{$sale->id}}</td>
                                        <td>{{$sale->car->brand->name}} {{$sale->car->model}} {{$sale->car->year}} ({{$sale->car->id}})</td>
                                        <td>{{$sale->user->name}} {{$sale->user->surname}} ({{$sale->user->id}})</td>
                                        <td>{{$sale->customer->name}} {{$sale->customer->surname}} ({{$sale->customer->id}})</td>
                                        <td>{{$sale->created_at}}</td>
                                        <td>{{$sale->updated_at}}</td>
                                        <td>{{$sale->status}}</td>
                                        <td>$ {{$sale->price}}</td>
                                        <td>
                                            <!-- Validacion del estado de la Venta -->
                                            @if($sale->status=='Anulada')
                                                <button disabled class="btn  btn-danger btn-sm" >Anulada</button>
                                            @else
                                                <a href="{{ route('sale.delete',['idSale'=>$sale->id,'idCar'=>$sale->car->id]) }}"="sucess" class="btn  btn-danger btn-sm" >Anular</a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                                <td COLSPAN=5><b>Ventas Totales<b></td>
                                <td> <b>{{$totalPrice}} $<b></td>
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
