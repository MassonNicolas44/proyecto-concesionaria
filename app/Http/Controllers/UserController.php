<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function config(){

        return view('user.config');

    }

    public function update(Request $Request){

        $user=\Auth::User();
        $id=$user->id;


        //Validacion de datos antes de cargar
       $validate = $this->validate($Request, [
        'name' => ['required', 'max:255'],
        'surname' => ['required','max:255','unique:users,surname,'.$id],
        'email' => ['required', 'string', 'max:255','unique:users,email,'.$id],
    ]
);

    //Traer datos
    $name = $Request->input('name');
    $surname = $Request->input('surname');
    $email = $Request->input('email');

    //Cargar valores
    $user->name = $name;
    $user->surname = $surname;
    $user->email = $email;

    $user->update();

    //Redireccion de la pagina
    return redirect()->route('user.config')->with(['message' => 'Usuario actualizado correctamente']);

    }
}
