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

Route::get('/signUp', [LoginController::class, 'signUp'])
->name('signUp');

Route::post('/signUpCin', [LoginController::class, 'signUpCin'])
->name('signUpCin');

Route::POST('/login', [LoginController::class, 'login'])
->name('login');

/// pour la page Profil
Route::post('/ClientProfil', [LoginController::class, 'profilClient'])
->name('profilClient');

Route::get('/ajoutTerrain',function() {
    return view('FOC/ajoutTerrain');
});

Route::get('/addTerrain',function() {
    return view('FOC/addTerrain');
});

Route::get('/addTerrain-File', function() {
    return view('FOC/addTerrain-File');
});

Route::get('/subscription-facture', function() {
    return view('FOC/subscription-facture');
});

Route::get('/home-client', function() {
    return view('FOC/home');
});

// ---------------------------------------
Route::get('/edit', function() {
    return view('FOC/edit');
});
// ---------------------------------------

