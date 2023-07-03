<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;

class Recu extends Controller{
    public function recu(){
        return view("FOU/Facture");
    }
}