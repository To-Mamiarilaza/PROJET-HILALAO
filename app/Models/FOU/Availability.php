<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Availability{
    private $day;
    private $start_time;
    private $end_time;


    public function getDay() {
        return $this->day;
    }
    public function setDay($values) {
        $this->day = $values;
    }
    public function getStartTime() {
        return $this->start_time;
    }
    public function setStartTime($values) {
        $this->start_time = $values;
    }
    public function getEndTime() {
        return $this->end_time;
    }
    public function setEndTime($values) {
        $this->end_time = $values;
    }

}
?>
