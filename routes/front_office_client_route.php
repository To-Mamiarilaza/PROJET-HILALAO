<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\FieldController;
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

Route::GET('/deconnect', [LoginController::class, 'deconnect'])
->name('deconnect');

/// pour la page Profil
Route::post('/ClientProfil', [LoginController::class, 'profilClient'])
->name('profilClient');

Route::GET('/loadAddField', [FieldController::class, 'loadAddField'])
->name('loadAddField');

Route::GET('/addField', [FieldController::class, 'addField'])
->name('addField');

Route::POST('/addFieldFile', function() {
    return view('FOC/addFieldFile');
});

Route::get('/subscription-facture', function() {
    return view('FOC/subscription-facture');
});

Route::get('/home-client', function() {
    return view('FOC/home');
});

Route::get('/list-field', [FieldController::class, 'listField'])
->name('list-field');

Route::get('/profile-field/{idField}', [FieldController::class, 'profileField'])
->name('profile-field');