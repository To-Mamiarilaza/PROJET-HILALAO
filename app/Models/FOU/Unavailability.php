<?php

namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;

class Unavailability
{
    private $id_unavailability;
    private $unavailability_date;
    private $start_time;
    private $end_time;

    public function __construct($id_unavailability, $unavailability_date, $start_time, $end_time)
    {
        $this->id_unavailability = $id_unavailability;
        $this->unavailability_date = $unavailability_date;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

///Encapsulation
    public function getIdUnavailability()
    {
        return $this->id_unavailability;
    }

    public function getUnavailabilityDate() {
        return $this->unavailability_date;
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
            $datas[$i] = new Unavailability($row->id_unavailability,  $row->unavailability_date, $row->start_time, $row->end_time);
            $i++;
        }
        return $datas;
    }

    //Recuperer les indisponibilites correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('unavailability')->where('id_unavailability', $id)->first();

        return new Unavailability($results->id_dispo_and_price, $results->unavailability_date, $results->start_time, $results->end_time);
    }

    //Recuperer les indisponibilites correspondant au parametre id
    public static function findByIdField($id_field, $date = null)
    {
        $sql = "SELECT * FROM unavailability WHERE id_field = %s AND unavailability_date = '%s'";
        $sql = sprintf($sql, $id_field, $date);
        $results = DB::select($sql);
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Unavailability($row->id_unavailability,  $row->unavailability_date, $row->start_time, $row->end_time);
            $i++;
        }
        return $datas;
    }

}
