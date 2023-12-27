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

                <div class="card-header">{{ __('Modificar Vehiculo') }}</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('car.update') }}">
                        @csrf

                        <input type="hidden" name="idCar" value="{{$cars->id}}"/>

                        <div class="row mb-3">
                            <label for="brand_id" class="col-md-4 col-form-label text-md-end">{{ __('Marca') }}</label>

                            <div class="col-md-6">
                                <select id="brand_id" class="form-control {{ $errors->has('brand_id') ? 'is-invalid' : '' }}" value="{{ $brandsCar->id }}" name="brand_id" required/>
                                <option value="">-- Escoja la marca --</option>
                                    @foreach ($brands as $brand)
                                        
                                        <!-- Verificacion si el valor a cargar es igual al valor que existe en la Base de Datos -->
                                        @if( $brandsCar->id == $brand['id'] )
                                            <option  selected="selected" value="{{ $brand['id'] }}">{{$brandsCar->name}}</option>
                                        @else
                                            <option value="{{ $brand['id'] }}">{{$brand['name']}}</option>
                                        @endif
                            
                                    @endforeach
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
                                <select id="engine_id" type="text" class="form-control {{ $errors->has('engine_id') ? 'is-invalid' : '' }}" value=" {{  $enginesCar->id }} " name="engine_id" required/>

                                <option value="">-- Escoja el tipo de motor --</option>
                                    @foreach ($engines as $engine)

                                        <!-- Verificacion si el valor a cargar es igual al valor que existe en la Base de Datos -->
                                        @if( $enginesCar->id == $engine['id'] )
                                            <option  selected="selected" value="{{ $engine['id'] }}">{{$enginesCar->description}}</option>
                                        @else
                                            <option value="{{ $engine['id'] }}">{{$engine['description']}}</option>
                                        @endif

                                    @endforeach
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
                                <input id="model" type="text" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" value="{{ $cars->model }}" name="model" required/>

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
                                <input id="year" type="number" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" value="{{ $cars->year }}" name="year" required/>

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
                                <input id="color" type="text" class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" value="{{ $cars->color }}" name="color" required/>

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
                                <textarea id="description" type="textarea" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description') }}" name="description" required/> {{ $cars->description }} </textarea>


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
                                <input id="stock" type="number" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" value="{{ $cars->stock }}" name="stock" required/>

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
                                <input id="price" type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ $cars->price }}" name="price" required/>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('price')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="option_Image" class="col-md-4 col-form-label text-md-end">{{ __('Opcion de Imagen') }}</label>

                            <div class="col-md-6">
                                <select id="option_Image" type="text" class="form-control {{ $errors->has('option_Imaged') ? 'is-invalid' : '' }}" value="" name="option_Image"/>
          
                                        <option value="">-- Escoja la opcion de imagen --</option>
                                        <option value="Actualizar"> Actualizar Fotos </option>
                                        <option value="Eliminar"> Eliminar Fotos Anteriores </option>

                                </select>

                                @if ($errors->has('option_Image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('option_Image')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">Imagen</label>
                            <div class="col-md-6">
                                <input id="image" type="file" name="image[]" multiple class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }} " />
                                 @if ($errors->has('image'))
                                    <span class="invalid-feeback" role="alert">
                                        <strong> {{$errors->first('image')}} </strong>
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
