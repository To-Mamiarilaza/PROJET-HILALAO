<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\InfoField;
use Illuminate\Http\Request;

class InfoTerrain extends Controller {
    public function index($id_field) {
        $infoField = new InfoField();
        $info = $infoField->infoField($id_field);

        return view("FOU/info_terrain", ['infos' => $info]);
    }
}
