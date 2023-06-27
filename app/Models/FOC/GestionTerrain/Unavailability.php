<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;

class Unavailability
{
    private $id_unavailability;
    private $field;
    private $unavailability_date;
    private $start_time;
    private $end_time;

    public function __construct($id_unavailability, $field, $unavailability_date, $start_time, $end_time)
    {
        $this->id_unavailability = $id_unavailability;
        $this->field = $field;
        $this->unavailability_date = $unavailability_date;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

///Encapsulation
    public function getIdUnavailability()
    {
        return $this->id_unavailability;
    }

    public function getField()
    {
        return $this->field;
    }

    public function setField($value)
    {
        $this->field = $value;
    }

    public function setUnavailabilityDate($value)
    {
        $this->unavailability_date = $value;
    }

    public function getStartTime()
    {
        return $this->start_time;
    }

    public function setStartTime($value)
    {
        $this->start_time = $value;
    }

    public function getEndTime()
    {
        return $this->end_time;
    }

    public function setEndTime($value)
    {
        $this->end_time = $value;
    }

    //Recuperer toutes les indisponibilites
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM unavailability');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Unavailability($row->id_unavailability, Field::findById($row->id_field),  $row->unavailability_date, $row->start_time, $row->end_time);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer les indisponibilites correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('unavailability')->where('id_unavailability', $id)->first();
        
        return new Unavailability($results->id_dispo_and_price, Field::findById($results->id_field), $results->unavailability_date, $results->start_time, $results->end_time);
    }

    //Sauvegarder une indisponibilite dans la base
    public function create()
    {
        $req = "INSERT INTO unavailability VALUES ( default, %d, '%s', '%s', '%s')";
           $req = sprintf($req,$this->field->id_field,$this->unavailability_date,$this->start_time,$this->end_time);
           DB::insert($req);
       }
   
    //Mettre a jour une indisponibilite
    public function update()
    {
        DB::table('unavailability')
        ->where('id_unavailability', $this->id_unavailability)
        ->update([
            'id_unavailability' => $this->id_unavailability,
            'id_field' => $this->field->id_field,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);
    }
   
    //Supprimer une disponiblite et prix par son id
    public function delete()
    {
        DB::table('unavailability')
        ->where('id_unavailability', $this->id_unavailability)
        ->delete();
    }
}