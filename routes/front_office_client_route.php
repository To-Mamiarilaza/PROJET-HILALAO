<?php 
use Illuminate\Support\Facades\Route;

Route::get('/home-client', function() {
    return view('FOC/home');
});
