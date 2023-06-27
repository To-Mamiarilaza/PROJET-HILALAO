<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;

class Day
{
    private $id_day;
    private $day;

    public function __construct($id_day, $day)
    {
        $this->id_day = $id_day;
        $this->day = $day;
    }

///Encapsulation
    public function getIdDay()
    {
        return $this->id_day;
    }

    public function getDay()
    {
        return $this->day;
    }


    //Recuperer toutes les jours
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM day');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Day($row->id_day, $row->day);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer lumiere correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('day')->where('id_day', $id)->first();
        
        return new Day($results->id_day, $results->day);
    }
}