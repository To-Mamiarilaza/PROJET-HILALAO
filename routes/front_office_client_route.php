<?php 
use Illuminate\Support\Facades\Route;

Route::get('/disponibility', function() {
    return view('FOC/disponibility');
});