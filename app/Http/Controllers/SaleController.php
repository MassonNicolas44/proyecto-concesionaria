<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Engine;
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

        //Trae datos de la Base de Datos y se envian por el View
        $cars=Car::find($id);  
        $brands=Brand::find($cars->brand_id);  
        $engines=Engine::find($cars->engine_id);  
        $users=User::where('status','LIKE','Habilitado')
        ->where('rol','LIKE','Cliente')
        ->orderBy('name','asc')->get();   

        return view('sales.create',compact('cars','brands','engines','users'));
    }

    public function save(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
            'user_id' => ['required'],
            'car_id' => ['required'],
        ]
    );

        //Traer datos
        $user_id = $request->input('user_id');
        $car_id = $request->input('car_id');

        //Descuento del stock
        $car=Car::find($car_id);
        $car->stock=($car->stock)-1;

        //Cargar valores
        $sale= New Sale;
        $sale->user_id=$user_id;
        $sale->car_id=$car_id;
        $sale->status='Vendido';

        $car->update();
        $sale->save();

        //Redireccion de la pagina
        return redirect()->route('home')->with(['message' => 'Venta registrada correctamente']);
    }
    
    public function delete($idSale,$idCar)
    {

        $sale=Sale::find($idSale);
        $car=Car::find($idCar);

        $car->stock=($car->stock)+1;
        $sale->status='Anulada';

        $car->update();
        $sale->update();

        $sales=Sale::all();

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