<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{

    // public function index()
    // {
    //     $mensaje = Mensaje::with('emisor')->get(); // Incluye el emisor
    //     return response()->json($mensaje);
    // }


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

    public function show( $id)
    {

    }

    public function update(Request $request, $id)
    {

    }


    public function destroy(string $id)
    {

    }
}
