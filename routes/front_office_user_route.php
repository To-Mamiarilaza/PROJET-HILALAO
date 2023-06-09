<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\MyListFieldController;

Route::get('/ListFields', [MyListFieldController::class, 'index']);


Route::get('/infoTerrain/{id_field}', [\App\Http\Controllers\FOU\InfoTerrain::class, 'index']);
