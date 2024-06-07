<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\Estadistica;
use App\Models\User;

class RegisteredUserController extends Controller
{

    public function store( $request)
    {

        $validatedData = $request->validate([
            'name' => ['required','unique:users,name'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirmPassword' => ['required'],
        ]);

        $user = User::create([
            'name' => $validatedData["name"],
            'email' => $validatedData["email"],
            "password" => bcrypt($validatedData["password"]),
            "acronimo" => strtoupper(substr($validatedData["name"],0,3)),
            "pais" => $validatedData["pais"]
        ]);

        Estadistica::create([
            "user_id" => $user->id
        ]);

        $token = $user->createToken("main")->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado con éxito',
            'user' => $user,
            "token" => $token
        ], 201);

    }
}
