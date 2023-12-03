<div class="card pub_image">
    <div class="card-header">
        <p> {{ $imageCar->brand->descripcion . ' '.$imageCar->model . ' '.$imageCar->year}} </p>    
    </div>
            
    <div class="card-body">
        <div class="image-container-home">

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
                <div class="actions_delete">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar Vehiculo</button>

                                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de realizar esta accion?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Al eliminar el vehiculo, no se puede recuperar. ¿Quiere continuar?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="{{ route('car.delete',['id'=>$imageCar->id]) }}" class="btn  btn-danger">Borrar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div> 
</div>