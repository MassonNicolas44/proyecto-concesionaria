@extends('layouts.app')

@section('content')

<div class="container">

        <div class="card">
            <div class="card pub_image">
                <div class="card-header">
          
                    <div class="container-avatar">
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
            

                            @if(!empty($img))
                                <div class="actions_delete">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar Foto</button>

                                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de realizar esta accion?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Al eliminar la foto del vehiculo, no se puede recuperar. ¿Quiere continuar?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href="{{ route('car.deleteImg',['idImg'=>$idImg]) }}" class="btn  btn-danger">Borrar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" disabled data-bs-target="#exampleModal">Seleccione Foto</button>
                                @endif
  
                            </div>

                        @endforeach

                    </div>
                     <div class="description">
                        <ul> 
                            <li> <b> {{'Tipo de Motor:'}} </b> {{ $imageCar->engine->descripcion }} </li>
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