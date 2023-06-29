<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\FieldDetailled;

class TestController extends Controller
{
    public function index()
    {
        // $field = FieldDetailled::sFindById(3);
        // foreach ($field->getAvailability() as $key) {
        //     var_dump($key->getUnavailability());
        //     echo "<br>";
        // }
        return view('FOU\profileTerrain');
    }
}
