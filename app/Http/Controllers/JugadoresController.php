<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Posicion;
use App\Models\Equipo;
use App\Models\Jugador;

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
        $equipos=Equipo::all();
        $posiciones=Posicion::all();
        return view('jugadores.index')
                ->with('jugador',$jugadores)
                ->with('equipos',$equipos)
                ->with('posiciones',$posiciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posiciones= Posicion::all();
        $equipos=Equipo::all();
        return view('jugadores.create')
                    ->with('posiciones',$posiciones)
                    ->with('equipos',$equipos);
                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posiciones=Posicion::all();
        $equipos=Equipo::all();
        
        if($request->hasFile('foto')){
            $file=$request->file('foto');
            $foto=$file->getClientOriginalName();
            $file->move('imagenes/jugadores',$foto);
        }
        $jugador = new Jugador();
        $jugador->nombre=$request->nombre;
        $jugador->posicion_id=$request->posicion;
        $jugador->numero=$request->numero;
        $jugador->equipo_id=$request->equipo;
        $jugador->foto=$foto;
        $jugador->save();
        return redirect()->route('jugadores.index')->with('status','Jugador Creado');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo=Equipo::find($id);
        $posiciones=Posicion::find($id);
        $jugador= Jugador::find($id);
        return view('jugadores.show')
                ->with('id',$id)
                ->with('jugador',$jugador)
                ->with('posiciones',$posiciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugadores= Jugador::find($id);
        $posiciones= Posicion::all();
        $equipos= Equipo::all();
        return view('jugadores.edit')
                    ->with('jugador',$jugadores)
                    ->with('posiciones',$posiciones)
                    ->with('equipos',$equipos);
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
        $jugador = Jugador::find($id);
        $jugador->nombre=$request->nombre;
        $jugador->posicion_id=$request->posicion;
        $jugador->numero=$request->numero;
        $jugador->equipo_id=$request->equipo;
        if($request->hasFile('foto'))
        {
            $file=$request->file('foto');
            $foto=$jugador->foto;
            $file->move('imagenes/jugadores',$foto);
        }
        $jugador->save();
        return redirect()->route('jugadores.index')
                                ->with('status','Jugador actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* $jugador=Jugador::find($id);
        $jugador->delete();
        File::delete('imagenes/jugadores/'.$jugador->foto);
        return redirect()->route('jugadores.index')
                            ->with('status','Jugador eliminado');*/
    }

       
}
