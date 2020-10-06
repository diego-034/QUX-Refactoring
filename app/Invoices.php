<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    /**
     * Este es el model de Invoices
     * $filleable es un Array con el modelo
     */
    protected $fillable = [
        'total', 'total_discount', 'total_iva','state','client_id','user_id'
    ];
}
