<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstadisticaResource;
use App\Http\Resources\SesionResource;
use App\Models\Sesion;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function getAnalyzedLapsMonthlyByUser($user_id){

        $vueltasAnalizadasPorMes = [
            ["nombre" => "January", "vueltasTotales" => 0],
            ["nombre" => "February", "vueltasTotales" => 0],
            ["nombre" => "March", "vueltasTotales" => 0],
            ["nombre" => "April", "vueltasTotales" => 0],
            ["nombre" => "May", "vueltasTotales" => 0],
            ["nombre" => "June", "vueltasTotales" => 0],
            ["nombre" => "July", "vueltasTotales" => 0],
            ["nombre" => "August", "vueltasTotales" => 0],
            ["nombre" => "September", "vueltasTotales" => 0],
            ["nombre" => "October", "vueltasTotales" => 0],
            ["nombre" => "November", "vueltasTotales" => 0],
            ["nombre" => "December", "vueltasTotales" => 0]
        ];

        $user = User::findOrFail($user_id);
        foreach ($user->sesiones as $sesion) {
            $vueltasAnalizadasPorMes[$sesion->created_at->month - 1]["vueltasTotales"] += count($sesion->vueltas);
        }

        return $vueltasAnalizadasPorMes;

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
