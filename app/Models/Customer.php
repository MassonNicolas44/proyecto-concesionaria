<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

        //Relacion de uno a muchos
        public function sale()
        {
            return $this->HasMany('App\Models\Sale');
        }
}
