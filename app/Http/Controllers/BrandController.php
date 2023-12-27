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

    public function create()
    {
        return view('brands.create');
    }

    public function edit()
    {
        //Se obtiene el objeto Marca y lo envia por el View
        $brands=Brand::orderBy('name','asc')->get(); 
        return view('brands.edit',['brands'=>$brands]);
    }

    public function list()
    {
        //Se obtiene el objeto Marca y lo envia por el View
        $brands=Brand::orderBy('name','asc')->get(); 
        return view('brands.list',['brands'=>$brands]);
    }

    public function save(Request $request)
    {
        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'name' => ['required','min:1', 'unique:brands'],
        ] );

        //Se obtienen los datos
        $name = $request->input('name');

        //Cargar valores
        $brand = new Brand();
        $brand->name = $name;

        $brand->save();

        //Redireccion de la pagina a la lista de Marcas
        return redirect()->route('brand.list')->with(['message' => 'Marca de vehiculo añadida correctamente']);
    }

    public function update(Request $request)
    {
        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'brand_id' => ['required','min:1'],
            'name' => ['required','min:1', 'unique:brands'],
        ] );

        //Se obtiene los datos
        $brand_id = $request->input('brand_id');
        $name = $request->input('name');

        $brand=Brand::find($brand_id);

        //Cargar valores
        $brand->name = $name;

        $brand->update();

        //Redireccion de la pagina a la lista de Marcas
        return redirect()->route('brand.list')->with(['message' => 'Marca de vehiculo editada correctamente']);
    }

}
