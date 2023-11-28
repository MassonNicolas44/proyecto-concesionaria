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

                        @if(empty($img))
                            <img src="{{ $imageCar->media->first()->getUrl() }}" width="1000px">
                        @else
                            <img src="{{ asset ('storage/'.$idImg.'/conversions/'.$img.'-thumb.jpg') }}" width="1000px">
  
                        @endif

                    </div>
   
                    <div class="foreachImage">
                                        
                        @foreach ($imageCar->media as $imgCar)
                       
                                <a href="{{ route('car.detail',['id'=>$imageCar->id,'idImg'=>$imgCar->id,'img'=>$imgCar->name])}}" ="sucess">
                                    <img style="width: 150px;" alt="" src="{{ $imgCar->getUrl('thumb') }}"  data-img="{{ $imgCar->getUrl('thumb') }}"/>
                                </a>
            
                        @endforeach
                    </div>
           
                    <div class="clearfix"></div>
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