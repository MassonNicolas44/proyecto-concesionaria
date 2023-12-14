<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $imagesCar=Car::where('status','LIKE','Habilitado')
        ->orderBy('id','desc')
        ->paginate(5);

        return view('home',['imagesCar'=>$imagesCar]);
    }
}
