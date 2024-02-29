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

    public function create()
    {
        return view('engines.create');
    }

    public function edit()
    {
        //Se obtiene el objeto de Tipo de Motor y lo pasa por el view
        $engines=Engine::orderBy('description','asc')->get(); 
        return view('engines.edit',['engines'=>$engines]);
    }

    public function list()
    {
        //Se obtiene el objeto de Tipo de Motor y lo pasa por el view
        $engines=Engine::orderBy('description','asc')->get(); 
        return view('engines.list',['engines'=>$engines]);
    }

    public function save(Request $request)
    {
        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'description' => ['required','min:1', 'unique:engines'],
        ] );

        //Se obtienen los datos
        $description = $request->input('description');

        //Cargar valores
        $engine = new Engine();
        $engine->description= $description;

        $engine->save();

        //Redireccion de la pagina a la lista de Tipo de Motor
        return redirect()->route('engine.list')->with(['message' => 'Tipo de Motor '.$description.' se añadido correctamente']);
    }

    public function update(Request $request)
    {
        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'description' => ['required','min:1', 'unique:engines'],
        ] );

        //Se obtienen los datos
        $engine_id = $request->input('engine_id');
        $description = $request->input('description');

        //Cargar valores
        $engine = Engine::find($engine_id);
        $engine->description = $description;

        $engine->update();

        //Redireccion de la pagina a la lista de Tipo de Motor
        return redirect()->route('engine.list')->with(['message' => 'Tipo de Motor '.$description.' fue editado correctamente']);
    }
}
