<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class ApiProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Producto::all();
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
        $producto = new Producto;
        $producto->id_producto=$request->get('id_producto');
        $producto->nombre=$request->get('nombre');
        $producto->precio=$request->get('precio');
        $producto->cantidad=$request->get('cantidad');
        $producto->save();
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
        return $producto=Producto::find($id);
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
        $producto=Producto::find($id);

        $producto->nombre=$request->get('nombre');
        // $usuarios->id_rol=$request->get('id_rol');
        $producto->cantidad=$request->get('cantidad');
        $producto->precio=$request->get('precio');
        // $usuarios->apellido_M=$request->get('apellido_P');
        // $usuarios->apellido_P=$request->get('apellido_M');
        // $usuarios->direccion=$request->get('direccion');
        // $usuarios->localidad=$request->get('localidad');
        // $usuarios->email=$request->get('email');
        // $usuarios->celular=$request->get('celular');
        // $usuarios->edad=$request->get('edad');
        // $usuarios->password=$request->get('password');
        // $usuarios->sexo=$request->get('sexo');
        $producto->update();
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
        return Producto::destroy($id);
    }
}
