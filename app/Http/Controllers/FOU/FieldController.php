<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\ListField;
use App\Models\FOU\InfoField;

class FieldController extends Controller
{
    public function index()
    {
        $listFieldInstance = new ListField();
        $listFields = $listFieldInstance->getListFields();

        $infoField = new InfoField();
        $info = $infoField->allinfoField();

        return view('FOU\listTerrainModif', ['listFields' => $listFields], ['infos' => $info]);
    }
}
