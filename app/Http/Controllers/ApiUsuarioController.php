<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\usuario;
use Session;

class ApiUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return usuario::all();
        $id=Session::get('ape');
        return $usuario = usuario::
        where('id_user','=',$id)
        ->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuario = new usuario;
        $usuario->id_user=$request->get('id_user');
        $usuario->id_rol=$request->get('id_rol');
        $usuario->password=$request->get('password');
        $usuario->username=$request->get('username');
        $usuario->apellidos=$request->get('apellidos');
        // capturamos el archivo enviaado
        $foto=$request->file('foto');

        $nombre_foto=$request->get('username');

        if ($foto!=null) {
            $foto->move(public_path().'/img/usuario/',$nombre_foto.'.jpg');
            $usuario->foto=$nombre_foto.'.jpg';
        }

        $usuario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return usuario::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $usuarios=usuario::find($id);

        $usuarios->username=$request->get('username');
        // $usuarios->id_rol=$request->get('id_rol');
        $usuarios->password=$request->get('password');
        // $usuarios->apellido_M=$request->get('apellido_P');
        // $usuarios->apellido_P=$request->get('apellido_M');
        // $usuarios->direccion=$request->get('direccion');
        // $usuarios->localidad=$request->get('localidad');
        // $usuarios->email=$request->get('email');
        // $usuarios->celular=$request->get('celular');
        // $usuarios->edad=$request->get('edad');
        // $usuarios->password=$request->get('password');
        // $usuarios->sexo=$request->get('sexo');
        $usuarios->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return usuario::destroy($id);
    }
}
