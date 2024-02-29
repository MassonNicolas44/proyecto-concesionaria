<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Engine;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use Barryvdh\DomPDF\Facade\Pdf;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        //Se obtienen los objetos de Marca y Tipo de Motor
        $brands=Brand::orderBy('name','asc')->get();
        $engines=Engine::orderBy('description','asc')->get();    
        return view('cars.create',compact('brands','engines'));
    }

    public function edit($id)
    {
        //Se obtiene el objeto Vehiculo (seleccionado por el Id), Marca y Tipo de Motor
        $cars=Car::find($id);
        $brands=Brand::orderBy('name','asc')->get();
        $engines=Engine::orderBy('description','asc')->get(); 

        //Se obtiene el objeto Marca y Tipo de Motor mediante el Id del Vehiculo seleccionado
        $brandsCar=Brand::find($cars->brand_id);
        $enginesCar=Engine::find($cars->engine_id); 

        return view('cars.edit',compact('cars','brands','engines','brandsCar','enginesCar'));
    }

    public function save(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'brand_id' => ['required'],
            'engine_id' => ['required'],
            'model' => ['required','min:1', 'string', 'max:255'],
            'year' => ['required','min:1','integer'],
            'color' => ['required','min:1', 'string', 'max:255'],
            'description' => ['required','min:1', 'string', 'max:255'],
            'stock' => ['required','min:1','integer'],
            'price' => ['required','min:1','integer'],
        ] );

        //Se obtienen los datos
        $brand_id = $request->input('brand_id');
        $engine_id = $request->input('engine_id');
        $model = $request->input('model');
        $year = $request->input('year');
        $color = $request->input('color');
        $description = $request->input('description');
        $stock = $request->input('stock');
        $price = $request->input('price');   

        //Cargar valores
        $car = new Car();
        $car->brand_id = $brand_id;
        $car->engine_id = $engine_id;
        $car->model = $model;
        $car->year = $year;
        $car->color = $color;
        $car->description = $description;
        $car->stock = $stock;
        $car->price = $price;
        $car->status = 'Habilitado';

        //Verificacion si existe imagen a cargar
        if (request()->hasFile('image')){


        $car->addMultipleMediaFromRequest(['image'])
         ->each(function ($fileAdder) {
              $fileAdder->toMediaCollection('cars');
          });              
          }



        $car->save();

        //Redireccion de la pagina al inicio
        return redirect()->route('car.list')->with(['message' => 'Vehiculo creado correctamente']);
    }

    public function update(Request $request)
    {

        //Validacion de datos antes de cargar
        $validate = $this->validate($request, [
        'brand_id' => ['required'],
        'engine_id' => ['required'],
        'model' => ['required','min:1', 'string', 'max:255'],
        'year' => ['required','min:1','integer'],
        'color' => ['required','min:1', 'string', 'max:255'],
        'description' => ['required','min:1', 'string', 'max:255'],
        'stock' => ['required','min:0','integer'],
        'price' => ['required','min:1','integer'],
    ] );

    //Se obtienen los datos
    $id = $request->input('idCar');
    $brand_id = $request->input('brand_id');
    $engine_id = $request->input('engine_id');
    $model = $request->input('model');
    $year = $request->input('year');
    $color = $request->input('color');
    $description = $request->input('description');
    $stock = $request->input('stock');
    $price = $request->input('price');
    $option_Image = $request->input('option_Image');

	// Conseguir el objeto image
	$car = Car::find($id);
    $car->brand_id = $brand_id;
    $car->engine_id = $engine_id;
    $car->model = $model;
    $car->year = $year;
    $car->color = $color;
    $car->description = $description;
    $car->stock = $stock;
    $car->price = $price;

    //Verificacion si existe imagen a cargar
    if (request()->hasFile('image')){

        //Verificacion si se selecciono la opcion de eliminar las fotos anteriormente cargadas
        if($option_Image=="Eliminar"){
            $car->clearMediaCollection('cars');
        }

        $car->addMultipleMediaFromRequest(['image'])
        ->each(function ($fileAdder) {
        $fileAdder->toMediaCollection('cars');
      });


          
      }

    $car->update();

    //Redireccion de la pagina al vehiculo editado
    return redirect()->route('car.detail',['id'=>$id])->with(['message' => 'El Vehiculo se ha editado correctamente']);
    }

    public function delete($id)
    {

        $brand=Car::find($id)->brand->name;
        $model=Car::find($id)->model;
        $year=Car::find($id)->year;

        //Se consigue el objeto del Vehiculo con el Id seleccionado
        Car::with(['media'])->find($id)->delete();

        //Redireccion de la pagina al inicio
        return redirect()->route('car.list')->with(['message' => 'El Vehiculo '.$brand.' '.$model.' ('.$year.') se ha eliminado correctamente']);
    }

    public function deleteImg($id,$idImg)
    {
        //Se consigue la foto del vehiculo a eliminar
        Media::find($idImg)->delete();

        //Redireccion de la pagina al vehiculo editado
        return redirect()->route('car.detail',['id'=>$id])->with(['message' => 'La foto se ha eliminado correctamente']);
    }

    public function list($id=null,$status=null){

        //Validacion para saber si debe actualizar el estatus del Vehiculo
        if($id!=null && $status!=null){
            
            //Se obtiene el objeto del Vehiculo a modificar
            $car = Car::find($id);

            //Validacion de actualizacion del Vehiculo
            if($status=="Deshabilitado"){
                $car->status='Deshabilitado';
            }else{
                $car->status='Habilitado';
            }

            $car->update();
        }

        //Se obtiene el objeto del Vehiculo y lo ordena por nombre
        $cars=Car::orderBy('id','asc')->get(); 

        return view('cars.list', ['cars' => $cars]);
    }

    public function report()
    {
        $cars=Car::all();
        $pdf=Pdf::loadView('cars.report',compact('cars'));
        return $pdf->stream('car_report.pdf');
    }

}
