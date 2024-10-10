<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Sede::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required',
            'nombre' => 'required|string',
            'dato_sede' => 'required|string|nullable',
            'contacto_sede' =>'required|nullable',
            'estatus' =>'required|boolean'
        ]);

        $post = Sede::create([
            'id_admin' => $request->id_admin,
            'nombre' => $request->nombre,
            'dato_sede' => $request->dato_sede,
            'contacto_sede' => $request->contacto_sede,
            'estatus'  => $request->estatus
        ]);

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return Sede::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Sede::findOrFail($id);
        $post->update($request->all());

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sede::destroy($id);

        return response()->json(null, 204);
    }
}
