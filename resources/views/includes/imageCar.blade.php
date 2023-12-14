</br>
<div class="card pub_image">
    
    <div class="card-header">
        <p> {{ $imageCar->brand->name . ' '.$imageCar->model . ' '.$imageCar->year}} </p>    
    </div>
    <div class="card-body">
        <div class="image-container-home">
            <!-- En caso que no existe imagen del vehiculo, se muestra una imagen con el cartel de "No image" -->
            @if(!empty($imageCar->media->first()))
                <img src="{{ $imageCar->media->first()->getUrl('thumb') }}" width="600px" height ="450px">
            @else
                <img src="{{ asset ('storage/noImagen.png') }}" width="600px" height ="450px" >
            @endif
        </div>

        <div class="homeButtonHome">
            @if(($imageCar->stock)==0)
                    <div class="homeButton1">
                        <a href="{{ route('car.detail',['id'=>$imageCar->id])}}" ="sucess" class="btn btn-info btn-sm">Ver Mas Detalles </a>
                    </div>
                    <div class="homeButton2">
                        <a class="btn btn-success btn-sm disabled">No hay Stock</a>
                    </div>
            @else
                <div class="homeButton1">
                    <a href="{{ route('car.detail',['id'=>$imageCar->id])}}" ="sucess" class="btn btn-info btn-sm">Ver Mas Detalles </a>
                </div>
                @if(Auth::user())
                    <div class="homeButton3">
                        <a href="{{ route('sale.create',['id'=>$imageCar->id]) }}" ="sucess" class="btn btn-success btn-sm">Registrar Venta</a>
                    </div>
                @endif
            @endif
        </div>
        
    </div> 
</div>