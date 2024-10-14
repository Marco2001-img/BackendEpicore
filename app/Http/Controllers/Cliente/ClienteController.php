<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function index()
    {
        try{
        $cliente = Cliente::all();

        if ($cliente->isEmpty()) {
            return response()->json(['message' => 'No se encontraron clientes'], 404);
        }

        return response()->json($cliente, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener los clientes', 'error' => $e->getMessage()
            ],500);
        }
    }


    public function store(Request $request)
    {
        try{
        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear el cliente', 'error' => $e->getMessage()
            ],500);
        }
    }


    public function show($id)
    {
        try{
        $cliente = Cliente::FindOrFail($id);
        return response()->json($cliente, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener el cliente', 'error' => $e->getMessage()
            ],500);
        }
    }


    public function update(Request $request, $id)
    {
        try{
            $cliente = Cliente::FindOrFail($id);
            $cliente->update($request->all());
            return response()->json($cliente, 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar el cliente', 'error' => $e->getMessage()
            ],500);
        }
    }


    public function destroy($id)
    {
        try{
        $cliente = Cliente::FindOrFail($id);

        $cliente->estatus = 0;

        $cliente->save();
        return response()->json(['message' => 'Cliente eliminado con exito'],200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al eliminar el cliente', 'error' => $e->getMessage()
            ],500);
        }
    }

    public function session()
    {
        try {
            $cliente = Auth::user();

            if (!$cliente) {
                return response()->json(['message' => 'No hay usuario autenticado'], 404);
            }

            return response()->json($cliente, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el token', 'error' => $e->getMessage()], 500);
        }
    }
}
