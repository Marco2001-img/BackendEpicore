<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        try{
        $ticket = Ticket::all();

        if($ticket->isEmpty()){
            return response()->json(['message' => 'No se encontraron Tickets'],200);
        }

        return response()->json($ticket, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener los tickets', 'error'=>$e->getMessage()
            ],500);
        }
    }


    public function store(Request $request)
    {
        try{
            $ticket = Ticket::create($request->all());
            return response()->json($ticket, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear el ticket', 'error' => $e->getMessage()
            ],500);
        }
    }


    public function show(string $id)
    {
        try{

        $ticket = Ticket::FindOrFail($id);
        return response()->json($ticket, 200);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener el ticket', 'error' =>$e->getMessage()
            ],500);
        }
    }


    public function update(Request $request, $id)
    {
        try{

        $ticket = Ticket::FindOrFail($id);
        $ticket->update($request->all());

        return response()->json($ticket, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar el ticket', 'error'=>$e->getMessage()
            ],500);
        }
    }

    
    public function destroy($id)
    {
        try{
        $ticket = Ticket::FindOrFail($id);

        $ticket->estatus = 0;

        $ticket->save();
        return response()->json(['message' => 'Ticket eliminado con exito'],200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al eliminar Ticket', 'error' =>$e->getMessage()
            ],500);
        }
    }
}
