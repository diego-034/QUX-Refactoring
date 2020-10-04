<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    protected $fillable = [
        'quantity', 'total', 'discount','iva','state','size', 'product_id','invoice_id'
    ];
}
