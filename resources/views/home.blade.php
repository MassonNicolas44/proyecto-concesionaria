@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista Vehiculos') }}</div>

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

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
