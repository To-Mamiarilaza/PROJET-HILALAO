<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\FieldController;
use App\Http\Controllers\FOU\ReservationController;
use App\Http\Controllers\FOU\InfoTerrain;
use App\Http\Controllers\FOU\HomeController;
use App\Http\Controllers\FOU\LogController;

Route::get('/ListFields', [MyListFieldController::class, 'index']);
Route::get('/calendar', [ReservationController::class, 'index']);
Route::get('/reserve', [ReservationController::class, 'reserve']);


Route::get('/infoTerrain/{id_field}', [InfoTerrain::class, 'index']);

Route::get('/carte', [InfoTerrain::class, 'afficheCarte']);
