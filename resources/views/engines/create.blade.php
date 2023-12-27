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

                <div class="card-header">{{ __('Añadir Tipo de Motor') }}</div>
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