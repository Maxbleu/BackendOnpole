<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Este método se encarga de loguear
     * un usuario ya registrado en la web
     * @param $request
     */
    public function store(Request $request)
    {

        //  Comprobamos que los datos introducidos
        //  por el usuario cumplen con los requisitos
        //  de validacion
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //  Comprueba si en la base de datos hay
        //  un usuario con las mismas credenciales
        //  que ha introducido el usuario
        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Provided email or password is incorrect'
            ], 422);
        }

        //  Obtenemos el usuario
        /** @var \App\Models\User $user */
        $user = Auth::user();

        //  Eliminamos sus anteriores tokens de la
        //  tabla de personal_access_token
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        //  Le damos un nuevo token al
        //  usuario por iniciar sesion
        $token = $user->createToken('main')->plainTextToken;

        return response(compact('user', 'token'));

    }

    /**
     * Este método se encarga de
     * cerrar la sesión del usuario
     * @param $request
     */
    public function destroy(Request $request)
    {
        //  Eliminamos el token que tiene ahora mismo
        $request->user()->currentAccessToken()->delete();

        //  Indicamos que ha cerrado sesión
        return response()->json(['message' => 'Se ha cerrado sesion correctamente'], 200);
    }

}
