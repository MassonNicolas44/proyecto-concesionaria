<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

use Barryvdh\DomPDF\Facade\Pdf;

class CustomerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('customers.create');
    }

    public function save(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'name' => ['required', 'min:1' ,'string', 'max:255'],
        'surname' => ['required','min:1' , 'string', 'max:255'],
        'dni' => ['required', 'min:1' ,'int'],
        'email' => ['required', 'min:1' ,'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'min:1' ,'int'],
        'address' => ['required', 'min:1' ,'string', 'max:255'],
        'postalCode' => ['required', 'min:1' ,'int'],
        'city' => ['required', 'min:1' ,'string', 'max:255'],
        'province' => ['required', 'min:1' ,'string', 'max:255'],
        ]
    );

        //Traer datos
        $name = $request->input('name');
        $surname = $request->input('surname');
        $dni = $request->input('dni');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $postalCode = $request->input('postalCode');
        $city = $request->input('city');
        $province = $request->input('province');   
 
        //Cargar valores
        $customer = new Customer();

        $customer->name=$name;
        $customer->surname=$surname;
        $customer->dni=$dni;
        $customer->email=$email;
        $customer->phone=$phone;
        $customer->address=$address;
        $customer->postalCode=$postalCode;
        $customer->city=$city;
        $customer->province=$province;
        $customer->status='Habilitado';

        $customer->save();

        //Redireccion de la pagina
        return redirect()->route('customer.list')->with(['message' => 'Cliente agrego correctamente']);
    }

    public function edit($id){

        //Trae la tabla de Marca y Motor desde la base de datos y la pasa por el View
        $customers=Customer::find($id);

        return view('customers.edit',['customer'=>$customers]);
    }

    public function update(Request $Request){

        //Validacion de datos antes de cargar
        $validate = $this->validate($Request, [
            'name' => ['required','min:1', 'string', 'max:255'],
            'surname' => ['required','min:1', 'string', 'max:255'],
            'dni' => ['required','min:1', 'int'],
            'email' => ['required','min:1', 'string', 'email', 'max:255'],
            'phone' => ['required','min:1', 'int'],
            'address' => ['required','min:1', 'string', 'max:255'],
            'postalCode' => ['required','min:1', 'int'],
            'city' => ['required','min:1', 'string', 'max:255'],
            'province' => ['required','min:1', 'string', 'max:255'],
        ]);


            //Traer datos
            $id = $Request->input('idCustomer');
            $name = $Request->input('name');
            $surname = $Request->input('surname');
            $dni = $Request->input('dni');
            $email = $Request->input('email');
            $phone = $Request->input('phone');
            $address = $Request->input('address');
            $postalCode = $Request->input('postalCode');
            $city = $Request->input('city');
            $province = $Request->input('province');

            $customer=Customer::find($id);

            //Cargar valores
            $customer->name = $name;
            $customer->surname = $surname;
            $customer->dni = $dni;
            $customer->email = $email;
            $customer->phone = $phone;
            $customer->address = $address;
            $customer->postalCode = $postalCode;
            $customer->city = $city;
            $customer->province = $province;

            $customer->update();

            //Redireccion de la pagina
            return redirect()->route('customer.list')->with(['message' => 'Cliente actualizado correctamente']);

    }

    public function list($id=null,$status=null){


        if($id!=null && $status!=null){
            
            $customer = Customer::find($id);

            if($status=="Deshabilitado"){
                $customer->status='Deshabilitado';
            }else{
                $customer->status='Habilitado';
            }

            $customer->update();
        }

        //Trae la tabla de Usuarios y la pasa por el View
        $customers=Customer::orderBy('name','asc')->get(); 
        return view('customers.list',['customers'=>$customers]);
    }

    public function delete($id)
    {
        // Conseguir el objeto image
        Customer::find($id)->delete();

        //Redireccion de la pagina
        return redirect()->route('customer.list')->with(['message' => 'El Cliente se ha eliminado correctamente']);
    }

    public function report()
    {

        $customers=Customer::orderBy('name','asc')->get();

        $pdf=Pdf::loadView('customers.report',compact('customers'));

        return $pdf->stream('customer_report.pdf');
    }
}
