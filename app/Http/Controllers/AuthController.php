<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $usuario = User::create($datos);

        $token = $usuario->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'user' => $usuario,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
    $datos = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $usuario = User::where('email', $datos['email'])->first();

    if (!$usuario || !password_verify($datos['password'], $usuario->password)) {
        return response()->json([
            'message' => 'Credenciales incorrectas'
        ], 401);
    }

    $token = $usuario->createToken('mobile-token')->plainTextToken;

    return response()->json([
        'message' => 'Login exitoso',
        'user' => $usuario,
        'token' => $token,
    ]);
    }
public function me(Request $request)
    {
    return response()->json([
        'user' => $request->user()
    ]);
    }

public function logout(Request $request)
    {
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Sesión cerrada correctamente'
    ]);
    }
}