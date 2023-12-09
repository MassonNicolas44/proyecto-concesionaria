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

                <div class="card-header">{{ __('Editar Usuario') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf

                        <input type="hidden" name="idUser" value="{{Auth::user()->id}}"/>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ Auth::user()->name }}" name="name" required/>
                                @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong> {{$errors->first('name')}} </strong>
                            </span>
                        @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" value="{{ Auth::user()->surname }}" name="surname" required/>

                                @if ($errors->has('surname'))
                            <span class="invalid-feedback" role="alert">
                                <strong> {{$errors->first('surname')}} </strong>
                            </span>
                        @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="mail" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ Auth::user()->email }}" name="email" required/>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$errors->first('email')}} </strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                      

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Actualizar Usuario">
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
