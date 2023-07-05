<?php

namespace App\Models\FOC\suiviAbo;
use Illuminate\Support\Facades\DB;

class VueAbo
{
    private $month;
    private $abo;
    private $color;


    public function __construct($month, $abo, $color="")
    {
        $this->month = $month;
        $this->abo = $abo;
        $this->color = $color;
    }

///Encapsulation
    public function getMonth()
    {
        return $this->month;
    }

    public function setMonth($value)
    {
        $this->month = $value;
    }

    public function getAbo()
    {
        return $this->abo;
    }

    public function setAbo($value)
    {
        $this->abo = $value;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($value) {
        $this->color = $value;
    }
    
    //Recuperer toutes les vues d'abonnement
    public static function formerVueAbo($field, $year) {
        $dateNow = SubscriptionSuivi::getDateNow();
        $vueAbo = VueAbo::initializeVueAbo();
        $allAbo = SubscriptionSuivi::getAllSubscriptionField($field, $year);
        $firstAbo = SubscriptionSuivi::getStartSubscriptionField($field);

        if($firstAbo != null) {
            foreach($vueAbo as $item) {
                if((SubscriptionSuivi::isMonth1SupToMonth2($year, $item->getMonth()->getIdMonth(), $firstAbo->getStartDate())==true || SubscriptionSuivi::isMonthEquals($year, $item->getMonth()->getIdMonth(), $firstAbo->getStartDate()) == true) && (SubscriptionSuivi::isMonth1InfToMonth2($year, $item->getMonth()->getIdMonth(), $dateNow) == true || (SubscriptionSuivi::isMonthEquals($year, $item->getMonth()->getIdMonth(), $dateNow)))) {
                    if(SubscriptionSuivi::IsAbo($allAbo, $item) != null) {
                        $item = SubscriptionSuivi::IsAbo($allAbo, $item);
                    }
                    else {
                        $item->setColor("non-paye");
                    }
                }
                else if((SubscriptionSuivi::isMonth1SupToMonth2($year, $item->getMonth()->getIdMonth(), $dateNow)==true)) {
                    if(SubscriptionSuivi::IsAbo($allAbo, $item) != null) {
                        $item = SubscriptionSuivi::IsAbo($allAbo, $item);
                    }
                }
                else {}
            }  
        }

        return $vueAbo;
    }

    //Initialiser les listes de vues d'abonnement
    public static function initializeVueAbo() {
        $vueAbo = array();
        $allMonth = Month::getAllMonth();
        $i = 0;
        foreach($allMonth as $month) {
            $vueAbo[$i] = new VueAbo($month, null, "normal");
            $i++;
        }

        return $vueAbo;
    }
}