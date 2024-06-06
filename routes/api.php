<?php

use App\Http\Controllers\Api\CircuitoController;
use App\Http\Controllers\Api\CocheController;
use App\Http\Controllers\Api\EstadisticaController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\SesionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VueltaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Resources\CocheResource;
use App\Models\Coche;
use App\Models\Estadistica;
use Illuminate\Support\Facades\Route;

Route::get("coches", function(){
    return CocheResource::collection(Coche::all());
});

Route::get("circuitos", [CircuitoController::class, "getAllCircuitos"]);
Route::get("circuitos/{id}", [CircuitoController::class, "getCircuitoById"]);

Route::get("marcas", [MarcaController::class, "getMarcas"]);
Route::get("marcas/{id}", [MarcaController::class, "getMarcaById"]);

//  AUTH
Route::post("login", [AuthenticatedSessionController::class, "store"]);
Route::post("signup", [RegisteredUserController::class, "store"]);

Route::get('csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
})->middleware("web");

Route::middleware(['auth:sanctum'])->group(function(){

    Route::get('/user', [UserController::class, "getUser"]);

    Route::get("/users/sesiones/{user_id}", [UserController::class, "getUserSesions"]);
    Route::get("/users/sesiones/{user_id}/latest", [UserController::class, "getUserLatestSesion"]);

    Route::get("/sesiones/{sesion_id}", [SesionController::class,"getSesionId"]);
    Route::post("/sesiones/insert", [SesionController::class, "store"]);
    Route::get("/sesiones/combination/{circuito_id}/{coche_id}", [SesionController::class, "getCombination"]);

    Route::get("/estadistica/global", [EstadisticaController::class, "getGlobalRank"]);
    Route::put("/estadistica/update", [EstadisticaController::class, "update"]);
    Route::get("/users/estadistica/{user_id}", [UserController::class, "getUserStadistics"]);

    Route::put("update", [UserController::class, "update"]);
    Route::post("delete account", [UserController::class, "destroy"]);
    Route::post("logout", [AuthenticatedSessionController::class, "destroy"]);
    Route::post("delete", [UserController::class, "destroy"]);

});
