<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\CustomerController;
use App\Http\Controllers\FOC\InscriptionController;

Route::post('/SignIn', [LoginController::class, 'signin'])
->name('SignIn');


