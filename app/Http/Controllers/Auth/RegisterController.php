<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'min:1' ,'string', 'max:255'],
            'surname' => ['required','min:1' , 'string', 'max:255'],
            'email' => ['required', 'min:1' ,'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:1' ,'int'],
            'address' => ['required', 'min:1' ,'string', 'max:255'],
            'postalCode' => ['required', 'min:1' ,'int'],
            'city' => ['required', 'min:1' ,'string', 'max:255'],
            'province' => ['required', 'min:1' ,'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'postalCode' => $data['postalCode'],
            'city' => $data['city'],
            'province' => $data['province'],
            'password' => 'null',
            'rol' => 'Cliente',
            'status' => 'Habilitado',
            'image' => 'null',
        ]);
    }
}
