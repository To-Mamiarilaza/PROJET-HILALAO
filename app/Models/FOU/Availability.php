<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Availability extends DateTimeFO{
    private $price;

    public function __contruct($day = null, $start_time = null, $end_time = null, $price = null) {
        parent::__construct($day, $start_time, $end_time);
        $this->setPrice($price);
    }

    public static function findByIdField($id_field) {
        $sql = 'SELECT day, start_time, end_time, id_field, price FROM v_availability_field_for_one_month WHERE id_field=%s';
        $sql = sprintf($sql, $id_field);
        $availabilitys_db = DB::select($sql);
        $res = [];
        foreach ($availabilitys_db as $result) {
            $res[] = Availability::settingDBResult($result);
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
}
?>
