<?php

namespace App\Http\Controllers\Admin\Grupo;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    
    public function index()
    {
        try {

            $grupo = Grupo::all();
            // $grupo = Grupo::where('estatus',1)->get();

            if ($grupo->isEmpty()) {
                return response()->json(['message' => 'No se encontraron grupos'], 404);
            }

            return response()->json($grupo, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los grupos', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $grupo = Grupo::create($request->all());
            return response()->json($grupo, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el admin', 'error' => $e->getMessage()], 500);
        }
    }


    public function show($id)
    {
        try{
            $grupo = Grupo::findOrFail($id);
            return response()->json($grupo, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener al grupo','error'=>$e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $grupo = Grupo::findOrFail($id);
            $grupo->update($request->all());
            return response()->json($grupo, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar el grupo', 'error' =>$e->getMessage()
            ],500);
        }

    }

    public function destroy( $id)
    {
        try{
            $grupo = Grupo::FindOrFail($id);

            $grupo->estatus = 0;

            $grupo->save();
            return response()->json(['message' => 'Grupo eliminado con exito'], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al eliminar el grupo', 'error' => $e->getMessage()
            ],500);
        }
    }
}
