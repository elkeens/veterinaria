<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ConsultaController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('mascotas', MascotaController::class);

Route::resource('consultas', ConsultaController::class);