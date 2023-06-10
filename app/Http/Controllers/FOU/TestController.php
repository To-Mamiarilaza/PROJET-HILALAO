<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        return view('FOU\calendar');
    }
}
