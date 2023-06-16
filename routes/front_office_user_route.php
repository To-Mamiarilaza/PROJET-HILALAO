<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\FieldController;
use App\Http\Controllers\FOU\ReservationController;
use App\Http\Controllers\FOU\InfoTerrain;
use App\Http\Controllers\FOU\HomeController;
use App\Http\Controllers\FOU\LogController;

Route::get('/list-field', [FieldController::class, 'index'])->name('list-field');
Route::get('/calendar/{id_field}', [ReservationController::class, 'index'])->name('calendar-reservation');
Route::post('/reserve', [ReservationController::class, 'reserve'])->name('reserve');
Route::get('/info-field/{id_field}', [InfoTerrain::class, 'index'])->name('info-terrain');
Route::get('/landing', [HomeController::class, 'index'])->name('landing');
Route::get('/log/user',[LogController::class, 'index'])->name('log-user');
Route::get('/sign/user',[LogController::class, 'sign'])->name('sign-user');
Route::post('/signin/user/treat',[LogController::class, 'signin'])->name('log-user-treat');
Route::post('/signup/user/treat',[LogController::class, 'signup'])->name('sign-user-treat');

?>
