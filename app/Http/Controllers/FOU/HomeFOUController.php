<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\Category;
use App\Models\FOU\ListField;

class HomeFOUController extends Controller
{
    public function index()
    {
        $categories = Category::findAll();
        return view('FOU\landing', ['categories' => $categories]);
    }
}
