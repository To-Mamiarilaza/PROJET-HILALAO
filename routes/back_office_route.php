<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BO\LoginController;
use App\Http\Controllers\BO\CrudController;
use App\Http\Controllers\BO\StatistiqueController;

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
)->name('statistique');;

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

?>
