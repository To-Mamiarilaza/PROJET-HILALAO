<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\MyListFieldController;
use App\Http\Controllers\FOU\ReservationController;

Route::get('/ListFields', [MyListFieldController::class, 'index']);
Route::get('/calendar', [ReservationController::class, 'index']);
Route::get('/reserve', [ReservationController::class, 'reserve']);
Route::get('/infoTerrain/{id_field}', [\App\Http\Controllers\FOU\InfoTerrain::class, 'index']);
