<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    //
    protected $table='user';
    protected $primaryKey='id_user';
    protected $with=['rol'];

    public $timestamps=false;
    public $incrmenting=false;

    public $fillable=[
    'id_user',
    'username',
    'password',
    'id_rol',
    'nombre',
    'apellidos'
    ];
    public function rol(){
        return $this->belongsTo(Rol::class,'id_rol','id_rol');
    }
}
