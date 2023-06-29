<?php
namespace App\Models\FOU;

use App\Models\FOU\Unavailability;
use Illuminate\Support\Facades\DB;
use DateTime;

class Availability extends DateTimeFO{
    private $price;
    private $unavailability;

    public function __contruct($day = null, $start_time = null, $end_time = null, $price = null) {
        parent::__construct($day, $start_time, $end_time);
        $this->setPrice($price);
    }

    public static function groupByDate($array_availability) {
        $result = [];
        for ($i=0; $i<count($array_availability); $i++) {
            $is_in = false;
            for ($j=0; $j<count($result); $j++) {
                if($array_availability[$i]->getDay() == $result[$j][$i]->getDay()) {
                    $result[$i][] = $array_availability[$i];
                    $is_in = true;
                    break;
                }
            }
            if (!$is_in){
                $result[] = array($array_availability[$i]);
            }
        }
        return $result;
    }


    public static function findByIdField($id_field, $date = null) {
        if($date == null) {
            $sql = 'SELECT day, start_time, end_time, id_field, price FROM v_availability_field_for_one_month WHERE id_field=%s';
            $sql = sprintf($sql, $id_field);
        } else {
            $sql = "SELECT day, start_time, end_time, id_field, price FROM v_availability_field_for_one_month WHERE id_field=%s AND day='%s'";
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
}
?>
