@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar Tipo de Motor') }}</div>

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
@include('includes.footer')
@endsection