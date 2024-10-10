<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ticket::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required',
            'id_agente' => 'required|string',
            'prioridad_ticket' => 'required|string|enum',
            'id_tipo_ticket' =>'required|boolean',
            'nombre_ticket' => 'required|string',
            'estado_ticket' => 'required|string|enum',
            'asunto' => 'required|string|enum',
            'estatus' => 'required|boolean'
        ]);

        $post = Ticket::create([
            'id_cliente' => $request->id_cliente,
            'id_agente' => $request->id_agente,
            'prioridad_ticket' => $request->prioridad_ticket,
            'id_tipo_ticket' => $request->id_tipo_ticket,
            'nombre_ticket' => $request->nombre_ticket,
            'estado_ticket' => $request->estado_ticket,
            'asunto' => $request->asunto, 
            'estatus' => $request->estatus
        ]);

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return Ticket::findOrFail($id);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Ticket::findOrFail($id);
        $post->update($request->all());

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ticket::destroy($id);

        return response()->json(null, 204);
    }
}
