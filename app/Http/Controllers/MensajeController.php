<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Mensaje::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ticket' => 'required',
            'id_emisor' => 'required',
            'descripcion' => 'required|string',
            'mensaje' =>'required|string',
        ]);

        $post = Mensaje::create([
            'id_ticket' => $request->id_ticket,
            'id_emisor' => $request->id_emisor,
            'descripcion' => $request->descripcion,
            'mensaje' => $request->mensaje,
        ]);

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return Mensaje::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Mensaje::findOrFail($id);
        $post->update($request->all());

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mensaje::destroy($id);
        return response()->json(null, 204);
    }
}
