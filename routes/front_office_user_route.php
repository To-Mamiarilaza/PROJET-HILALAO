<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\FieldController;
use App\Http\Controllers\FOU\ReservationController;
use App\Http\Controllers\FOU\InfoTerrain;
use App\Http\Controllers\FOU\HomeController;
use App\Http\Controllers\FOU\LogController;
use App\Http\Controllers\FOU\TestController;

Route::get('/list-field/{id_category}', [FieldController::class, 'index'])->name('list-field');
Route::get('/list-field', [FieldController::class, 'index'])->name('list-field-all');
Route::get('/calendar/{id_field}', [ReservationController::class, 'index'])->name('reserve');
Route::post('/reserve', [ReservationController::class, 'reserve'])->name('reserve');
Route::get('/info-field/{id_field}', [InfoTerrain::class, 'index'])->name('info-field');
Route::get('/carte', [InfoTerrain::class, 'afficheCarte']);
Route::post('/field/filter', [FieldController::class, 'filter'])->name('filter');
Route::get('/log/user', [LogController::class, 'index'])->name('log-user');
Route::get('/sign/user', [LogController::class, 'sign'])->name('sign-user');
Route::post('/log/user/in', [LogController::class, 'signin'])->name('log-user-treat');
Route::get('/landing', [HomeController::class, 'index'])->name('landing');
Route::get('/log/user/out', [LogController::class, 'signout'])->name('log-out');
Route::get('/ListFields', [FieldController::class, 'index']);
Route::get('/field/detail/{id_field}', [FieldController::class, 'detail'])->name('detail-field');
Route::get('/field/detail/{id_field}/{date}', [FieldController::class, 'detailled'])->name('detailled-field');
Route::get('/tester', [TestController::class, 'index'])->name('test');


Route::get('/infoTerrain/{id_field}', [InfoTerrain::class, 'index']);

Route::get('/carte', [InfoTerrain::class, 'afficheCarte']);

//Profile terrain
Route::get('/ProfileTerrain', [InfoTerrain::class, 'profileTerrain']);
Route::get('/test', [InfoTerrain::class, 'test']);

