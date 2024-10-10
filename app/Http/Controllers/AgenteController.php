<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Agente::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_departamento' => 'required',
            'id_grupo' => 'required',
            'nombre' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|email|unique:agentes,email',
            'password' => 'required',
            'estatus' =>'required|boolean',
            'estado_agente' =>  ['required','in:activo,inactivo,no_disponible']
        ]);

        $post = Agente::create([
            'id_departamento' => $request->id_departamento,
            'id_grupo' => $request->id_grupo,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estatus' => $request->estatus,
            'estado_agente'=> $request->estado_agente
        ]);

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return Agente::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Agente::findOrFail($id);
        $post->update($request->all());

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Agente::destroy($id);

        return response()->json(null, 204);
    }
}
