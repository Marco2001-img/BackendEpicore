<?php

namespace App\Http\Controllers\Departamento;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{

    public function index()
    {
        try{
            $departamento = Departamento::all();

            if($departamento->isEmpty()){
                return response()->json(['message' => 'No se encontraron departamentos'], 404);
            }

            return response()->json($departamento, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener los departamentos', 'error' =>$e->getMessage()
            ],500);
        }
    }


    public function store(Request $request)
    {
        try{
        $departamento = Departamento::create($request->all());
        return response()->json($departamento, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear departamento', 'error'=>$e->getMessage()
            ],500);
        }
    }


    public function show($id)
    {
        try{
        $departamento = Departamento::findOrFail($id);
        return response()->json($departamento, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener el departamento', 'error' => $e->getMessage()
            ],500);
        }
    }


    public function update(Request $request, $id)
    {
        try{
        $departamento = Departamento::FindOrFail($id);
        $departamento->update($request->all());

        return response()->json($departamento, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar departamento', 'error'=>$e->getMessage()
            ],500);
        }
    }


    public function destroy($id)
    {
        try{
        $departamento = Departamento::findOrFail($id);

        $departamento->estatus = 0;

        $departamento->save();
        return response()->json(['message' => 'Departamento eliminado con exito'],200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al eliminar el departamento', 'error'=>$e->getMessage()
            ],500);
        }
    }
}
