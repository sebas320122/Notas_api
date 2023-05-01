<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use Illuminate\Http\Request;
//agregar resource
use App\Http\Resources\NotaResource;
//importar validator
use Illuminate\Support\Facades\Validator;
class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //*********metodos rest

    //desplegar lista
    public function index()
    {
        $notas = Nota::all();

        return response(['notas' => NotaResource::collection($notas),
        'message' => 'Desplegando lista'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //guardar notas
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'horaFecha' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'id_clasificacion' => 'required',

        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(),
            'message' => 'ha ocurrido un error'], 400);
        }

        $nota = Nota::create($data);

        return response(['nota' => new NotaResource($nota), 'message' => 'Nota agregada'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */

     //mostrar nota particular
    public function show($id)    
    {
        $nota = Nota::findOrFail($id);
        return response(['nota' => new NotaResource($nota),
        'message' => 'Desplegando nota'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nota = Nota::findOrFail($id);
        $nota->update($request->all());
        
        return response(['nota' => new NotaResource($nota),
        'message' => 'Nota actualizada'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */

     //funcion eliminar
    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();
        return response(['message' => 'Nota eliminada']);
    }
}
