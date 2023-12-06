<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function config()
    {

        //Trae la tabla de Marca y Motor desde la base de datos y la pasa por el View
        $brands=Brand::orderBy('name','asc')->get(); 
        return view('brands.config',['brands'=>$brands]);

    }

    public function save(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'name' => ['required'],
        ]
        );
        //Traer datos
        $name = $request->input('name');

        //Cargar valores
        $brand = new Brand();
        $brand->name = $name;

        $brand->save();

        //Redireccion de la pagina
        return redirect()->route('brand.config')->with(['message' => 'Marca de vehiculo añadida correctamente']);
    }

    public function update(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'brand_id' => ['required'],
            'name' => ['required'],
        ]
        );

        //Traer datos
        $brand_id = $request->input('brand_id');
        $name = $request->input('name');

        $brand=Brand::find($brand_id);

        //Cargar valores
        $brand->name = $name;

        $brand->update();

        //Redireccion de la pagina
        return redirect()->route('brand.config')->with(['message' => 'Marca de vehiculo editada correctamente']);
    }

}
