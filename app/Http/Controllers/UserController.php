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
            'name' => ['required','min:1', 'string', 'max:255'],
            'surname' => ['required','min:1', 'string', 'max:255'],
            'email' => ['required','min:1', 'string', 'email', 'max:255'],
            'phone' => ['required','min:1', 'int'],
            'address' => ['required','min:1', 'string', 'max:255'],
            'postalCode' => ['required','min:1', 'int'],
            'city' => ['required','min:1', 'string', 'max:255'],
            'province' => ['required','min:1', 'string', 'max:255'],
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
            return redirect()->route('user.list')->with(['message' => 'Cliente actualizado correctamente']);

    }

    public function editAdmin(){

        return view('user.editAdmin');
    }

    public function updateAdmin(Request $Request){

        $user=\Auth::User();
        $id=$user->id;

        //Validacion de datos antes de cargar
       $validate = $this->validate($Request, [
        'name' => ['required','min:1', 'max:255'],
        'surname' => ['required','min:1','max:255','unique:users,surname,'.$id],
        'email' => ['required','min:1', 'string', 'max:255','unique:users,email,'.$id],
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
    return redirect()->route('user.config')->with(['message' => 'Cliente actualizado correctamente']);

    }

    public function list($id=null,$status=null){


        if($id!=null && $status!=null){
            
            $user = User::find($id);

            if($status=="Deshabilitado"){
                $user->status='Deshabilitado';
            }else{
                $user->status='Habilitado';
            }

            $user->update();
        }

        //Trae la tabla de Usuarios y la pasa por el View
        $users=User::where('rol','LIKE','Cliente')
        ->orderBy('name','asc')->get(); 
        return view('user.list',['users'=>$users]);
    }

    public function delete($id)
    {
        // Conseguir el objeto image
        User::find($id)->delete();

        //Redireccion de la pagina
        return redirect()->route('user.list')->with(['message' => 'El Cliente se ha eliminado correctamente']);
    }
}
