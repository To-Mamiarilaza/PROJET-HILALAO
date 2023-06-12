<?php 
use Illuminate\Support\Facades\Route;

Route::get('/reservation', function() {
    return view('FOC/reservation');
});