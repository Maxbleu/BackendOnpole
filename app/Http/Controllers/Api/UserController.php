<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstadisticaResource;
use App\Http\Resources\SesionResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Obtiene el usuario autenticado
     * que realiza la solicitud.
     * @param $request
     * @return User
     */
    public function getUser(Request $request) {
        return $request->user();
    }

    /**
     * Este método se encarga de devolver las
     * estadisticas del usuario en la web mediante
     * el id del usuario que recibe por parámetro
     * @param $user_id
     * @return EstadisticaResource
     */
    public function getUserStadistics($user_id){
        $user = User::findOrFail($user_id);
        return new EstadisticaResource($user->estadistica);
    }

    /**
     * Este método se encarga de obtener
     * las sesiones del usuario por el id
     * del usuario que recibe por parámetro
     * @param $user_id
     */
    public function getUserSesions($user_id){
        $user = User::findOrFail($user_id);
        $userSesions = $user->sesiones;
        return SesionResource::collection($userSesions);
    }

    /**
     * Este método se encarga de obtener la
     * última sesión analizada del usuario
     * @return SesionResource
     */
    public function getUserLatestSesion($user_id){
        //  Obtenemos usuario
        $user = User::findOrFail($user_id);

        //  Obtenemos sesiones
        $userSesiones = $user->sesiones;

        //  Comprobamos si el usuario tiene
        if(count($userSesiones) === 0){
            return response()->json('No sessions found for this user', 204);
        }

        $ultimaSesion = $userSesiones[count($userSesiones)-1];

        //  Devolvemos la ultima sesión
        return new SesionResource($ultimaSesion);
    }

    /**
     * Este método se encarga de devolver una lista
     * con todos los meses del año donde indica todas
     * las vueltas analizas por el usuario mensualmente
     * por el id del usuario que recibe por paramétro
     * @param $user_id
     * @return array
     */
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

        //  Recorremos las sesiones del usuario
        foreach ($user->sesiones as $sesion) {
            //  Por cada sesion que tenga el usuario obtenemos el mes
            //  de cuando fue creado el registro de la sesión en la
            //  base de datos y le sumamos a las vueltas totales
            //  las vueltas que tenga la sesión
            $vueltasAnalizadasPorMes[$sesion->created_at->month - 1]["vueltasTotales"] += count($sesion->vueltas);
        }

        return $vueltasAnalizadasPorMes;

    }

    /**
     * Este método se encarga de actualizar los
     * datos del usuario en la base de datos
     * @param $request
     */
    public function update(Request $request) {
        $user = $request->user();

        $arrayColumnsChange = ["name", "email", "password"];

        //  Recorremos el array de columnas
        array_walk($arrayColumnsChange, function($columna) use($request,$user) {
            //  Comprobamos si el campo esta en la request
            if($request->has($columna)){
                //  En caso de estarlo obtenemos el valor de la columna
                $valorColumna = $request[$columna];
                //  Comprobamos si el valor de la columna es la contraseña
                if($request["password"]){
                    //  Hashea la contraseña
                    $valorColumna = bcrypt($request->password);
                }
                //  Asignas el valor a la propiedad
                $user[$columna] = $valorColumna;
            }
        });

        //  Actualizamos el usuario
        $user->save();

        return response()->json("Datos actualizados correctamente.",200);
    }

    /**
     * Este método se encarga de eliminar
     * la cuenta del usuario y sus correspondientes
     * registros en las otras tablas
     * @param $request
     */
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
