<?php

use App\Http\Controllers\BO\ValidationClientController;
use App\Models\BO\ValidationClient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BO\LoginController;
use App\Http\Controllers\BO\CrudController;
use App\Http\Controllers\BO\StatistiqueController;

use App\Models\BO\Statistique;
use Illuminate\Http\Request;

use App\Http\Controllers\BO\AbonnementController;
use App\Http\Controllers\BO\DetailClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('BO/login');
})->name('log');

Route::get('/Check', [LoginController::class,
        'checkAccount']
)->name('login');

Route::get('/Statistique', [StatistiqueController::class,
        'statistique']
)->name('statistique');

Route::get('/Abonnement', [AbonnementController::class,
    'abonnement']
)->name('abonnement');

Route::get('/ValidationClient', [ValidationClientController::class,
    'validationClient']
)->name('validationClient');

Route::get('/DetailClient/{id_client}', [DetailClientController::class,
    'detailClient']
)->name('detailClient');

Route::get('/sign', function () {
    return view('BO/sign');
})->name('view_sign');


Route::get('/Sign', [LoginController::class,
    'saveAll'])->name('Sign');

Route::get('/all/{variable}', [CrudController::class, 'all'])->name('crud');

Route::get('/update/{variable}/{id}', [CrudController::class, 
    'getViewUpdate'])->name('update');

Route::get('/updateByid', [CrudController::class, 
    'update'])->name('updateByid');
    
Route::get('/delete/{variable}/{id}', [CrudController::class,
    'all'])->name('delete');
    
Route::post('/insert', [CrudController::class, 
    'save'])->name('insert');


Route::get('/users', function () {
    // Appeler la méthode countClientsMonth du modèle Client avec les paramètres appropriés
    $annee = $_GET['annee'];
    $mois = $_GET['mois'];
    $usersData = [];
    if($mois == '00'){
        $usersData = Statistique::getDataUsersYear($annee);
    }else{
        $usersData = Statistique::getDataUsersMonth($mois,$annee);
    }
    $data = Statistique::getDonneeNb($usersData);
    // Retourner les données en format JSON
    return response()->json($data);
});
Route::get('/clients', function () {
    // Appeler la méthode countClientsMonth du modèle Client avec les paramètres appropriés
    $annee = $_GET['annee'];
    $mois = $_GET['mois'];
    $clientsData = [];
    if($mois == '00'){
        $clientsData = Statistique::getDataClientsYear($annee);
    }else{
        $clientsData = Statistique::getDataClientsMonth($mois,$annee);
    }
    $data = Statistique::getDonneeNb($clientsData);
    // Retourner les données en format JSON
    return response()->json($data);
});
Route::get('/terrains', function () {
    // Appeler la méthode countClientsMonth du modèle Client avec les paramètres appropriés
    $annee = $_GET['annee'];
    $mois = $_GET['mois'];
    $category = $_GET['category'];
    $terrainsData = [];
    if($mois == '00'){
        $terrainsData = Statistique::getDataTerrainsYear($annee,$category);
    }else{
        $terrainsData = Statistique::getDataTerrainsMonth($mois,$annee,$category);
    }
    $data = Statistique::getDonneeNb($terrainsData);
    
    // Retourner les données en format JSON
    return response()->json($data);
});


?>
