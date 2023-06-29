<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\Availability;
use App\Models\FOU\FieldDetailled;
use App\Models\FOU\Unavailability;
use DateTime;

class TestController extends Controller
{
    public function index()
    {
        // $field = FieldDetailled::sFindById(3);
        // foreach ($field->getAvailability() as $key) {
        //     var_dump($key->getUnavailability());
        //     echo "<br>";
        // }
            $availability_field = Availability::findByIdField(1);
            $test = new Availability(new DateTime(), DateTime::createFromFormat('H:i:s', '01:00:00'), DateTime::createFromFormat('H:i:s', '23:00:00'));
            $una = new Unavailability(null, new DateTime(), DateTime::createFromFormat('H:i:s', '05:00:00'), DateTime::createFromFormat('H:i:s', '7:00:00'));
            $test->setUnavailability(array($una));
            $a = Availability::normalize($availability_field);
            $availability_grouped = Availability::groupByDate($a);
            foreach ($availability_grouped as $av) {
                foreach ($av as $test) {
                    var_dump($test);
                    echo '<br>';
                    echo '<br>';
                }
                echo '<hr>';
            }
            //$result = Availability::normalize($a);
        return view('FOU\empty');
    }
}
