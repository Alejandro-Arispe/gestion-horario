<?php

use Illuminate\Support\Facades\Route;

// Controladores del paquete Administración
use App\Http\Controllers\Administration\UserController;
use App\Http\Controllers\Administration\RoleController;

// Controladores de Configuración Académica
use App\Http\Controllers\ConfiguracionAcademica\FacultadController;
use App\Http\Controllers\ConfiguracionAcademica\GestionController;
use App\Http\Controllers\ConfiguracionAcademica\DocenteController;
use App\Http\Controllers\ConfiguracionAcademica\MateriaController;
use App\Http\Controllers\ConfiguracionAcademica\GrupoController;
use App\Http\Controllers\ConfiguracionAcademica\AulaController;

// Controlador de Planificación Académica
use App\Http\Controllers\Planificacion\HorarioController;

Route::prefix('v1')->group(function () {

    // ==========================
    // ADMINISTRACIÓN
    // ==========================

    Route::prefix('admin')->group(function () {
        // Usuarios
        Route::apiResource('usuarios', UserController::class);
        // Roles
        Route::apiResource('roles', RoleController::class);
    });

    // ==========================
    // CONFIGURACIÓN ACADÉMICA
    // ==========================

    Route::prefix('config')->group(function () {
        // Facultades
        Route::apiResource('facultades', FacultadController::class);
        // Gestiones
        Route::get('gestiones', [GestionController::class, 'index']);
        Route::post('gestiones', [GestionController::class, 'store']);
        Route::put('gestiones/{id}', [GestionController::class, 'update']);
        Route::put('gestiones/{id}/activar', [GestionController::class, 'activar']);
        // Docentes
        Route::apiResource('docentes', DocenteController::class);
        // Materias
        Route::apiResource('materias', MateriaController::class);
        // Grupos
        Route::apiResource('grupos', GrupoController::class);
        // Aulas
        Route::apiResource('aulas', AulaController::class);
    });

    // ==========================
    // PLANIFICACIÓN ACADÉMICA
    // ==========================

    Route::prefix('planificacion')->group(function () {
        // Horarios
        Route::apiResource('horarios', HorarioController::class);
    });
});
