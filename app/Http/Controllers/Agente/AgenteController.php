<?php

namespace App\Http\Controllers\Agente;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Agente;
use Illuminate\Http\Request;

class AgenteController extends Controller
{
    
    public function index()
    {
        try{
        $agente = Agente::all();

        if($agente->isEmpty()){
            return response()->json(['message' => 'No se encontraron Agentes'],200);
        }

        return response()->json($agente, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener los agentes', 'error'=>$e->getMessage()
            ],500);
        }
    }


    public function store(Request $request)
    {
        try{
            $agente = Agente::create($request->all());
            return response()->json($agente, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear el cliente', 'error' => $e->getMessage()
            ],500);
        }
    }


    public function show(string $id)
    {
        try{

        $agente = Agente::FindOrFail($id);
        return response()->json($agente, 200);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener el agente', 'error' =>$e->getMessage()
            ],500);
        }
    }


    public function update(Request $request, $id)
    {
        try{

        $agente = Agente::FindOrFail($id);
        $agente->update($request->all());

        return response()->json($agente, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar el agente', 'error'=>$e->getMessage()
            ],500);
        }
    }

    
    public function destroy($id)
    {
        try{
        $agente = Admin::FindOrFail($id);

        $agente->estatus = 0;

        $agente->save();
        return response()->json(['message' => 'Agente eliminado con exito'],200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al eliminar agente', 'error' =>$e->getMessage()
            ],500);
        }
    }
}
