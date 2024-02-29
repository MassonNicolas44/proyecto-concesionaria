@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar Marca') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('brand.update') }}">
                        @csrf
                       
                        <div class="row mb-3">
                            <label for="brand_id" class="col-md-4 col-form-label text-md-end">{{ __('Marca') }}</label>

                            <div class="col-md-6">
                                <select id="brand_id" class="form-control {{ $errors->has('brand_id') ? 'is-invalid' : '' }}" value="{{ old('brand_id') }}" name="brand_id" required/>
                                <option value="">-- Escoja la marca --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand['id'] }}">
                                            {{$brand['name']}}
                                        </option>
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
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nuevo Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" name="name" required/>

                                @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong> {{$errors->first('name')}} </strong>
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