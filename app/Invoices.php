<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $fillable = [
        'total', 'total_discount', 'total_iva','state','client_id','user_id'
    ];
}
