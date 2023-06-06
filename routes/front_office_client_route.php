<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\CustomerController;

Route::get('/', function () {
	return view('FOC/login');
});

Route::get('/SignIn', [LoginController::class, 'signup'])
->name('SignIn');

Route::post('/CIN-Client', [LoginController::class, 'nextSignup'])
->name('signinnext');

Route::get('/Login', [LoginController::class, 'login'])
->name('login');
