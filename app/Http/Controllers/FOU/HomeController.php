<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\ListField;

class HomeController extends Controller
{
    public function index()
    {
        return view('FOU\landing');
    }
}
