<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $table = 'sales';


    //Relacion de muchos a uno
    public function car()
    {
        return $this->belongsTo('App\Models\Car', 'car_id');
    }

    //Relacion de muchos a uno
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

        //Relacion de muchos a uno
        public function customer()
        {
            return $this->belongsTo('App\Models\Customer', 'customer_id');
        }

    use HasFactory;
}
