<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarDetailController extends Controller
{
 
    public function detail($id,$idImg=null,$img=null)
    {   
    
        //Se obtiene el objeto del Vehiculo (seleccionado por el Id)
        $imageCar=Car::with(['media'])->find($id);   

        return view('cars.detail', [
            'imageCar' => $imageCar,
            'img' => $img,
            'idImg' => $idImg,
        ]);
    }  

}
