<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
     /**
     * Este es el model de Products
     * $filleable es un Array con el modelo
     */
    protected $fillable = [
        'name', 'image', 'description','state','color','price','iva','discount','user_id'
    ];
}
