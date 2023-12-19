@extends('layouts.app')

@section('content')

<div class="container">

        <div class="card">

        <div class="container-avatar">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
       
                @endif
            </div>

            <div class="card pub_image">
                <div class="card-header">
                    <div class="textFont">
                        </hr>
                        <p class="nickname"> {{ $imageCar->brand->name . ' '.$imageCar->model . '
                            '.$imageCar->year}} </p>
                        </div>
                    </div>
                  
                </div>
                
                <div class="card-body">
                    <div class="image-container">

                        <!-- En caso que el vehiculo no tenga imagen, se mostrara una imagen con el mensaje "No Image" -->
                        @if(!empty($imageCar->media->first()))
                            <!-- Si no se ha seleccionada ninguna imagen, muestra la primera guardada en la Base de Datos -->
                            <!-- Caso contrario se muestra la imagen seleccionada -->
                            @if(empty($img))
                                <img src="{{ $imageCar->media->first()->getUrl('thumb') }}" >
                            @else
                                <?php 
                                    $img=strtolower(str_replace(" ", "-", $img));
                                ?>
                                <img src="{{ asset ('storage/'.$idImg.'/conversions/'.$img.'-thumb.jpg') }}" >
                            @endif
                        @else
                            <img src="{{ asset ('storage/noImagen.png') }}" width="600px" height ="450px"  >
                        @endif

                    </div>
   
                    <div class="foreachImage">
                                        
                        @foreach ($imageCar->media as $imgCar)
                            <div class="imageDelete">
                                <a href="{{ route('car.detail',['id'=>$imageCar->id,'idImg'=>$imgCar->id,'img'=>$imgCar->name])}}" ="sucess">
                                    <img style="width: 150px;" alt="" src="{{ $imgCar->getUrl('thumb') }}"  data-img="{{ $imgCar->getUrl('thumb') }}"/>
                                </a>
                                @if(Auth::user())
                                    <a href="{{ route('image.deleteImg',['id'=>$imageCar->id,'idImg'=>$imgCar]) }}" ="sucess" class="btn btn-danger btn-sm"> Eliminar Foto</a>
                                @endif
                            </div>

                        @endforeach

                    </div>
                     <div class="description">
                        <ul> 
                            <li> <b> {{'Marca:'}} </b> {{ $imageCar->brand->name }} </li>
                            <li> <b> {{'Tipo de Motor:'}} </b> {{ $imageCar->engine->description }} </li>
                            <li> <b> {{'Modelo:'}} </b> {{ $imageCar->model }} </li>
                            <li> <b> {{'Año:'}} </b> {{ $imageCar->year }} </li>
                            <li> <b> {{ 'Color: ' }} </b> {{ $imageCar->color }} </li>
                            <li> <b> {{ 'Descripcion / Detalles: '}} </b> {{ $imageCar->description }} </li>
                            <li> <b> {{ 'Precio (Dolares): $ '}} </b> {{ $imageCar->price }} </li>
                            <?php  // <span class="nickname date">{{' | '.\FormatTime::LongTimeFilter($image->created_at)}}</span> ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
