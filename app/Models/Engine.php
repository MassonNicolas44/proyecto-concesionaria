<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{

    protected $table = 'engines';

    //Relacion de uno a muchos
    public function car()
    {
        return $this->HasMany('App\Models\Car');
    }

    use HasFactory;
}
