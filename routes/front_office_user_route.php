<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\FieldFOUController;
use App\Http\Controllers\FOU\ReservationFOUController;
use App\Http\Controllers\FOU\InfoTerrain;
use App\Http\Controllers\FOU\HomeFOUController;
use App\Http\Controllers\FOU\LogFOUController;
use App\Http\Controllers\FOU\TestController;

Route::get('/list-field/{id_category}', [FieldFOUController::class, 'index'])->name('list-field');
Route::get('/list-field', [FieldFOUController::class, 'index'])->name('list-field-all');
Route::get('/field/calendar/{id_field}', [ReservationFOUController::class, 'index'])->name('reserve');
Route::get('/field/calendar/{id_field}/{date}', [ReservationFOUController::class, 'index'])->name('reserve-date');
Route::post('/reserve', [ReservationFOUController::class, 'reserve'])->name('reserve');
Route::get('/info-field/{id_field}', [InfoTerrain::class, 'index'])->name('info-field');
Route::get('/carte', [InfoTerrain::class, 'afficheCarte']);
Route::post('/field/filter', [FieldFOUController::class, 'filter'])->name('filter');
Route::get('/log/user', [LogFOUController::class, 'index'])->name('log-user');
Route::get('/sign/user', [LogFOUController::class, 'sign'])->name('sign-user');
Route::post('/log/user/in', [LogFOUController::class, 'signin'])->name('log-user-treat');
Route::get('/landing', [HomeFOUController::class, 'index'])->name('landing');
Route::get('/log/user/out', [LogFOUController::class, 'signout'])->name('log-out');
Route::get('/ListFields', [FieldFOUController::class, 'index']);
Route::get('/field/detail/{id_field}', [FieldFOUController::class, 'detail'])->name('detail-field');
Route::get('/field/detail/{id_field}/{date}', [FieldFOUController::class, 'detailled'])->name('detailled-field');
Route::get('/tester', [TestController::class, 'index'])->name('test');


Route::get('/infoTerrain/{id_field}', [InfoTerrain::class, 'index']);

Route::get('/carte', [InfoTerrain::class, 'afficheCarte']);

//Profile terrain
Route::get('/ProfileTerrain', [InfoTerrain::class, 'profileTerrain']);
Route::get('/test', [InfoTerrain::class, 'test']);

