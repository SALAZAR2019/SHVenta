<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    //
     protected $table='ventas';
     protected $primaryKey='folio';
     protected $with=['vendedor','detalle'];

    // public $timestamps=false;
    public $incrementing=false;

    public $fillable=[
    	'folio',
    	'id_vendedor',
    	'total',
    	'fecha_venta'
    ];

    public function vendedor(){
    	return $this->belongsTo(Vendedor::class,'id_vendedor','id_vendedor');
    }

    public function detalle()
    {
    	return $this->hasMany('App\Detalle_Venta','folio','folio');
    }
}
