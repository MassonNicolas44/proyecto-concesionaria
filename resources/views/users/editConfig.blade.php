@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
@include('includes.message')

                <div class="card-header">{{ __('Modificar datos de Administrador') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.updateConfig') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="loginCode" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="loginCode" type="text" class="form-control {{ $errors->has('loginCode') ? 'is-invalid' : '' }}" value="{{ Auth::user()->loginCode }}" name="loginCode" required/>
                                @if ($errors->has('loginCode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('loginCode')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Antigua Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" autocomplete="old-password">

                                @error('oldPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   

                        <div class="row mb-3">
                            <label for="newPassword" class="col-md-4 col-form-label text-md-end">{{ __('Nueva Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="newPassword" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" autocomplete="new-password">

                                @error('newPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   

                        <div class="row mb-3">
                            <label for="confirmPassword" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="confirmPassword" type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" autocomplete="confirm-password">

                                @error('confirmPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                      

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Actualizar">
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
