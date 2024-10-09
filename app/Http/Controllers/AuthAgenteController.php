<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAgenteController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo debe ser un correo valido',
            'password.required' => 'La contraseña es obligatoria',
        ]);

            $agente = Agente::where('email', $request->email)->first();


            if (!$agente || ! Hash::check($request->password, $agente->password)) {
                return response()->json(['message' => 'Las credenciales no coinciden'], 401);
            }

            // if ($agente->estatus == 0) {
            //     return response()->json(['message' => 'Usuario inactivo'], 401);
            // }

            $token = $agente->createToken('token-name')->plainTextToken;
            return response()->json([
                'message' => 'Inicio de sesion exitoso',
                'token' => $token,
                'admin' => $agente]
                , 200);
    }
}
