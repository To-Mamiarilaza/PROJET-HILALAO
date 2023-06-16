<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DateTimeFO{
    private $day;
    private $start_time;
    private $end_time;

    public function __construct($day = null, $start_time = null, $end_time = null)
    {
        $this->setDay($day);
        $this->setStartTime($start_time);
        $this->setEndTime($end_time);
    }

    public function intersect(DateTimeFO $datetime) {
        if($this->getDay() == $datetime->getDay()) {
            return $this->getStartTime()<=$datetime->getEndTime() && $this->getEndTime()>=$datetime->getStartTime();
        }
        return false;
    }

    public function anterior() {
        $today = Date('Y-M-d');
        $time = time();
        var_dump($time);
    }

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
