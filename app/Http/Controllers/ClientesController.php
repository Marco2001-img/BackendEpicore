<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'nombre_corto'=> 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|email|unique:clientes,email',
            'password' => 'required',
            'estatus' =>'required|boolean',
            'observaciones' => 'required|string'
        ]);

        $post = Cliente::create([
            'nombre_completo'=> $request->nombre_completo,
            'nombre_corto' => $request->nombre_corto,
            'nombre' => $request->name,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estatus' => $request->estatus,
            'observaciones' => $request->observaciones
        ]);

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return Cliente::findOrFail($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Cliente::findOrFail($id);
        $post->update($request->all());

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Cliente::destroy($id);

        return response()->json(null, 204);
    }
}
