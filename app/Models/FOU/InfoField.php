<?php

namespace App\Models\FOU;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InfoField extends Model {
    public function infoField($idField) {
        $query = "SELECT * FROM v_info_field WHERE id_field = %d";
        $request = sprintf($query, $idField);

        $results = DB::select($request);
        
        return $results;
    }

    public function allinfoField() {
        $request = "SELECT * FROM v_info_field";
        
        $results = DB::select($request);

        return $results;
    }
}
