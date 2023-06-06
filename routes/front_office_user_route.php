<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOU\MyListFieldController;

Route::get('/ListFields', [MyListFieldController::class, 'index']);
