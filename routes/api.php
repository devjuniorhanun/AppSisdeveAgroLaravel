<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Cadastros\{
    AnoAgriculaController,
    CulturaController,
    EmpresaController,
    ProprietarioController,
    SafraController,
    VariedadeCulturaController
};
use Illuminate\Support\Facades\Route;

Route::post('/auth/registro', [AuthController::class, 'registro']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/auth/logout', [AuthController::class, 'logout']);

    // Rotas de Cadastros
    
    Route::apiResource('cadastros/ano-agricula', AnoAgriculaController::class);
    Route::apiResource('cadastros/safra', SafraController::class);
    Route::apiResource('cadastros/cultura', CulturaController::class);
    Route::apiResource('cadastros/variedade-cultura', VariedadeCulturaController::class);
    Route::apiResource('cadastros/proprietario', ProprietarioController::class);
});
Route::apiResource('cadastros/empresa', EmpresaController::class);