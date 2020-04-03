<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Producto;
use App\Detalle_Venta;
use DB;

class ApiVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Ventas::all();
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
        $venta = new Ventas;
        $venta->folio=$request->get('folio');
        $venta->id_vendedor=$request->get('id_vendedor');
        // $venta->tipo=$request->get('tipo');
        $venta->fecha_venta=$request->get('fecha_venta');
        $venta->total=$request->get('total');

        // return $venta->save();

        // GUARDAMOS LA VENTA 
        

        // ARRAY PARA CONSTRUIR LOS DATOS DEL DETALLE
        $records=[];



        $detalles=$request->get('detalles');


        for ($i=0;$i<count($detalles);$i++)
        {
            $records[]=[
                'folio'=>$request->get('folio'),
                'id_producto'=>$detalles[$i]['id_producto'],
                'cantidad'=>$detalles[$i]['cantidad'],
                'precio'=>$detalles[$i]['precio'],
                'total'=>$detalles[$i]['total'],
            ];

            $cant=$detalles[$i]['cantidad'];
            $codigo=$detalles[$i]['id_producto'];

            // ACTUALIZAMOS LA CANTIDAD DEL PRODUCTO QUE SE ESTA VENDIENDO
            DB::update("UPDATE productos 
                        SET cantidad=cantidad-$cant 
                        WHERE id_producto='$codigo'");
        }
        $venta->save();

        Detalle_Venta::insert($records);

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
        return Ventas::find($id);
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
    }
}
