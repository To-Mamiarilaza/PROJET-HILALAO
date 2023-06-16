<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\ListField;

class FieldController extends Controller
{
    public function index()
    {
        $listFieldInstance = new ListField();
        $listFields = $listFieldInstance->getListFields();
        return view('FOU\listTerrainModif', ['listFields' => $listFields]);
    }
}
