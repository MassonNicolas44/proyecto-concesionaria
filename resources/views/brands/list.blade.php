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

                <div class="card-header">{{ __('Listado de Marcas') }}</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <ul type=”A”>
                                <div class="textFont">
                                    @foreach ($brands as $brand)
                                        <li>{{$brand['name']}}</li>
                                    @endforeach
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection