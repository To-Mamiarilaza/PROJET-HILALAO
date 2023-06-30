<?php
namespace App\Models\FOU;

use App\Models\FOU\Unavailability;
use Illuminate\Support\Facades\DB;
use DateTime;

class Availability extends DateTimeFO{
    private $price;
    private $unavailability;
    private $dayOfWeek;

    public function __contruct($day = null, $start_time = null, $end_time = null, $price = null) {
        parent::__construct($day, $start_time, $end_time);
        $this->setPrice($price);
    }

    public static function normalize($array_availability){
        $result = [];
        foreach ($array_availability as $availability) {
            foreach (Availability::toAvailability($availability) as $item) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public static function toAvailability($availability) {
        $result = array($availability);
        foreach ($availability->getUnavailability() as $unavailability) {
            $index = count($result)-1;
            if ($unavailability->getStartTime() > $result[$index]->getStartTime() && $unavailability->getEndTime() < $availability->getEndTime()) {
                $result[$index] = new Availability($availability->getDay(), $availability->getStartTime(), $unavailability->getStartTime());
                $result[$index+1] = new Availability($availability->getDay(), $unavailability->getEndTime(), $availability->getEndTime());
            }
        }
        return $result;
    }

    public static function groupByDate($array_availability) {
        $result = [];
        $index = 0;
        for ($i=0; $i<count($array_availability); $i++) {
            $is_in = false;
            for ($j=0; $j<count($result); $j++) {
                if($array_availability[$i]->getDay()->format('d-m-Y') == $result[$j][0]->getDay()->format('d-m-Y')) {
                    $result[$j][] = $array_availability[$i];
                    $is_in = true;
                    break;
                }
            }
            if (!$is_in){
                $result[] = array($array_availability[$i]);
                $index++;
            }
        }
        return $result;
    }


    public static function findByIdField($id_field, $date = null) {
        if($date == null) {
            $sql = 'SELECT id_day, day, start_time, end_time, id_field, price FROM v_availability_field_for_one_month WHERE id_field=%s';
            $sql = sprintf($sql, $id_field);
        } else {
            $sql = "SELECT id_day, day, start_time, end_time, id_field, price FROM v_availability_field_for_one_month WHERE id_field=%s AND day='%s'";
            $sql = sprintf($sql, $id_field, $date);
        }
        $availabilitys_db = DB::select($sql);
        $res = [];
        $index = 0;
        foreach ($availabilitys_db as $result) {
            $res[$index] = Availability::settingDBResult($result);
            $res[$index]->setUnavailability(Unavailability::findByIdField($id_field, $res[$index]->getDay()->format('Y-m-d')));
            $index++;
        }
        return $res;
    }

    private static function settingDBResult($result) {
        $temp = new Availability();
        $temp->setStartTime(DateTime::createFromFormat('H:i:s', $result->start_time));
        $temp->setEndTime(DateTime::createFromFormat('H:i:s',$result->end_time));
        $temp->setDay(DateTime::createFromFormat('Y-m-d',$result->day));
        $temp->setPrice($result->price);
        $temp->setDayOfWeek($result->id_day);
        return $temp;
    }


    public function getPrice() {
        return $this->price;
    }
    public function setPrice($values) {
        $this->price = $values;
    }
    public function getUnavailability() {
        return $this->unavailability;
    }
    public function setUnavailability($values) {
        $this->unavailability = $values;
    }
    public function getDayOfWeek() {
        return $this->dayOfWeek;
    }
    public function setDayOfWeek($values) {
        $this->dayOfWeek = $values;
    }
}
?>
