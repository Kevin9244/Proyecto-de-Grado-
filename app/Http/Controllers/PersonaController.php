<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona=DB::select("SELECT * FROM persona");
        return view('persona.index')
        ->with('persona',$persona)
        ;

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persona.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos=$request->all();
        $Usuario=new User();
 
        //dd($datos);
        $Usuario->email=$datos['email']; 
        $Usuario->per_cedula=$datos['per_cedula'];
        $Usuario->per_apellidos=$datos['per_apellidos'];
        $Usuario->per_nombres=$datos['per_nombres'];
        $Usuario->per_direccion=$datos['per_direccion'];
        $Usuario->per_telefono=$datos['per_telefono'];
        $Usuario->per_sexo=$datos['per_sexo'];
        $Usuario->per_usuario=$datos['per_usuario'];
        $Usuario->per_tipo=$datos['per_tipo'];

        $Usuario->password=bcrypt($datos['password']);
        $Usuario->save();
        return redirect(route('persona.index'));


        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona=user::find($id);
        //dd($persona);
        return view('persona.edit')
        ->with('persona',$persona)
        ;
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
        $datos=$request->all();
        $Usuario=user::find($id);
        $Usuario->email=$datos['email']; 
        $Usuario->per_cedula=$datos['per_cedula'];
        $Usuario->per_apellidos=$datos['per_apellidos'];
        $Usuario->per_nombres=$datos['per_nombres'];
        $Usuario->per_direccion=$datos['per_direccion'];
        $Usuario->per_telefono=$datos['per_telefono'];
        $Usuario->per_sexo=$datos['per_sexo'];
        $Usuario->per_usuario=$datos['per_usuario'];
        $Usuario->per_tipo=$datos['per_tipo'];

        $Usuario->password=bcrypt($datos['password']);
        $Usuario->update();
        return redirect(route('persona.index'));

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
