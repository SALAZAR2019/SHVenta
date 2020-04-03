<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
     protected $table='productos';
     protected $primaryKey='id_producto';
    

     public $timestamps=false;
     public $incrementing=false;

    public $fillable=[
    	'id_producto',
    	'nombre',
    	'precio',
        'cantidad'
    ];

    protected $hidden=[
    	'activo'
    ];
}
