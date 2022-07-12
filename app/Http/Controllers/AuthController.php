<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function registrar(Request $request) {
        $campos = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);

        $userobj = User::create([
            'name' => $campos['name'],
            'email' => $campos['email'],
            'password' => bcrypt($campos['password'])
        ]);

        $token = $userobj->createToken('apitoken')->plainTextToken;

        $response = [
            'user' => $userobj,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $campos = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $userobj = User::where('email', $campos['email'])->first();

        if (!$userobj || !Hash::check($campos['password'], $userobj->password)) {
            return response([
                'message' => 'Datos incorrectos, intenta de nuevo'
            ], 401);
        }

        $token = $userobj->createToken('apitoken')->plainTextToken;

        $response = [
            'user' => $userobj,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->currentAccessToken()->delete();

        return [
            'message' => 'Token destruido'
        ];
    }
}
