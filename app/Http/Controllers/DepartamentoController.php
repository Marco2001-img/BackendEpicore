<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Departamento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_sede' => 'required',
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'estatus' =>'required|boolean',
        ]);

        $post = Departamento::create([
            'id_sede' => $request->id_sede,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus,
        ]);

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return Departamento::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Departamento::findOrFail($id);
        $post->update($request->all());

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Departamento::destroy($id);

        return response()->json(null, 204);
    }
}
