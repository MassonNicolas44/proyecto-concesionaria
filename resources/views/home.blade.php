@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vehiculos') }}</div>

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                
                    <form method="GET" action="{{ route('home') }}">
                    @csrf
                       
                        <div class="homeFilter">
                            <label class="col-md-2 col-form-label text-md-center">Filtrado:</label>
                            <label for="brand_id" class="col-md-0 col-form-label text-md-end">Marca</label>
                            
                                <div>
                                    <select id="brand_id" class="form-control {{ $errors->has('brand_id') ? 'is-invalid' : '' }}" value="{{ old('brand_id') }}" name="brand_id"/>
                                        <option value="">-- Escoja una Opcion --</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand['id'] }}">
                                                {{$brand['name']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            <label for="engine_id" class="col-md-1 col-form-label text-md-end">Motor</label>
                            <div>
                                <select id="engine_id" type="text" class="form-control {{ $errors->has('engine_id') ? 'is-invalid' : '' }}" value="{{ old('engine_id') }}" name="engine_id"/>
                                <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($engines as $engine)
                                        <option value="{{ $engine['id'] }}">
                                            {{$engine['description']}}
                                        </option>
                                    @endforeach
                                </select>
                            
                            </div>
                            
                            <div class="col-md-2">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                                
                            </div>
                        </div>
                    </form>


                @foreach ($imagesCar as $imageCar)
                    @include('includes.imageCar',['imageCar'=>$imageCar])
                @endforeach

                <div class="clearfix"></div>
                    {{ $imagesCar->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
