<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\CustomerController;
use App\Http\Controllers\FOC\InscriptionController;

Route::POST('/SignIn', [LoginController::class,
    'login'])->name('SignIn');


Route::GET('/SignInAccount', [LoginController::class,
'signup'])->name('SignInAccount');

Route::post('/inscription', [InscriptionController::class,
    'insertCustomer'])->name('insertCustomer');

Route::get('/', function () {
    return view('FOC/login');
});


Route::get('/setting', function () {
    return view('FOC/deconnection');
})->name('setting');

 
Route::GET('/deconnect', [CustomerController::class,
    'deconnect'])->name('deconnect');
