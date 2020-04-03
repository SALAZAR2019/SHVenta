<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diario extends Model
{
    //
    protected $table ='gasto_diario';
    protected $primaryKey='id_gasto';


    public $timestamps=false;
    public $incrmenting=false;


    public $fillable=[
    'id_gasto',
    'nombre_gastos',
    'tipo_gastos',
    'fecha',
    'precio',
    ];
}
