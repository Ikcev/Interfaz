<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciasController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\APIElTiempoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/insertProvincias', [ProvinciasController::class, 'insercionProvincias']);

Route::get('/insertMunicipios', [MunicipiosController::class, 'insercionMunicipios']);

Route::get('/insertarDatos', [APIElTiempoController::class, 'showAllMunicipios']);

Route::get('/insertarDatos', [APIElTiempoController::class, 'showAllMunicipios']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




