<?php

namespace App\Models\FOC\suiviAbo;
use Illuminate\Support\Facades\DB;

class Month
{
    private $id_month;
    private $value;

    public function __construct($id_month, $value="")
    {
        $this->id_month = $id_month;
        $this->value = $value;
    }

///Encapsulation
    public function getIdMonth()
    {
        return $this->id_month;
    }

    public function setIdMonth($value) {
        $this->id_month = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        return $this->value = $value;
    }

    //Recuperer toutes les mois
    public static function getAllMonth()
    {
       $months = array();
       $months[0] = new Month(1, 'Janvier');
       $months[1] = new Month(2, 'Fevrier');
       $months[2] = new Month(3, 'Mars');
       $months[3] = new Month(4, 'Avril');
       $months[4] = new Month(5, 'Mai');
       $months[5] = new Month(6, 'Juin');
       $months[6] = new Month(7, 'Juillet');
       $months[7] = new Month(8, 'Auout');
       $months[8] = new Month(9, 'Septembre');
       $months[9] = new Month(10, 'Octobre');
       $months[10] = new Month(11, 'Novembre');
       $months[11] = new Month(12, 'Decemebre');

       return $months;
    }
}