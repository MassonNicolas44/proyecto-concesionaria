@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <div class="container-avatar">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
       
                @endif
            </div>

                <div class="card-header">{{ __('Registrar Venta') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('sale.save') }}">
                        @csrf

                        <input type="hidden" name="car_id" value="{{$cars->id}}"/>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>

                        <div class="row mb-3">
                            <label for="customer_id" class="col-md-4 col-form-label text-md-end">{{ __('Cliente') }}</label>

                            <div class="col-md-6">
                                <select id="customer_id" class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" value="{{ old('user_id') }}" name="customer_id" required/>
                                <option value="">-- Escoja el cliente --</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer['id'] }}">
                                            {{$customer['name']}} {{$customer['surname']}}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('customer_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('customer_id')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('Vendedor') }}</label>

                            <div class="col-md-6">
                                <select id="user_id" class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" value="{{ Auth::user()->id }}" name="user_id" disabled required/>
                                <option value=" {{ Auth::user()->id }} "> {{ Auth::user()->name}} {{ Auth::user()->surname }} </option>
                                </select>

                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('user_id')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="brand_id" class="col-md-4 col-form-label text-md-end">{{ __('Marca') }}</label>

                            <div class="col-md-6">
                                <select id="brand_id" class="form-control {{ $errors->has('brand_id') ? 'is-invalid' : '' }}" value="{{ $cars->brand_id }}" name="brand_id" disabled required/>
                                <option value=" {{ $brands->id }} "> {{ $brands->name }} </option>
                                </select>

                                @if ($errors->has('brand_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('brand_id')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="engine_id" class="col-md-4 col-form-label text-md-end">{{ __('Motor') }}</label>

                            <div class="col-md-6">
                                <select id="engine_id" type="text" class="form-control {{ $errors->has('engine_id') ? 'is-invalid' : '' }}" value="{{ $cars->engine_id }}" name="engine_id" disabled required/>
                                        <option value="{{ $engines->id }}"> {{ $engines->description }} </option>
                                </select>

                                @if ($errors->has('engine_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('engine_id')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="model" class="col-md-4 col-form-label text-md-end">{{ __('Modelo') }}</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" value=" {{ $cars->model }} " name="model" disabled required/>

                                @if ($errors->has('model'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('model')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Año') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" value="{{ $cars->year }}" name="year" disabled required/>

                                @if ($errors->has('year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('year')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="color" class="col-md-4 col-form-label text-md-end">{{ __('Color') }}</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" value="{{ $cars->color }}" name="color" disabled required/>

                                @if ($errors->has('color'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('color')}} </strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                       
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion / Detalles') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="textarea" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ $cars->description }}" name="description" disabled required/>{{ $cars->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('description')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock" class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" value="{{ $cars->stock }}" name="stock" disabled required/>

                                @if ($errors->has('stock'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('stock')}} </strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Precio (Dolares)') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ $cars->price }}" name="price" disabled required/>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('price')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Finalizar">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
