<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        try {

            $admins = Admin::all();
            // $grupo = Admin::where('estatus',1)->get();

            if ($admins->isEmpty()) {
                return response()->json(['message' => 'No se encontraron admins'], 404);
            }

            return response()->json($admins, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los admins', 'error' => $e->getMessage()], 500);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'estatus' =>'required|boolean'
        ]);

        $admin = Admin::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estatus' =>$request->estatus
        ]);

        return response()->json(['message' => 'Admin registrado con exito', "admin" => $admin], 200);
    }

    public function show($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            return response()->json($admin, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el admin', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->update($request->all());

            return response()->json($admin, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el admin', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy( $id)
    {
        try {
            $admin = Admin::findOrFail($id);

            $admin->estatus = 0;

            $admin->save();
            return response()->json(['message' => 'Admin eliminado con exito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el admin', 'error' => $e->getMessage()], 500);
        }
    }

    public function session()
    {
        try {
            $admin = Auth::user();

            if (!$admin) {
                return response()->json(['message' => 'No hay usuario autenticado'], 404);
            }

            return response()->json($admin, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el token', 'error' => $e->getMessage()], 500);
        }
    }
}
