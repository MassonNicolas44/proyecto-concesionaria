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

    public function editUser($id){

        //Trae la tabla de Marca y Motor desde la base de datos y la pasa por el View
        $users=User::find($id);

        return view('user.editUser',['user'=>$users]);
    }


    public function updateUser(Request $Request){

        //Validacion de datos antes de cargar
        $validate = $this->validate($Request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'int'],
            'address' => ['required', 'string', 'max:255'],
            'postalCode' => ['required', 'int'],
            'city' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
        ]);


            //Traer datos
            $id = $Request->input('idUser');
            $name = $Request->input('name');
            $surname = $Request->input('surname');
            $email = $Request->input('email');
            $phone = $Request->input('phone');
            $address = $Request->input('address');
            $postalCode = $Request->input('postalCode');
            $city = $Request->input('city');
            $province = $Request->input('province');

            $user=User::find($id);

            //Cargar valores
            $user->name = $name;
            $user->surname = $surname;
            $user->email = $email;
            $user->phone = $phone;
            $user->address = $address;
            $user->postalCode = $postalCode;
            $user->city = $city;
            $user->province = $province;

            $user->update();

            //Redireccion de la pagina
            return redirect()->route('user.list')->with(['message' => 'Usuario actualizado correctamente']);

    }



    public function editAdmin(){

        return view('user.editAdmin');
    }

    public function updateAdmin(Request $Request){

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

    public function list(){

        //Trae la tabla de Usuarios y la pasa por el View
        $users=User::orderBy('name','asc')->get(); 
        return view('user.list',['users'=>$users]);
    }
}
