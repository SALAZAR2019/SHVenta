<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use Session;
use Redirect;
use Cache;
use Cookie;

class AccesoController extends Controller
{

      public function validar(Request $request){
        // return 'HOLA';

        // return Usuario::all();
        $user=$request->usuario;
        $password=$request->pass;
        
        $resp= usuario::where('username', '=',$user)
        ->where('password','=', $password)
        ->get();
       

        // return $resp;
        if (count($resp)>0){

            $user =$resp[0]->nombre.' '.$resp[0]->apellidos;

            Session::put('usuario',$user);
            Session::put('rol',$resp[0]->rol->rol);
            Session::put('foto',$resp[0]->foto);
            Session::put('ape',$resp[0]->id_user);
            Session::put('apellidop',$resp[0]->apellidop);
            Session::put('nombre',$resp[0]->nombre);




            if($resp[0]->rol->rol=="usuario")
              return Redirect::to('perfil');
            elseif ($resp[0]->rol->rol=="usuario")
                return Redirect::to('citas');
            elseif ($resp[0]->rol->rol=="usuario")
                return Redirect::to('citas');
            }

            else
                return Redirect::to('log');
            
    }

    public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);

        return Redirect::to('log');
    }

}
