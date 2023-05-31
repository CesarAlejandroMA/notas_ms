<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Metodo estatico porque no hay que crear instancia de un objeto
        $estudiantes = Estudiante::all();
        $data = json_encode(([
            "data" => $estudiantes
        ]));
            //json_encode sirve para convertir data en un objeto
        return response($data, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante = new Estudiante();
        $estudiante->codigo = $request->input('codigo');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->save();
        return response(json_encode([
            "data"=>"Estudiante registrado"
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        $estudiante = Estudiante::find($codigo);
        return response(json_encode([
            "data"=> $estudiante
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigo)
    {
        $estudiante = Estudiante::find($codigo);
        $estudiante->codigo = $request->input('codigo');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->save();
        return response(json_encode([
            "data"=> "Estudiante actualizado"
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
        $estudiante = Estudiante::find($codigo);
        if(empty($estudiante)){
            return response(json_encode([
                "data"=> "El estudiante no existe"
            ]),404);
        }
        $estudiante->delete();
        return response(json_encode([
            "data"=> "Estudiante eliminado"
        ]));
    }
}
