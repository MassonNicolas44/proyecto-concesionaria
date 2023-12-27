@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar Personal Administrativo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf

                        <input type="hidden" name="idUser" value="{{$user->id}}"/>

                        <div class="row mb-3">
                            <label for="loginCode" class="col-md-4 col-form-label text-md-end">{{ __('Codigo de Ingreso') }}</label>

                            <div class="col-md-6">
                                <input id="loginCode" type="text" class="form-control @error('loginCode') is-invalid @enderror" name="loginCode" value="{{ $user->loginCode }}" required autocomplete="loginCode" autofocus>

                                @error('loginCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Rol') }}</label>

                            <!-- Array para luego ser recorrido -->
                            <?php $rols=['Gerente','Ventas'];?>

                            <div class="col-md-6">
                                <select id="rol" class="form-control {{ $errors->has('rol') ? 'is-invalid' : '' }}" value="{{ $user->rol }}" name="rol" required/>
                                <option value="">-- Escoja el rol --</option>

                                    @foreach ($rols as $rol)
                                        <!-- Verificacion si el valor a cargar es igual al valor que existe en la Base de Datos -->
                                        @if( $user->rol == $rol )
                                            <option  selected="selected" value="{{ $user->rol }}">{{$user->rol}}</option>
                                        @else
                                            <option value=" {{$rol}} ">{{$rol}}</option>
                                        @endif
                                    @endforeach

                                </select>

                                @if ($errors->has('rol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('rol')}} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $user->surname }}" required autocomplete="surname" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $user->dni }}" required autocomplete="dni">

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="postalCode" class="col-md-4 col-form-label text-md-end">{{ __('Codigo Postal') }}</label>

                            <div class="col-md-6">
                                <input id="postalCode" type="number" class="form-control @error('postalCode') is-invalid @enderror" name="postalCode" value="{{ $user->postalCode }}" required autocomplete="postalCode">

                                @error('postalCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}" required autocomplete="city">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="province" class="col-md-4 col-form-label text-md-end">{{ __('Provincia') }}</label>

                            <div class="col-md-6">
                                <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ $user->province }}" required autocomplete="province">

                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Finalizar') }}
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
