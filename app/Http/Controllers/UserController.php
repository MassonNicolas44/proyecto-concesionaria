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

    public function edit($id){
        //Trae la tabla de User desde la base de datos y la pasa por el View
        $users=User::find($id);

        return view('users.edit',['user'=>$users]);
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
        ] );

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

        //Redireccion de la pagina a la lista de Personal Administrativo
        return redirect()->route('user.list')->with(['message' => 'Personal Administrativo '.$name.' '.$surname.' actualizado correctamente']);
    }


    public function save(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'loginCode' => ['required', 'min:1' ,'string', 'max:255', 'unique:users'],
        'password' => ['required', 'min:1' ,'string', 'max:255'],
        'name' => ['required', 'min:1' ,'string', 'max:255'],
        'surname' => ['required','min:1' , 'string', 'max:255'],
        'dni' => ['required', 'min:1' ,'int', 'unique:users'],
        'email' => ['required', 'min:1' ,'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'min:1' ,'int'],
        'address' => ['required', 'min:1' ,'string', 'max:255'],
        'postalCode' => ['required', 'min:1' ,'int'],
        'city' => ['required', 'min:1' ,'string', 'max:255'],
        'province' => ['required', 'min:1' ,'string', 'max:255'],
        'rol' => ['required', 'min:1' ,'string', 'max:255'],
        ] );

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

        //Redireccion de la pagina al inicio
        return redirect()->route('user.list')->with(['message' => 'Personal Administrativo '.$name.' '.$surname.' con el rol de '.$rol.' agregado correctamente']);
    }



    public function editConfig(){
        return view('users.editConfig');
    }

    public function updateConfig(Request $Request){

        //Se obtienen los datos de la persona logeada
        $user=\Auth::User();

        //Validacion de datos antes de cargar
        $validate = $this->validate($Request, [
        'loginCode' => ['required','min:1', 'max:255'],
            ] );

        //Se obtienen los datos
        $loginCode = $Request->input('loginCode');
        $oldPassword=$Request->input('oldPassword');
        $newPassword=$Request->input('newPassword');
        $confirmPassword=$Request->input('confirmPassword');

        //Cargar valores
        $user->loginCode = $loginCode;

        //Validacion de que exista los 3 campos de las contraseñas
        if($oldPassword && $newPassword && $confirmPassword) {

            //Comparacion entre la contraseña antigua ingresada con la contraseña en la BD
            if (password_verify($oldPassword, $user->password)) {

                //Comparacion entre la nueva contraseña y la confirmacion de la misma
                if($newPassword==$confirmPassword){

                    //Cifrado de la contraseña para ser cargada en la BD
                    $user->password=Hash::make($newPassword);

                }else{

                    //Redireccion de la pagina a la misma vista, mostrando el error
                    return redirect()->route('user.editConfig')->with(['message' => 'No coincide la nueva contraseña con la confirmacion de la contraseña']);

                }

            } else {

                //Redireccion de la pagina a la misma vista, mostrando el error
                return redirect()->route('user.editConfig')->with(['message' => 'No coincide la contraseña ingresada con la antigua']);
            }

        }

        $user->update();

        //Redireccion de la pagina a la misma vista
        return redirect()->route('user.editConfig')->with(['message' => 'Datos modificados correctamente']);

    }

    public function delete($id)
    {

        $name=User::find($id)->name;
        $surname=User::find($id)->surname;

        //Se obtiene el objeto desde el Id del Personal Administrativo a eliminar
        User::find($id)->delete();

        //Redireccion de la pagina a la lista del Personal Administrativo
        return redirect()->route('user.list')->with(['message' => 'El Personal '.$name.' '.$surname.'  se ha eliminado correctamente']);
    }

    public function list($id=null,$status=null){

        //Validacion para saber si debe actualizar el estatus del Personal Administrativo
        if($id!=null && $status!=null){
            
            //Se obtiene el objeto del Personal a modificar
            $user = User::find($id);

            //Validacion de actualizacion del Personal
            if($status=="Deshabilitado"){
                $user->status='Deshabilitado';
            }else{
                $user->status='Habilitado';
            }

            $user->update();
        }

        //Ordena la tabla obtenida por el Nombre
        $users=User::orderBy('name','asc')->get(); 
        return view('users.list',['users'=>$users]);
    }

}
