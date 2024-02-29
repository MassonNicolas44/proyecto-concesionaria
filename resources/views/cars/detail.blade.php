@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

@include('includes.message')

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
                            <img src="{{ env('APP_URL','').('/storage/app/public/'.$imageCar->media->first()->id.'/conversions/'.$imageCar->media->first()->name.'-thumb.jpg') }}" >
                        @else
                            <?php               
                                $img=strtr($img," ", "_");
                            ?>
                            <img src="{{ env('APP_URL','').('/storage/app/public/'.$idImg.'/conversions/'.$img.'-thumb.jpg') }}" />
                        @endif
                    @else
                        <img src="{{ env('APP_URL','').('/storage/app/public/noImagen.png') }}" />
                    @endif

                </div>
   
                <div class="foreachImage">
                                        
                    @foreach ($imageCar->media as $imgCar)
                        <div class="imageDelete">

                            <a href="{{ route('car.detail',['id'=>$imageCar->id,'idImg'=>$imgCar->id,'img'=>$imgCar->name])}}" ="sucess">
                            <img src="{{ env('APP_URL','').('/storage/app/public/'.$imgCar->id.'/conversions/'.$imgCar->name.'-thumb.jpg') }}" />
                            </a>
                            <!-- Validacion de si existe Personal Administrativo Logeado -->
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
                    </ul>
                    <br>
                    Para realizar una consulta, haga <a href="https://api.whatsapp.com/send?phone=542284214417"> <b>Click Aqui</b> </a>
                </div>

            </div>
        </div>
    </div>
</div>
@include('includes.footer')

@endsection
