<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $table = 'cars';


    //Relacion de muchos a uno
    public function engine()
    {
        return $this->belongsTo('App\Models\Engine', 'engine_id');
    }

    //Relacion de muchos a uno
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }


    //Relacion de uno a muchos
    public function sale()
    {
        return $this->HasMany('App\Models\Sale');
    }

    use HasFactory;
}
