<?php

namespace mybusllc\Http\Controllers;

use Illuminate\Http\Request;

use mybusllc\Rutas;
use mybusllc\Bus;

class RutasController extends Controller
{


    /**
     * Display la cotizacion del ticket
     *
     * 
     */

    public function cotizar(Request $request){

             $data =array();
             $result=Rutas::where('origen','=',$request->origen)
                            ->where('destino','=',$request->destino)->get();

            $index=0;
            foreach ($result as $value){
                $data[$index]["ruta"]=$request->origen."->".$request->destino;
                $data[$index]["valor"]=$value->valor;

                $index +=1;
            }

             $origenes=Rutas::where('origen','=',$request->origen)->get();

             foreach ($origenes as $value){
                $queryset=Rutas::where('origen','=',$value->destino)
                            ->where('destino','=',$request->destino)->get();

                if(count($queryset)>0){
                    foreach ($queryset as $items){
                        $valor=$value->valor+$items->valor;
                        $data[$index]["ruta"]=$request->origen."->".$items->origen."->".$request->destino;
                        $data[$index]["valor"]=$valor;

                        $index +=1;
                    }

                }

            }

             

        return response()->json(['error'=>false, 'data'=>$data]);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new ruta.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rutas=new Rutas();
        $rutas->nombre_ruta=$request->nombre_ruta;
        $rutas->origen=$request->origen;
        $rutas->valor=$request->valor;
        $rutas->destino=$request->destino;
        $rutas->bus_id=$request->bus_id;
        
        $rutas->save();

        return response()->json(['message' => 'Ok', 'error'=>false]);
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
    }

    /**
     * Display the all ruta.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         $rutas = Rutas::all();
         $data =array();

         $index=0;
         foreach ($rutas as $value)
           {
                $data[$index]['id']  = $value->id;
                $data[$index]['nombre_ruta']  = $value->nombre_ruta;
                $data[$index]['origen']  = $value->origen;
                $data[$index]['valor']  = $value->valor;
                $data[$index]['destino']  = $value->destino;
                $data[$index]['bus_id']  = $value->bus_id;

                $bus=Bus::find($value->bus_id);
                $data[$index]['modelo_bus']  = $bus->modelo;
                $index +=1;
           }


        return response()->json(['error'=>false, 'data'=>$data]);
    }

    /**
     * Show the form for editing the specified ruta.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $rutas = Rutas::find($request->id);
        $rutas->nombre_ruta=$request->nombre_ruta;
        $rutas->origen=$request->origen;
        $rutas->valor=$request->valor;
        $rutas->destino=$request->destino;
        $rutas->bus_id=$request->bus_id;

        $rutas->save();

        return response()->json(['message' => 'Ok', 'error'=>false]);
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
     * Remove the specified ruta.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rutas = Rutas::find($request->id);
        $rutas->delete();

        return response()->json(['message' => 'Ok', 'error'=>false]);
    }
}
