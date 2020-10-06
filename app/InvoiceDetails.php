<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    /**
     * Este es el model de InvoiceDetails
     * $filleable es un Array con el modelo
     */
    protected $fillable = [
        'quantity', 'total', 'discount','iva','state','size', 'product_id','invoice_id'
    ];
}
