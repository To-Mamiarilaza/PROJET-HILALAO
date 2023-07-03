<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\InscriptionController;
//use App\Models\FOC\SuiviReservation\Reservation_field;
use App\Http\Controllers\FOC\ReservationController;
use App\Http\Controllers\FOC\FieldController;


/// pour le premier chargement de la page
Route::GET('/', [LoginController::class, 'firstPage'])
->name('firstPage');

/// pour la page Login
Route::POST('/login', [LoginController::class, 'login'])
->name('login');


/// pour la page Sign In
Route::get('/SignIn', [LoginController::class, 'signin'])
->name('SignIn');

Route::post('/insertClient', [InscriptionController::class, 'insertClient'])
->name('signin');

/// pour la page suivante de Sign In : insert CIN
Route::post('/CIN-Client', [InscriptionController::class, 'insertCIN'])
->name('signinnext');

Route::get('/filtre', [ReservationController::class, 'filtre'])
->name('filtre');

Route::get('/selectByWeek', [ReservationController::class, 'getReservationOneWeek'])
->name('selectByWeek');

Route::get('/selectAllReservation', [ReservationController::class, 'getAllReservation'])
->name('selectAll');

Route::get('/insertDirectReservation', [ReservationController::class, 'insertDirectReservation'])
->name('insert');

Route::get('/home', function () {
    return view('FOC/home');
});

Route::get('/list-field', function () {
	return view('FOC/list-field');
});

Route::get('/profil-terrain', function () {
	return view('FOC/profil-terrain');
});

Route::post('/changePicture', [InscriptionController::class, 'changePicture'])
->name('changePicture');

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

// ---------------------------------------
Route::get('/profilClient', function() {
    return view('FOC/profilClient');
});

// Route::get('/board', function() {
//     return view('FOC/board');
// });
// ---------------------------------------

Route::post('/stat-terrainFOC', [ReservationController::class, 'filtre'])
->name('stat-terrainFOC');

Route::get('/filtreBoard', [ReservationController::class, 'filtreBoard'])
->name('filtreBoard');

Route::get('/stat-terrain', function() {
    return view('FOC/statistic-field');
});

Route::get('/list-fieldFOC', [FieldController::class, 'listField'])
->name('list-fieldFOC');

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
