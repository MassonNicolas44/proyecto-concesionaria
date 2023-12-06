@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingresar Nuevo Tipo de Motor') }}</div>

                <div class="container-avatar">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('engine.save') }}">
                        @csrf
                       
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description') }}" name="description" required/>

                                @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong> {{$errors->first('description')}} </strong>
                            </span>
                        @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Añadir Tipo de Motor">
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Tipo de Motor') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('engine.update') }}">
                        @csrf
                       
                        <div class="row mb-3">
                            <label for="engine_id" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de Motor') }}</label>

                            <div class="col-md-6">
                                <select id="engine_id" class="form-control {{ $errors->has('engine_id') ? 'is-invalid' : '' }}" value="{{ old('engine_id') }}" name="engine_id" required/>
                                <option value="">-- Escoja la marca --</option>
                                    @foreach ($engines as $engine)
                                        <option value="{{ $engine['id'] }}">
                                            {{$engine['description']}}
                                        </option>
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
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Nuevo Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description') }}" name="description" required/>

                                @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong> {{$errors->first('description')}} </strong>
                            </span>
                        @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Editar Tipo de Motor">
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de Tipo de Motor') }}</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <ul type=”A”>
                                @foreach ($engines as $engine)
                                    <li>{{$engine['description']}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection