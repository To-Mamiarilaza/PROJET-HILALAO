<?php
use App\Http\Controllers\FOU\MyListFieldController;

Route::get('/ListFields', [MyListFieldController::class, 'index']);
