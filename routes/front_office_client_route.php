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


Route::get('/home', function () {
    return view('FOC/home');
});

Route::GET('/deconnect', [LoginController::class, 'deconnect'])
->name('deconnect');

/// pour la page Profil
Route::post('/ClientProfil', [LoginController::class, 'profilClient'])
->name('profilClient');

Route::GET('/loadAddField', [FieldController::class, 'loadAddField'])
->name('loadAddField');

Route::POST('/addField', [FieldController::class, 'addField'])
->name('addField');

Route::POST('/addFieldFile', [FieldController::class, 'addFieldFile'])
->name('addFieldFile');


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

Route::POST('/searchField', [FieldController::class, 'searchField'])
->name('searchField');

Route::POST('/editImageProfile', [FieldController::class, 'editImage'])
->name('editImageProfile');

Route::POST('/getInfosAdress', [FieldController::class, 'getInfosAdress'])
->name('getInfosAdress');

Route::get('/disponibility', function () {
    return view('FOC/disponibility');
});

Route::POST('/insertDispoAndPrice', [FieldController::class, 'insertDiposAndPrice'])
->name('insertDiposAndPrice');

Route::GET('/loadPageDispoAndPriceGet', [FieldController::class, 'loadPageDispoAndPrice'])
->name('loadPageDispoAndPriceGet');

Route::POST('/loadPageDispoAndPricePost', [FieldController::class, 'loadPageDispoAndPrice'])
->name('loadPageDispoAndPricePost');

Route::GET('/deleteDisponibility', [FieldController::class, 'deleteDisponibility']);