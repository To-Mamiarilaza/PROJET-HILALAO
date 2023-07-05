<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DispoAndPrice
{
    private $id_dispo_and_price;
    private $day;
    private $start_time;
    private $end_time;
    private $field;
    private $price;

    public function __construct($id_dispo_and_price, $day, $start_time, $end_time, $field, $price)
    {
        $this->id_dispo_and_price = $id_dispo_and_price;
        $this->day = $day;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->field = $field;
        $this->price = $price;
    }

///Encapsulation
    public function getIdDispoAndPrice()
    {
        return $this->id_dispo_and_price;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function setDay($value)
    {
        $this->day = $value;
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

    public function getField()
    {
        return $this->field;
    }

    public function setField($value)
    {
        $this->field = $value;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($value)
    {
        $this->price = $value;
    }

    //Recuperer toutes les disponibilites et prix
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM dispo_and_price');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new DispoAndPrice($row->id_dispo_and_price, Day::findById($row->id_day),  DispoAndPrice::formatTime($row->start_time), DispoAndPrice::formatTime($row->end_time), Field::findbyId($row->id_field), $row->price);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer toutes les disponibilites et prix
    public static function getAllDispoField($field)
    {
        $results = DB::select('SELECT * FROM dispo_and_price WHERE id_field='.$field->getIdField());
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new DispoAndPrice($row->id_dispo_and_price, Day::findById($row->id_day),  DispoAndPrice::formatTime($row->start_time), DispoAndPrice::formatTime($row->end_time), Field::findbyId($row->id_field), $row->price);
            $i++;
        }
         
        return $datas;
    }

    //Recuperer le disponibilite et prix correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('dispo_and_price')->where('id_dispo_and_price', $id)->first();
        
        return new DispoAndPrice($results->id_dispo_and_price, Day::findById($results->id_day),  DispoAndPrice::formatTime($results->start_time), DispoAndPrice::formatTime($results->end_time), Field::findById($results->field), $results->price);
    }

    //Sauvegarder une disponibilite et prix dans la base
    public function create()
    {
        $req = "INSERT INTO dispo_and_price VALUES ( default, %d, '%s', '%s', %d, %d)";
        echo "Day : ".$this->day->getIdDay();
        echo "Price : ".$this->price;
        echo "startTime : ".$this->getStartTime();
        echo "EndTime : ".$this->getEndTime();

        $req = sprintf($req,$this->day->getIdDay(),$this->start_time,$this->end_time, $this->field->getIdField(), $this->price);
        DB::insert($req);
    }
   
    //Mettre a jour une disponibilite et prix
    public function update()
    {
        DB::table('dispo_and_price')
        ->where('id_dispo_and_price', $this->id_dispo_and_price)
        ->update([
            'id_dispo_and_price' => $this->id_dispo_and_price,
            'id_day' => $this->day->getIdDay,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'id_field' => $this->field->getIdField,
            'price' => $this->price,
        ]);
    }
   
    //Supprimer une disponiblite et prix par son id
    public function delete()
    {
        DB::table('dispo_and_price')
        ->where('id_dispo_and_price', $this->id_dispo_and_price)
        ->delete();
    }

    //Avoir les disponibilites de meme date, meme heure et meme prix
    public static function getDisposSame($startime, $endTime, $price) {
        $sql = "SELECT * FROM dispo_and_price WHERE start_time='%s' and end_time='%s' and price=%d";
        $sql=sprintf($sql,$startime,$endTime,$price);
        echo $sql;
        $results = DB::select($sql);
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new DispoAndPrice($row->id_dispo_and_price, Day::findById($row->id_day),  $row->start_time, $row->end_time, Field::findbyId($row->id_field), $row->price);
            $i++;
        }
        
        return $datas;
    }

    //Verifier si l'heure et date insere s'inclusent
    public static function checkInsert($allDisposAndPrice, $dispoAndPrice) {
        foreach($allDisposAndPrice as $item) {
            if($dispoAndPrice->getDay()->getIdDay() == $item->getDay()->getIdDay() && DispoAndPrice::getHour($dispoAndPrice->getStartTime()) >= DispoAndPrice::getHour($item->getStartTime()) && DispoAndPrice::getHour($dispoAndPrice->getEndTime()) <= DispoAndPrice::getHour($item->getEndTime())) {
                return false;
            }
        }

        return true;
    } 

    //Extraire l'heure d'un type time
    public static function getHour($time) {
        return substr($time, 0, 2);
    }

    //Formatter le time en heure et minutes
    public static function formatTime($timeValue)
    {
        $time = Carbon::createFromFormat('H:i:s', $timeValue);
        return $time->format('H:i');
    }
}