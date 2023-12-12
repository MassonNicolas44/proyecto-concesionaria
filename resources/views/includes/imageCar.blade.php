</br>
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

        @if(Auth::user())
            <div class="homeButtonAdmin">
                <div class="homeButton1">
                    <a href="{{ route('car.detail',['id'=>$imageCar->id])}}" ="sucess" class="btn btn-info btn-sm">Ver Mas Detalles </a>
                </div>

                @if(($imageCar->stock)>0)
                    <div class="homeButton2">
                        <a href="{{ route('sale.create',['id'=>$imageCar->id]) }}" ="sucess" class="btn btn-success btn-sm"> Registrar Venta </a>
                    </div>
                @else
                    <div class="homeButton3">
                        <a class="btn btn-success btn-sm disabled">No hay Stock</a>
                    </div>
                @endif

                <div class="homeButton4">
                    <a href="{{ route('car.edit',['id'=>$imageCar->id]) }}" ="sucess" class="btn btn-warning btn-sm"> Editar Vehiculo </a>
                </div>

                <div class="homeButton5">
                    <a href="{{ route('car.delete',['id'=>$imageCar->id]) }}"="sucess" class="btn  btn-danger btn-sm">Eliminar Vehiculo</a>
                </div>
            </div>
        @else
                @if(($imageCar->stock)==0)
                    <div class="homeButtonHome">
                        <div class="homeButton7">
                            <a href="{{ route('car.detail',['id'=>$imageCar->id])}}" ="sucess" class="btn btn-info btn-sm">Ver Mas Detalles </a>
                        </div>
                        <div class="homeButton8">
                            <a class="btn btn-success btn-sm disabled">No hay Stock</a>
                        </div>
                    </div>
                @else
                    <div class="homeButton6">
                        <a href="{{ route('car.detail',['id'=>$imageCar->id])}}" ="sucess" class="btn btn-info btn-sm">Ver Mas Detalles </a>
                    </div>
                @endif
        
        @endif

    </div> 
</div>