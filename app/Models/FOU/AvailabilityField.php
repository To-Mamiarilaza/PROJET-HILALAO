<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AvailabilityField extends Availability{
    private $price;

    public static function findByIdField($id_field) {
        $sql = 'SELECT day, start_time, end_time, id_field, price FROM v_availability_field_for_one_month WHERE id_field=%s';
        $sql = sprintf($sql, $id_field);
        $availabilitys_db = DB::select($sql);
        $res = [];
        foreach ($availabilitys_db as $result) {
            $res[] = AvailabilityField::settingDBResult($result);
        }
        return $res;
    }

    private static function settingDBResult($result) {
        $temp = new AvailabilityField();
        $temp->setStartTime($result->start_time);
        $temp->setEndTime($result->end_time);
        $temp->setDay($result->day);
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
