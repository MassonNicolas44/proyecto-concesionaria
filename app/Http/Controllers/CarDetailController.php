<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarDetailController extends Controller
{
 
    public function detail($id,$idImg=null,$img=null)
    {   
    
        $imageCar=Car::with(['media'])->find($id);   

        return view('cars.detail', [
            'imageCar' => $imageCar,
            'img' => $img,
            'idImg' => $idImg,
        ]);
    }  

}
