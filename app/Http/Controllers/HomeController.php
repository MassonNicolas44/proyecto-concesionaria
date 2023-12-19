<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Engine;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
         
        $brandSearch=$request->input('brand_id');
        $engineSearch=$request->input('engine_id');        
       
        $imagesCar=Car::where('status','LIKE','Habilitado')
        ->where('brand_id','LIKE',$brandSearch)
        ->where('engine_id','LIKE',$engineSearch)
        ->orderBy('id','desc')
        ->paginate(5);

        $brands=Brand::orderBy('name','asc')->get();
        $engines=Engine::orderBy('description','asc')->get(); 

        return view('home',['brands'=>$brands,'engines'=>$engines,'imagesCar'=>$imagesCar]);
    }

}
