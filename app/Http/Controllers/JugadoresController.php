<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Posicion;
//use App\Models\Equipo;
use Illuminate\Support\Facades\file;

class JugadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores=Jugador::all();
        return view('jugadores.index')
                ->with('jugador',$jugadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jugadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$posiciones=Posiciones::all();
        //$equipos=Equipo::all();
        if($request->hasFile('foto')){
            $file=$request->file('foto');
            $foto=time(). $file->getClientOriginalName();
            $file->move('imagenes/jugadores',$foto);
        }
        $jugador = new Jugador();
        $jugador->nombre=$request->nombre;
        $jugador->posiciones=$request->posiciones['id'];
        $jugador->numero=$request->numero;
        $jugador->equipo_id=$request->equipo;
        $jugador->foto=$foto;
        $jugador->save();
        return 'Guardado';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugador= Jugador::find($id);
        return view('jugadores.show')
                ->with('id',$id)
                ->with('jugador',$jugador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $jugador=Jugador::find($id);
        $jugador->delete();
        File::delete('imagenes/jugadores/'.$jugador->foto);
        return redirect()->route('jugadores.index')
                            ->with('status','Jugador eliminado');
    }

       
}
