<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        dd("hola");
    }
    public function register(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = Cliente::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado exitosamente',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }
        
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ], [
    //         'email.required' => 'El correo es obligatorio',
    //         'email.email' => 'El correo debe ser un correo valido',
    //         'password.required' => 'La contraseña es obligatoria',
    //     ]);

    //         $cliente = Cliente::where('email', $request->email)->first();


    //         if (!$cliente || ! Hash::check($request->password, $cliente->password)) {
    //             return response()->json(['message' => 'Las credenciales no coinciden'], 401);
    //         }

    //         // if ($agente->estatus == 0) {
    //         //     return response()->json(['message' => 'Usuario inactivo'], 401);
    //         // }

    //         $token = $cliente->createToken('token-name')->plainTextToken;
    //         return response()->json([
    //             'message' => 'Inicio de sesion exitoso',
    //             'token' => $token,
    //             'admin' => $cliente]
    //             , 200);
    // }
}
