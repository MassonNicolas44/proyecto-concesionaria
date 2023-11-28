<div class="card pub_image">
    <div class="card-header">
        <p> {{ $imageCar->brand->descripcion . ' '.$imageCar->model . ' '.$imageCar->year}} </p>   
    </div>
            
    <div class="card-body">
        <div class="image-container-home">

        <img src="{{ $imageCar->media->first()->getUrl('thumb') }}">

        </div>

        </br>
        <a href="{{ route('car.detail',['id'=>$imageCar->id])}}" ="sucess">Ver mas detalles </a>
    </div> 
</div>