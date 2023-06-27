<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\FieldController;
use App\Http\Controllers\FOU\ReservationController;
use App\Http\Controllers\FOU\InfoTerrain;
use App\Http\Controllers\FOU\HomeController;
use App\Http\Controllers\FOU\LogController;

Route::get('/ListFields', [FieldController::class, 'index']);
Route::get('/calendar', [ReservationController::class, 'index']);
Route::get('/reserve', [ReservationController::class, 'reserve']);


Route::get('/infoTerrain/{id_field}', [InfoTerrain::class, 'index']);

Route::get('/carte', [InfoTerrain::class, 'afficheCarte']);

//Profile terrain
Route::get('/ProfileTerrain', [InfoTerrain::class, 'profileTerrain']);
Route::get('/test', [InfoTerrain::class, 'test']);

