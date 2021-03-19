<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Http\Requests\StoreEquiposRequest;
use Illuminate\Support\Facades\file;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos= Equipo::all();
        return view('equipos.index')
                ->with('equipos',$equipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquiposRequest $request)
    {
        if($request->hasFile('escudo')){
            $file=$request->file('escudo');
            $escudo=time(). $file->getClientOriginalName();
            $file->move('imagenes/equipos',$escudo);
        }
        $equipo = new Equipo();
        $equipo->nombre=$request->nombre;
        $equipo->dt=$request->dt;
        $equipo->escudo=$escudo;
        $equipo->save();
        return redirect()->route('equipos.index')->with('status','Equipo creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo= Equipo::find($id);
        return view('equipos.show')
                ->with('id',$id)
                ->with('equipo',$equipo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo= Equipo::find($id);
        return view('equipos.edit')
                ->with('equipo',$equipo);
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
        $equipo=Equipo::find($id);
        $equipo->nombre=$request->nombre;
        $equipo->dt=$request->dt;
        if($request->hasFile('escudo')){
            $file=$request->file('escudo');
            $escudo=$equipo->escudo;
            $file->move('imagenes/equipos',$escudo);
        }
        $equipo->save();
        return redirect()->route('equipos.index')
                            ->with('status','Equipo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect()->route('equipos.index')
                        ->with('status','Equipo eliminado');
    }
/*
    private $arrayEquipos = array(
        array( 'nombre'=>'Equipo 1','dt'=>'D.T. 1', 'escudo'=>'/image/equipo2.jpg'
        ),
        array('nombre'=>'Equipo 2','dt'=>'D.T. 2', 'escudo'=>'/image/equipo3.jpg'
        ),
         array('nombre'=>'Equipo 3','dt'=>'D.T. 3', 'escudo'=>'/image/equipo1.jpg'
        ),
          array('nombre'=>'Equipo 4','dt'=>'D.T. 4', 'escudo'=>'/image/equipo4.jpg'
        ),
    );*/
}
