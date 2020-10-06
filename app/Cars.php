<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    /**
     * Este es el model de Cars
     * $filleable es un Array con el modelo
     */
    protected $fillable = [
        'total', 'total_discount', 'total_iva','state','token'
    ];
}
