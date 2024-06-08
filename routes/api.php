<?php

use App\Http\Controllers\Api\EstadisticaController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\SesionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VueltaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Resources\CircuitoResource;
use App\Http\Resources\CocheResource;
use App\Models\Circuito;
use App\Models\Coche;
use Illuminate\Support\Facades\Route;

Route::get("coches", function(){
    return CocheResource::collection(Coche::all());
});

Route::get("circuitos", function(){
    return CircuitoResource::collection(Circuito::all());
});

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
    Route::put("/user/update", [UserController::class, "update"]);
    Route::post("/user/logout", [AuthenticatedSessionController::class, "destroy"]);
    Route::post("/user/delete", [UserController::class, "destroy"]);

    Route::get("/users/{user_id}/sesiones", [UserController::class, "getUserSesions"]);
    Route::get("/users/{user_id}/sesiones/latest", [UserController::class, "getUserLatestSesion"]);
    Route::get("/users/{user_id}/sesiones/getLapsMonthly", [UserController::class, "getAnalyzedLapsMonthlyByUser"]);
    Route::get("/users/{user_id}/estadistica", [UserController::class, "getUserStadistics"]);

    Route::get("/sesiones/{sesion_id}", [SesionController::class,"getSesionId"]);
    Route::post("/sesiones/insert", [SesionController::class, "store"]);

    Route::get("/vueltas/combination/{circuito_id}/{coche_id}", [VueltaController::class, "getCombination"]);

    Route::get("/estadistica/global/{user_id?}", [EstadisticaController::class, "getGlobalRank"]);

});
