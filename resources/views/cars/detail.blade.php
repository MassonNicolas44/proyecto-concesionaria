@extends('layouts.app')

@section('content')

<div class="container">

        <div class="card">
            <div class="card pub_image">
                <div class="card-header">
          
                        </hr>
                        <p class="nickname"> {{ $imageCar->brand->descripcion . ' '.$imageCar->model . '
                            '.$imageCar->year}} </p>
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
                                <a href="{{ route('image.deleteImg',['id'=>$imageCar->id,'idImg'=>$imgCar]) }}" ="sucess" class="btn btn-danger btn-sm"> Eliminar Foto</a>
                            </div>

                        @endforeach

                    </div>
                     <div class="description">
                        <ul> 
                            <li> <b> {{'Tipo de Motor:'}} </b> {{ $imageCar->engine->description }} </li>
                            <li> <b> {{ 'Color: ' }} </b> {{ $imageCar->color }} </li>
                            <li> <b> {{ 'Cantidad de puertas: '}} </b> {{ $imageCar->door }} </li>
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
