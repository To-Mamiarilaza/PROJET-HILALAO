<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\InscriptionController;
use App\Models\FOC\SuiviReservation\Reservation_field;
use App\Http\Controllers\FOC\ReservationController;

Route::get('/reservation/{argument1}', function ($argument1) {
    $reservationFields = Reservation_field::getReservationsWithFields($argument1);
    return view('FOC/reservation', ['reservationFields' => $reservationFields]);
})->name('getReservationOneWeek');

Route::get('/insertDirectReservation', [ReservationController::class, 'insertDirectReservation'])
->name('insert');

Route::get('/', function () {
	return view('FOC/login');
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

/// pour la page Profil
Route::post('/ClientProfil', [LoginController::class, 'profilClient'])
->name('profilClient');

Route::get('/home-client', function() {
    return view('FOC/home');
});

Route::get('/stat-terrain', function() {
    return view('FOC/statistic-field');
});
?>