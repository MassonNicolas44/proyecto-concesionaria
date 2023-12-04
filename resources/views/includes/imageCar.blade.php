<div class="card pub_image">
    <div class="card-header">
        <p> {{ $imageCar->brand->descripcion . ' '.$imageCar->model . ' '.$imageCar->year}} </p>    
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

        <div class="homeButton">
            </br>
            <div class="homeButton1">
                <a href="{{ route('car.detail',['id'=>$imageCar->id])}}" ="sucess" class="btn btn-info btn-sm">Ver Mas Detalles </a>
            </div>
            </br>
            <div class="homeButton2">
                <a href="{{ route('car.edit',['id'=>$imageCar->id]) }}" ="sucess" class="btn btn-success btn-sm"> Editar Vehiculo </a>
            </div>
            </br>
            <div class="homeButton3">

            <a href="{{ route('car.delete',['id'=>$imageCar->id]) }}"="sucess" class="btn  btn-danger btn-sm">Eliminar Vehiculo</a>

            </div>
        </div>


    </div> 
</div>