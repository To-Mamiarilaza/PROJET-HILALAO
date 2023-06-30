<?php

use App\Http\Controllers\BO\ValidationClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BO\LoginController;
use App\Http\Controllers\BO\CrudController;
use App\Http\Controllers\BO\StatistiqueController;
use App\Models\BO\Statistique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BO\DetailClientController;
use App\Http\Controllers\BO\DetailTerrainController;

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

Route::get('/login_admin', function () {
    return view('BO/login');
})->name('log_admin');

Route::get('/logout_admin', function () {
    // Supprimer la session 'id_account_admin'
    Session::forget('id_account_admin');

    // Rediriger vers la page de connexion ou une autre page selon vos besoins
    return redirect()->route('log_admin');
})->name('log_out_admin');


Route::post('/Check_admin', [App\Http\Controllers\BO\LoginController::class,
        'checkAccount']
)->name('login_admin');

Route::get('/Statistique/{ref}', [StatistiqueController::class,
        'statistique']
)->name('statistique_admin');

Route::get('/Abonnement/{ref}', [App\Http\Controllers\BO\AbonnementController::class,
    'abonnement']
)->name('abonnement_admin');

Route::get('/ValidationClient/{ref}', [ValidationClientController::class,
    'validationClient']
)->name('validationClient_admin');


Route::get('/detailClient/{value}/{id_client}/{ref}', [DetailClientController::class,
    'modifierStatus']
)->name('DetailCLient_admin');

Route::get('/DetailClient/{id_client}/{ref}', [DetailClientController::class,
    'detailClient']
)->name('detailClient_admin');

Route::get('/DetailTerrain/{id_terrain}/{ref}', [DetailTerrainController::class,
    'detailTerrain']
)->name('detailTerrain_admin');

Route::get('/DetailTerrain', [DetailTerrainController::class,
    'detailFieldById']
)->name('detail_field_admin');

Route::get('/fieldByClient/{id_client}/{ref}', [DetailTerrainController::class,
        'fieldByClient']
)->name('fieldByClient_admin');


Route::get('/ListeTerrain', [DetailTerrainController::class,
    'all']
)->name('list_field_admin');

Route::get('/DetailTerrain/{variable}/{id_terrain}/{ref}', [DetailTerrainController::class,
    'update']
)->name('update_status_admin');

Route::get('/sign_admin', function () {
    return view('BO/sign');
})->name('view_sign_admin');


Route::post('/Sign_admin', [LoginController::class,
    'saveAll'])->name('Sign_admin');

Route::get('/all/{variable}', [CrudController::class, 'all'])->name('crud_admin');

Route::get('/update/{variable}/{id}', [CrudController::class,
    'getViewUpdate'])->name('update_admin');

Route::post('/updateByid', [CrudController::class,
    'update'])->name('updateByid_admin');

Route::get('/delete/{variable}/{id}', [CrudController::class,
    'all'])->name('delete_admin');

Route::post('/insert', [CrudController::class,
    'save'])->name('insert_admin');


Route::get('/users_admin', function () {
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
Route::get('/clients_admin', function () {
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
Route::get('/terrains_admin', function () {
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
