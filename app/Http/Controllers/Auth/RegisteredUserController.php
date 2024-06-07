<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\Estadistica;
use App\Models\User;

class RegisteredUserController extends Controller
{

    public function store(SignUpRequest $request)
    {

        $user = User::create([
            'name' => $request["name"],
            'email' => $request["email"],
            "password" => bcrypt($request["password"]),
            "acronimo" => strtoupper(substr($request["name"],0,3)),
            "pais" => $request["pais"]
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
