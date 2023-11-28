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
        $brands=Brand::all();
        $engines=Engine::all();    
        return view('cars.create',compact('brands','engines'));
    }


    public function save(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'brand_id' => ['required'],
            'engine_id' => ['required'],
            'model' => ['required', 'string', 'max:255'],
            'year' => ['required','integer'],
            'color' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'door' => ['required', 'string', 'max:255'],
            'stock' => ['required','integer'],
            'price' => ['required','integer'],
        ]
    );

        //Traer datos
        $brand_id = $request->input('brand_id');
        $engine_id = $request->input('engine_id');
        $model = $request->input('model');
        $year = $request->input('year');
        $color = $request->input('color');
        $description = $request->input('description');
        $door = $request->input('door');
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
        $car->door = $door;
        $car->stock = $stock;
        $car->price = $price;

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

    public function getImage($filename)
    {
        $file = Storage::disk('public')->get($filename);
        return new Response($file, 200);
    }



    public function detail($id,$idImg=null,$img=null)
    {   
    
        $imageCar=Car::with(['media'])->find($id);   

        return view('cars.detail', [
            'imageCar' => $imageCar,
            'img' => $img,
            'idImg' => $idImg,
        ]);
    }    

}
