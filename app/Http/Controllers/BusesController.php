<?php

namespace mybusllc\Http\Controllers;


use Illuminate\Http\Request;

use mybusllc\Bus;

class BusesController extends Controller
{
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
     * Show the form for creating a new bus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $bus=new Bus();
        $bus->modelo=$request->modelo;
        $bus->name_conductor=$request->name_conductor;
        $bus->save();

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
     * Display all the bus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $buses = Bus::all();

        return response()->json(['error'=>false, 'data'=>$buses]);
    }

    /**
     * Show the form for editing the specified bus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $bus = Bus::find($request->id);
        $bus->name_conductor = $request->name_conductor;
        $bus->modelo = $request->modelo;
        $bus->save();

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
     * Remove the specified bus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $bus = Bus::find($request->id);
        $bus->delete();

        return response()->json(['message' => 'Ok', 'error'=>false]);
    }
}
