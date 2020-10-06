<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarDetails extends Model
{
    /**
     * Este es el model de CarDetails
     * $filleable es un Array con el modelo
     */
    protected $fillable = [
        'quantity', 'total', 'discount','iva','state','size', 'product_id','car_id'
    ];
}
