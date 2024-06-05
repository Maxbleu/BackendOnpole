<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstadisticaResource;
use App\Http\Resources\SesionResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{

    public function getUser(Request $request) {
        return $request->user();
    }

    public function getUserStadistics($user_id){
        $user = User::findOrFail($user_id);
        return new EstadisticaResource($user->estadistica);
    }

    public function getUserSesions($user_id){
        $user = User::findOrFail($user_id);
        $userSesions = $user->sesiones;
        return SesionResource::collection($userSesions);
    }

    public function getUserLatestSesion($user_id){
        $user = User::findOrFail($user_id);
        $userSesiones = $user->sesiones;

        if(count($userSesiones) === 0){
            return response()->json('No sessions found for this user', 200);
        }

        $ultimaSesion = $userSesiones[count($userSesiones)-1];
        return new SesionResource($ultimaSesion);
    }

    public function update(Request $request) {
        $user = $request->user();

        $arrayColumnsChange = ["name", "email", "password"];
        array_walk($arrayColumnsChange, function($columna) use($request,$user) {
            if($request->has($columna)){
                $valorColumna = $request[$columna];
                if($request["password"]){
                    $valorColumna = bcrypt($request->password);
                }
                $user[$columna] = $valorColumna;
            }
        });

        $user->save();

        return response()->json("Datos actualizados correctamente.",200);
    }

    public function destroy(Request $request){
        $user = $request->user();

        //  Eliminamos las vueltas del usuario
        $user->vueltas()->delete();
        //  Eliminamos las sesiones del usuario
        $user->sesiones()->delete();
        //  Eliminamos las estadisticas del usuario
        $user->estadistica()->delete();

        //  Eliminamos el token del usuario
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        // Eliminar el usuario
        $user->delete();

        return response()->json(['message' => 'El usuario ha sido eliminado satisfactoriamente'], 200);

    }

}
