<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthAdminController extends Controller
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

            $admin = Admin::where('email', $request->email)->first();


            if (!$admin || ! Hash::check($request->password, $admin->password)) {
                return response()->json(['message' => 'Las credenciales no coinciden'], 401);
            }

            if ($admin->estatus == 0) {
                return response()->json(['message' => 'Usuario inactivo'], 401);
            }

            $token = $admin->createToken('token-name')->plainTextToken;
            return response()->json([
                'message' => 'Inicio de sesion exitoso',
                'token' => $token,
                'admin' => $admin]
                , 200);
    }

}
