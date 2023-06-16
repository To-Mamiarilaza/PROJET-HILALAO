<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\MyListFieldController;
use App\Http\Controllers\FOU\InfoTerrain;

Route::get('/ListFields', [MyListFieldController::class, 'index']);


Route::get('/infoTerrain/{id_field}', [InfoTerrain::class, 'index']);

Route::get('/carte', [InfoTerrain::class, 'afficheCarte']);
