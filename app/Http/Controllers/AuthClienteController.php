<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AuthClienteController extends Controller
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

            $cliente = Cliente::where('email', $request->email)->first();


            if (!$cliente || ! Hash::check($request->password, $cliente->password)) {
                return response()->json(['message' => 'Las credenciales no coinciden'], 401);
            }

            // if ($agente->estatus == 0) {
            //     return response()->json(['message' => 'Usuario inactivo'], 401);
            // }

            $token = $cliente->createToken('token-name')->plainTextToken;
            return response()->json([
                'message' => 'Inicio de sesion exitoso',
                'token' => $token,
                'admin' => $cliente]
                , 200);
    }
}
