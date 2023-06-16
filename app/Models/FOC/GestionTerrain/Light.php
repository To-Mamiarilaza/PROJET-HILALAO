<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;

class Light
{
    private $id_light;
    private $light;

    public function __construct($id_light, $light)
    {
        $this->id_light = $id_light;
        $this->light = $light;
    }

///Encapsulation
    public function getIdLight()
    {
        return $this->id_light;
    }

    public function getLight()
    {
        return $this->light;
    }


    //Recuperer toutes les lumieres
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM light');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Light($row->id_light, $row->light);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer lumiere correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('light')->where('id_light', $id)->first();
        
        return new Light($results->id_light, $results->light);
    }
}