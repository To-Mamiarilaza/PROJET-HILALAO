<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\CustomerController;

Route::POST('/SignIn', [LoginController::class,
    'login'])->name('SignIn');


Route::GET('/SignInAccount', [LoginController::class,
'signup'])->name('SignInAccount');


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
