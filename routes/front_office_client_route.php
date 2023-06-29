<?php

use App\Http\Controllers\FOC\ClientNotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\CustomerController;
use App\Http\Controllers\FOC\InscriptionController;
use App\Http\Controllers\FOC\TestNotification;

Route::get('/', function () {
	return view('FOC/login');
});

/// pour la page Sign In
Route::get('/SignIn', [LoginController::class, 'signin'])
->name('SignIn');

/// pour la page suivante de Sign In : insert CIN
Route::post('/CIN-Client', [LoginController::class, 'nextSignin'])
->name('signinnext');

/// pour la page Login
Route::get('/Login', [LoginController::class, 'login'])
->name('login');

/// pour la page Profil
Route::post('/ClientProfil', [LoginController::class, 'profilClient'])
->name('profilClient');


Route::get('/home-client', function() {
    return view('FOC/home');
});


Route::get('/disponibility', function() {
    return view('FOC/profil-terrain');
});

Route::get('/testNotification', [ClientNotificationController::class, 'index']);

Route::get('/changeNotificationState/{idNotif}', [ClientNotificationController::class, 'changeNotificationState']);




