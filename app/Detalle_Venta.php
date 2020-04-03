<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    //
     protected $table='detalle_venta';
     protected $primaryKey='id_venta';
     protected $with=['producto'];

    public $timestamps=false;
    // public $incrementing=false;

    public $fillable=[
    	'id_venta',
    	'id_producto',
    	'cantidad',
    	'precio',
    	'total',
    	'folio'
    ];


    public function producto(){
         return $this->belongsTo(Producto::class,'id_producto','id_producto');
    	
    }
}
