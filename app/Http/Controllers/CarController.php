<?php

namespace App\Http\Controllers;

use Hamcrest\Description;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Engine;
use Illuminate\Support\Facades\Storage;
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
        //Trae la tabla de Marca y Motor desde la base de datos y la pasa por el View
        $brands=Brand::orderBy('name','asc')->get();
        $engines=Engine::orderBy('description','asc')->get();    
        return view('cars.create',compact('brands','engines'));
    }

    public function edit($id)
    {
        //Trae la tabla de Marca y Motor desde la base de datos y la pasa por el View
        $cars=Car::find($id);
        $brands=Brand::orderBy('name','asc')->get();
        $engines=Engine::orderBy('description','asc')->get(); 

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
        ]
    );

        //Traer datos
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

        if (request()->hasFile('image')){

            $car->addMultipleMediaFromRequest(['image'])
             ->each(function ($fileAdder) {
                  $fileAdder->toMediaCollection('cars');
              });
              
          }


        $car->save();

        //Redireccion de la pagina
        return redirect()->route('home')->with(['message' => 'Vehiculo creado correctamente']);
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
        'stock' => ['required','min:1','integer'],
        'price' => ['required','min:1','integer'],
    ]
);

    //Traer datos
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

    if (request()->hasFile('image')){

        if($option_Image=="Eliminar"){
            $car->clearMediaCollection('cars');
        } 

        $car->addMultipleMediaFromRequest(['image'])
         ->each(function ($fileAdder) {
              $fileAdder->toMediaCollection('cars');
          });
          
      }

    $car->update();

    //Redireccion de la pagina
    return redirect()->route('car.detail',['id'=>$id])->with(['message' => 'El Vehiculo se ha editado correctamente']);

    }

    public function delete($id)
    {
        // Conseguir el objeto image
        Car::with(['media'])->find($id)->delete();

        //Redireccion de la pagina
        return redirect()->route('home')->with(['message' => 'El Vehiculo se ha eliminado correctamente']);
    }

    public function deleteImg($id,$idImg)
    {
        // Conseguir el objeto image
        Media::find($idImg)->delete();

        //Redireccion de la pagina
        return redirect()->route('car.detail',['id'=>$id])->with(['message' => 'La foto se ha eliminado correctamente']);
    }

    public function list($id=null,$status=null){

        if($id!=null && $status!=null){
            
            $car = Car::find($id);

            if($status=="Deshabilitado"){
                $car->status='Deshabilitado';
            }else{
                $car->status='Habilitado';
            }

            $car->update();
        }


        //Trae la tabla de Usuarios y la pasa por el View
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
