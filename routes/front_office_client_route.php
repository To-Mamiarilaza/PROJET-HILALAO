<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\InscriptionController;
use App\Models\FOC\SuiviReservation\Reservation_field;
use App\Http\Controllers\FOC\ReservationController;

Route::get('/reservation/', function () {
    $reservationFields = Reservation_field::getReservationsWithFields();
    return view('FOC/reservation', ['reservationFields' => $reservationFields]);
})->name('getReservationOneWeek');

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

Route::get('/stat-terrain', function() {
    return view('FOC/statistic-field');
});

Route::get('/list-field', [FieldController::class, 'listField'])
->name('list-field');

Route::get('/profile-field/{idField}', [FieldController::class, 'profileField'])
->name('profile-field');

Route::POST('/searchField', [FieldController::class, 'searchField'])
->name('searchField');

Route::POST('/editImageProfile', [FieldController::class, 'editImage'])
->name('editImageProfile');
?>
