<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Estadistica;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'name' => ['required','unique:users,name'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirmPassword' => ['required'],
        ]);

        if($credentials["password"] !== $credentials["confirmPassword"]){
            return response()->json([
                "message" => "Las contraseñas no coinciden"
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            "password" => bcrypt($request->password),
            "acronimo" => strtoupper(substr($request->name,0,3)),
            "pais" => $request->pais
        ]);

        Estadistica::create([
            "user_id" => $user->id
        ]);

        $token = $user->createToken("main")->plainTextToken;

        event(new Registered($user));

        Auth::login($user, true);

        return response()->json([
            "message" => "Usuario registrado correctamente",
            "user" => $user,
            "token" => $token
        ]);

    }
}
