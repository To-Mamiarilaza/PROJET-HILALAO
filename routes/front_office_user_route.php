<?php

use App\Http\Controllers\FOU\UserNotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\InfoTerrain;
use App\Http\Controllers\FOU\LogController;
use App\Http\Controllers\FOU\TestController;

Route::get('/list-field/{id_category}', [App\Http\Controllers\FOU\FieldController::class, 'index'])->name('list-field-fou');
Route::get('/list-field', [App\Http\Controllers\FOU\FieldController::class, 'index'])->name('list-field-all-fou');
Route::get('/field/calendar/{id_field}', [App\Http\Controllers\FOU\ReservationController::class, 'index'])->name('reserve');
Route::get('/field/calendar/{id_field}/{date}', [App\Http\Controllers\FOU\ReservationController::class, 'index'])->name('reserve-date');
Route::post('/reserve', [App\Http\Controllers\FOU\ReservationController::class, 'reserve'])->name('reserve');
Route::get('/info-field/{id_field}', [InfoTerrain::class, 'index'])->name('info-field');
Route::get('/carte', [InfoTerrain::class, 'afficheCarte']);
Route::post('/field/filter', [App\Http\Controllers\FOU\FieldController::class, 'filter'])->name('filter');
Route::get('/log/user', [LogController::class, 'index'])->name('log-user');
Route::get('/sign/user', [LogController::class, 'sign'])->name('sign-user');
Route::post('/log/user/in', [LogController::class, 'signin'])->name('log-user-treat');
Route::get('/landing', [App\Http\Controllers\FOU\HomeController::class, 'index'])->name('landing');
Route::get('/log/user/out', [LogController::class, 'signout'])->name('log-out');
Route::get('/ListFields', [App\Http\Controllers\FOU\FieldController::class, 'index']);
Route::get('/field/detail/{id_field}', [App\Http\Controllers\FOU\FieldController::class, 'detail'])->name('detail-field');
Route::get('/field/detail/{id_field}/{date}', [App\Http\Controllers\FOU\FieldController::class, 'detailled'])->name('detailled-field');
Route::get('/tester', [TestController::class, 'index'])->name('test');
Route::get('/reservation/calcul_prix/{id_field}/{date_reservation}/{start_time}/{duration}', [App\Http\Controllers\FOU\ReservationController::class, 'calculPrix']);
Route::get('/user/account', [LogController::class, 'info'])->name('profil-user');
Route::get('/infoTerrain/{id_field}', [InfoTerrain::class, 'index']);

Route::get('/carte', [InfoTerrain::class, 'afficheCarte']);

//Profile terrain
Route::get('/ProfileTerrain', [InfoTerrain::class, 'profileTerrain']);
Route::get('/test', [InfoTerrain::class, 'test']);

//Profile Utilisateur
Route::get('/profileUtilisateur', [InfoTerrain::class, 'profileUtilisateur']);

Route::get('/changeUserNotificationState/{id_client_notification}', [UserNotificationController::class, 'changeNotificationState']);


