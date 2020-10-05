<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name', 'image', 'description','state','color','price','iva','discount','user_id'
    ];
}
