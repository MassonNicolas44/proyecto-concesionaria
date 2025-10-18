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
        $sale->price=$car->price;
        $sale->status='Vendido';

        $customer=Customer::find($customer_id);
        $user=User::find($user_id);

        $car->update();
        $sale->save();

        //Redireccion de la pagina a la vista de Inicio
        return redirect()->route('sale.list')->with(['message' => 'Vehiculo: '.$car->brand->name.' '.$car->model.' ('.$car->year.') fue vendido al cliente '.$sale->customer->name.' '.$sale->customer->surname.' por el vendedor '.$sale->user->name.' '.$sale->user->surname ]);
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

    public function list(Request $request)
    {
        //Se obtienen los valores
        $userSearch=$request->input('user_id');
        $customerSearch=$request->input('customer_id');   
        $statusSaleSearch=$request->input('statusSale');   
        $dateIni=$request->input('dateIni');
        $dateEnd=$request->input('dateEnd');
        $dateNow=date('Y-m-d',strtotime(now()));

        //Se obtiene el objeto Venta y se filtra en caso que se haya seleccionado alguno
        $sales=Sale::where('user_id','LIKE',$userSearch)
            ->where('customer_id','LIKE',$customerSearch)
            ->where('status','LIKE',$statusSaleSearch);
            
        if (!empty($dateIni) && empty($dateEnd)) {
            $sales = $sales->whereBetween('created_at', [$dateIni, $dateNow]);
        } elseif (!empty($dateIni) && !empty($dateEnd)) {
            $sales = $sales->whereBetween('created_at', [$dateIni, $dateEnd]);
        }

        $sales=$sales->orderBy('id','asc')->get();
            
        //Orden la lista de 
        $users=User::select('id','name','surname')->distinct()->orderBy('name','asc')->get();
        $customers=Customer::select('id','name','surname')->distinct()->orderBy('name','asc')->get();
        $statusSale=Sale::select('status')->distinct()->orderBy('status','asc')->get(); 
        
        //Inicio de variable del precio total
        $totalPrice=0;
        
        foreach($sales as $sale){
            $totalPrice=$totalPrice+($sale->price);
        }

        return view('sales.list', compact('sales' ,'users','userSearch','customers','customerSearch','statusSale','statusSaleSearch','totalPrice'));
    
    }

    public function report(Request $request)
    {

        //Se obtienen los valores
        $userSearch=$request->input('user_id');
        $customerSearch=$request->input('customer_id');   
        $statusSaleSearch=$request->input('statusSale');   
        $dateIni=$request->input('dateIni');
        $dateEnd=$request->input('dateEnd');   

        //Se obtiene el objeto Venta y se filtra en caso que se haya seleccionado alguno
        $sales=Sale::where('user_id','LIKE',$userSearch)
            ->where('customer_id','LIKE',$customerSearch)
            ->where('status','LIKE',$statusSaleSearch);
            
        if (!empty($dateIni) && empty($dateEnd)) {
            $sales = $sales->whereBetween('created_at', [$dateIni, $dateNow]);
        } elseif (!empty($dateIni) && !empty($dateEnd)) {
            $sales = $sales->whereBetween('created_at', [$dateIni, $dateEnd]);
        }

        $sales=$sales->orderBy('id','asc')->get();
        
        //Inicio de variable del precio total
        $totalPrice=0;
        
        foreach($sales as $sale){
            $totalPrice=$totalPrice+($sale->price);
        }
        
        //Trae los nombres de los filtros
        $userSearch=User::find($userSearch);
        $customerSearch=Customer::find($customerSearch);
        
        $pdf=Pdf::loadView('sales.report',compact('sales','userSearch','customerSearch','statusSaleSearch','totalPrice','dateIni','dateEnd'));
        return $pdf->stream('sale_report.pdf');
        
    }
    

}