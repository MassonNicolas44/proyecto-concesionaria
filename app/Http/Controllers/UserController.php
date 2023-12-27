<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('users.create');
    }

    public function update(Request $request)
    {
        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'loginCode' => ['required', 'min:1' ,'string', 'max:255'],
        'name' => ['required', 'min:1' ,'string', 'max:255'],
        'surname' => ['required','min:1' , 'string', 'max:255'],
        'dni' => ['required', 'min:1' ,'int'],
        'email' => ['required', 'min:1' ,'string', 'email', 'max:255'],
        'phone' => ['required', 'min:1' ,'int'],
        'address' => ['required', 'min:1' ,'string', 'max:255'],
        'postalCode' => ['required', 'min:1' ,'int'],
        'city' => ['required', 'min:1' ,'string', 'max:255'],
        'province' => ['required', 'min:1' ,'string', 'max:255'],
        ]
    );

        //Traer datos
        $id = $request->input('idUser');
        $loginCode = $request->input('loginCode');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $dni = $request->input('dni');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $postalCode = $request->input('postalCode');
        $city = $request->input('city');
        $province = $request->input('province');   
        $rol = $request->input('rol');
 
        //Cargar valores
        $user=User::find($id);

        $user->loginCode=$loginCode;
        $user->name=$name;
        $user->surname=$surname;
        $user->dni=$dni;
        $user->email=$email;
        $user->phone=$phone;
        $user->address=$address;
        $user->postalCode=$postalCode;
        $user->city=$city;
        $user->province=$province;
        $user->rol=$rol;

        $user->update();

        //Redireccion de la pagina
        return redirect()->route('user.list')->with(['message' => 'Personal Administrativo actualizado correctamente']);
    }


    public function save(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'loginCode' => ['required', 'min:1' ,'string', 'max:255', 'unique:users'],
        'password' => ['required', 'min:1' ,'string', 'max:255'],
        'name' => ['required', 'min:1' ,'string', 'max:255'],
        'surname' => ['required','min:1' , 'string', 'max:255'],
        'dni' => ['required', 'min:1' ,'int'],
        'email' => ['required', 'min:1' ,'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'min:1' ,'int'],
        'address' => ['required', 'min:1' ,'string', 'max:255'],
        'postalCode' => ['required', 'min:1' ,'int'],
        'city' => ['required', 'min:1' ,'string', 'max:255'],
        'province' => ['required', 'min:1' ,'string', 'max:255'],
        'rol' => ['required', 'min:1' ,'string', 'max:255'],
        ]
    );

        //Traer datos
        $loginCode = $request->input('loginCode');
        $password = $request->input('password');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $dni = $request->input('dni');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $postalCode = $request->input('postalCode');
        $city = $request->input('city');
        $province = $request->input('province');   
        $rol = $request->input('rol');
 
        //Cargar valores
        $user = new User();

        $user->loginCode=$loginCode;
        $user->password=Hash::make($password);
        $user->name=$name;
        $user->surname=$surname;
        $user->dni=$dni;
        $user->email=$email;
        $user->phone=$phone;
        $user->address=$address;
        $user->postalCode=$postalCode;
        $user->city=$city;
        $user->province=$province;
        $user->rol=$rol;
        $user->status='Habilitado';

        $user->save();

        //Redireccion de la pagina
        return redirect()->route('home')->with(['message' => 'Personal Administrativo agrego correctamente']);
    }


    public function edit($id){

        //Trae la tabla de Marca y Motor desde la base de datos y la pasa por el View
        $users=User::find($id);

        return view('users.edit',['user'=>$users]);
    }

    public function editConfig(){

        return view('users.editConfig');
    }

    public function updateConfig(Request $Request){

        $user=\Auth::User();

        //Validacion de datos antes de cargar
       $validate = $this->validate($Request, [
        'loginCode' => ['required','min:1', 'max:255'],
            ]
        );

    //Traer datos
    $loginCode = $Request->input('loginCode');
    $oldPassword=$Request->input('oldPassword');
    $newPassword=$Request->input('newPassword');
    $confirmPassword=$Request->input('confirmPassword');

    //Cargar valores
    $user->loginCode = $loginCode;

    // Ver el ejemplo de password_hash() para ver de dónde viene este hash. 

    if($oldPassword && $newPassword && $confirmPassword) {

        if (password_verify($oldPassword, $user->password)) {

            if($newPassword==$confirmPassword){

                $user->password=Hash::make($newPassword);

            }else{

                return redirect()->route('user.editConfig')->with(['message' => 'No coincide la nueva contraseña con la confirmacion de la contraseña']);

            }

        } else {

            return redirect()->route('user.editConfig')->with(['message' => 'No coincide la contraseña ingresada con la antigua']);
        }

    }

    $user->update();

    //Redireccion de la pagina
    return redirect()->route('user.editConfig')->with(['message' => 'Datos modificados correctamente']);


    }

    public function delete($id)
    {
        // Conseguir el objeto image
        User::find($id)->delete();

        //Redireccion de la pagina
        return redirect()->route('user.list')->with(['message' => 'El Persoanl se ha eliminado correctamente']);
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
        $users=User::orderBy('name','asc')->get(); 
        return view('users.list',['users'=>$users]);
    }

}
