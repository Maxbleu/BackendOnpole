<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\Estadistica;
use App\Models\User;

class RegisteredUserController extends Controller
{

    /**
     * Este método se encarga de registrar
     * a primeros usuarios en la página web
     * @param SignUpRequest
     */
    public function store(SignUpRequest $request)
    {
        //  ¡IMPORTANTE!
        //  No hago una validación de los datos que recibo
        //  por parte del usuario para registrarme ya que,
        //  la clase SignUpRequest se encarga de validar
        //  que los campos que recibo cumplen con los requisitos
        //  para poder operar con los datos sino manda un mensaje
        //  de error específico para cada error.

        //  Este método se encarga de crear un
        //  usuario para la pagina web
        $user = User::create([
            'name' => $request["name"],
            'email' => $request["email"],
            "password" => bcrypt($request["password"]),
            "acronimo" => strtoupper(substr($request["name"],0,3)),
            "pais" => $request["pais"]
        ]);

        //  Creamos sus estadisticas
        Estadistica::create([
            "user_id" => $user->id
        ]);

        //  Creamos y asignamos un token
        $token = $user->createToken("main")->plainTextToken;

        //  Lo devolvemos indicando que se ha creado todo correctamente
        return response()->json([
            'message' => 'Usuario registrado con éxito',
            'user' => $user,
            "token" => $token
        ], 201);

    }
}
