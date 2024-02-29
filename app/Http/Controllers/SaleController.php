<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Engine;
use App\Models\Customer;
use App\Models\User;
use App\Models\Sale;

use Barryvdh\DomPDF\Facade\Pdf;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id)
    {
        //Se obtienen los objetos necesarios y los pasa por el View
        $cars=Car::find($id);  
        $brands=Brand::find($cars->brand_id);  
        $engines=Engine::find($cars->engine_id);  

        //Filtra al los clientes por su estado de Habilitado
        $customers=Customer::where('status','LIKE','Habilitado')
        ->orderBy('name','asc')->get();   

        return view('sales.create',compact('cars','brands','engines','customers'));
    }

    public function save(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'customer_id' => ['required'],
            'car_id' => ['required'],
            'user_id' => ['required'],
        ] );

        //Se obtienen los datos
        $customer_id = $request->input('customer_id');
        $car_id = $request->input('car_id');
        $user_id = $request->input('user_id');

        //Descuento del stock
        $car=Car::find($car_id);
        $car->stock=($car->stock)-1;

        //Cargar valores
        $sale= New Sale;
        $sale->customer_id=$customer_id;
        $sale->car_id=$car_id;
        $sale->user_id=$user_id;
        $sale->status='Vendido';

        $customer=Customer::find($customer_id);
        $user=User::find($user_id);

        $car->update();
        $sale->save();

        //Redireccion de la pagina a la vista de Inicio
        return redirect()->route('sale.list')->with(['message' => 'Vehiculo: '.$car->brand->name.' '.$car->model.' ('.$car->year.') fue vendido al cliente '.$sale->customer_id->name.' '.$sale->customer_id->surname.' por el vendedor '.$sale->user_id->name.' '.$sale->user_id->surname ]);
    }
    
    public function delete($idSale,$idCar)
    {
        //Se obtiene el objeto de Venta y el Vehiculo
        $sale=Sale::find($idSale);
        $car=Car::find($idCar);

        //Se descuenta el stock y se anula la venta
        $car->stock=($car->stock)+1;
        $sale->status='Anulada';

        $car->update();
        $sale->update();

        $sales=Sale::all();

        //Redireccion de la pagina de la lista de ventas
        return redirect()->route('sale.list', ['sales' => $sales])->with(['message' => 'Venta anulada correctamente']);
    }

    public function list()
    {
        $sales=Sale::all();
        return view('sales.list', ['sales' => $sales]);
    }

    public function report()
    {
        $sales=Sale::all();
        $pdf=Pdf::loadView('sales.report',compact('sales'));
        return $pdf->stream('sale_report.pdf');
    }
    

}