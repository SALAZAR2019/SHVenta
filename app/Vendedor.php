<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    //
    protected $table='vendedores';
    protected $primaryKey='id_vendedor';

    // public $timestamps=false;
    // public $incrementing=false;

    public $fillable=[
    	'id_vendedor',
    	'nombre',
    	'celular',
    	'activo'
    ];
}
