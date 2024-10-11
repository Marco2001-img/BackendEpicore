<?php

namespace App\Http\Controllers\Admin\Sede;

use App\Http\Controllers\Controller;
use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    
    public function index()
    {
        try{
        $sede = Sede::all();

        if($sede->isEmpty()){
            return response()->json(['message' => 'No se encontraron Sedes'], 404);
        }

        return response()->json($sede,200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener las sedes', 'error' => $e->getMessage()
            ],500);
        }
    }

    public function store(Request $request)
    {
        try{
            $sede = Sede::create($request->all());
            return response()->json($sede, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear la sede', 'error' => $e->getMessage()
            ], 500);
        }
    }

    
    public function show($id)
    {
        try{
            $sede = Sede::FindOrFail($id);
            return response()->json([$sede, 200]);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener la sede', 'error' => $e->getMessage()
            ],500);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $sede = Sede::FindOrFail($id);
            $sede->update($request->all());

            return response()->json($sede, 200);
        }catch(\Exception $e){
            return response([
                'message' => 'Error al actualizar la sede', 'error'=>$e->getMessage()
            ],500);
        }
    }

    public function destroy($id)
    {
        try{
        $sede = Sede::FindOrFail($id);

        $sede->estatus = 0;

        return response()->json(['message' => 'Sede eliminado con exito'],200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al eliminar la sede', 'error' => $e->getMessage()
            ],500);
        }
    }
}
