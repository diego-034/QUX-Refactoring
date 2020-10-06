<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{ 
    /**
    * Este es el model de Types
    * $filleable es un Array con el modelo
    */
    protected $fillable= ['name'];
}
