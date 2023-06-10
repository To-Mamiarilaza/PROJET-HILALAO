<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BO\LoginController;
use App\Http\Controllers\BO\CrudController;
use App\Http\Controllers\BO\StatistiqueController;

use App\Models\BO\Statistique;
use Illuminate\Http\Request;

use App\Http\Controllers\BO\AbonnementController;

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
});

Route::get('/Check', [LoginController::class,
        'checkAccount']
)->name('login');

Route::get('/Statistique', [StatistiqueController::class,
        'statistique']
)->name('statistique');

Route::get('/Abonnemnt', [AbonnementController::class,
    'abonnement']
)->name('abonnement');

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
    $category = $_GET['annee'];
    $usersData = [];
    $ref=0;
    if($mois == '00'){
        $usersData = Statistique::getDataUsersYear($annee);
    }else{
        $usersData = Statistique::getDataUsersMonth($mois,$annee);
        $ref =2;
    }
    $data = Statistique::getDonneeNb($usersData);
    if($data == null){
        if($ref == 2 ){
            $data = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        }else{
            $data = [0,0,0,0,0,0,0,0,0,0];
        }
    }
    // Retourner les données en format JSON
    return response()->json($data);
});
Route::get('/clients', function () {
    // Appeler la méthode countClientsMonth du modèle Client avec les paramètres appropriés
    $annee = $_GET['annee'];
    $mois = $_GET['mois'];
    $category = $_GET['annee'];
    $clientsData = [];
    $ref =0;
    if($mois == '00'){
        $clientsData = Statistique::getDataClientsYear($annee);
    }else{
        $clientsData = Statistique::getDataClientsMonth($mois,$annee);
        $ref = 2;
    }
    $data = Statistique::getDonneeNb($clientsData);
    if($data == null){
        if($ref == 2 ){
            $data = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        }else{
            $data = [0,0,0,0,0,0,0,0,0,0];
        }
    }
    // Retourner les données en format JSON
    return response()->json($data);
});
Route::get('/terrains', function () {
    // Appeler la méthode countClientsMonth du modèle Client avec les paramètres appropriés
    $annee = $_GET['annee'];
    $mois = $_GET['mois'];
    $category = $_GET['annee'];
    $terrainsData = [];
    $ref = 0;
    if($mois == '00'){
        $terrainsData = Statistique::getDataTerrainsYear($annee);
        $ref = 1;
    }else{
        $terrainsData = Statistique::getDataTerrainsMonth($mois,$annee);
        $ref=2;
    }
    $data = Statistique::getDonneeNb($terrainsData);
    if($data == null){
        if($ref == 2 ){
            $data = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        }else{
            $data = [0,0,0,0,0,0,0,0,0,0];
        }
    }
    
    // Retourner les données en format JSON
    return response()->json($data);
});

Route::get('/filtrer', [StatistiqueController::class, 
'filtrer'])->name('filtrer');


?>
