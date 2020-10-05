<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $fillable = [
        'total', 'total_discount', 'total_iva','state','token'
    ];
}
