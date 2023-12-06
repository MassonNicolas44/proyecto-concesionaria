<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Engine;

class EngineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function config()
    {

        //Trae la tabla de Marca y Motor desde la base de datos y la pasa por el View
        $engines=Engine::orderBy('description','asc')->get(); 
        return view('engines.config',['engines'=>$engines]);

    }

    public function save(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'description' => ['required'],
        ]
    );

        //Traer datos
        $description = $request->input('description');

        //Cargar valores
        $engine = new Engine();
        $engine->description= $description;

        $engine->save();

        //Redireccion de la pagina
        return redirect()->route('engine.config')->with(['message' => 'Tipo de Motor añadido correctamente']);
    }

    public function update(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'description' => ['required'],
        ]
    );

        //Traer datos
        $engine_id = $request->input('engine_id');
        $description = $request->input('description');

        //Cargar valores
        $engine = Engine::find($engine_id);
        $engine->description = $description;

        $engine->update();

        //Redireccion de la pagina
        return redirect()->route('engine.config')->with(['message' => 'Tipo de Motor editado correctamente']);
    }
}
