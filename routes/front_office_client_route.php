<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\InscriptionController;

Route::get('/', function () {
	return view('FOC/login');
});

/// pour la page Sign In
Route::get('/SignIn', [LoginController::class, 'signin'])
->name('SignIn');

Route::post('/insertClient', [InscriptionController::class, 'insertClient'])
->name('signin');

Route::post('/changePicture', [InscriptionController::class, 'changePicture'])
->name('changePicture');

/// pour la page suivante de Sign In : insert CIN
Route::post('/CIN-Client', [InscriptionController::class, 'insertCIN'])
->name('signinnext');

/// pour la page Login
Route::get('/Login', [LoginController::class, 'login'])
->name('login');

/// pour la page Profil
Route::post('/ClientProfil', [LoginController::class, 'profilClient'])
->name('profilClient');

Route::get('/home-client', function() {
    return view('FOC/home');

Route::get('/stat-terrain', function() {
    return view('FOC/statistic-field');
});
