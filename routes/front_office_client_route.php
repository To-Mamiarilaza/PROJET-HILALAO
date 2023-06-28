<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOC\LoginController;
use App\Http\Controllers\FOC\InscriptionController;
use App\Models\FOC\SuiviReservation\Reservation_field;
use App\Http\Controllers\FOC\ReservationController;

Route::get('/reservation', function () {
    $start_time = '10:00';
    $end_time = '11:30';
    $rf_id_field = 1;
    $price = 10000;
    $field_id = 1;
    $field_name = 'Terrain de football';
    $field_category = 'Sports';
    $subscribing_price = 5000;
    $field_type = 'Outdoor';
    $infrastructure = 'Stade';
    $light = 'Non';
    $address = '123 Rue du Terrain';
    $longitude = 45.123456;
    $latitude = -73.654321;
    $description = 'Un terrain de football de qualité';
    $id_reservation = 1;
    $reservation_date = '2023-06-01';
    $first_name = 'John';
    $last_name = 'Doe';
    $birth_date = '1990-01-01';
    $phone_number = '0123456789';
    $mail = 'john.doe@example.com';
    $rv_field_name = 'Terrain de football';
    $field_description = 'Un terrain de football de qualité';
    $field_address = '123 Rue du Terrain';
    $reservationField = new Reservation_field(
        1,
        1,
        $start_time,
        $end_time,
        $rf_id_field,
        $price,
        $field_id,
        $field_name,
        $field_category,
        $subscribing_price,
        $field_type,
        $infrastructure,
        $light,
        $address,
        $longitude,
        $latitude,
        $description,
        $id_reservation,
        $reservation_date,
        $first_name,
        $last_name,
        $birth_date,
        $phone_number,
        $mail,
        '10:00',
        1,
        $rv_field_name,
        $field_description,
        $field_address
    );
    $reservationFields = $reservationField->getReservationsWithFields();
    return view('FOC/reservation', ['reservationFields' => $reservationFields]);
})->name('getAllReservation');

Route::get('/selectByWeek', [ReservationController::class, 'getReservationOneWeek'])
->name('selectByWeek');

Route::get('/selectAll', [ReservationController::class, 'getAllReservation'])
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

// ---------------------------------------
Route::get('/profilClient', function() {
    return view('FOC/profilClient');
});
// ---------------------------------------

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
