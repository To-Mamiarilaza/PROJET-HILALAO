<?php

namespace App\Models\FOC\suiviAbo;

use App\Http\Controllers\FOC\SuiviAboController;
use Illuminate\Support\Facades\DB;
use App\Models\FOC\GestionTerrain\Field;
use Carbon\Carbon;

class SubscriptionSuivi
{
    private $id_subscription;
	private $field;
	private $subscription_date;
	private $start_date;
	private $duration;
	private $subscription_state;

    public function __construct($id_subscription, $field, $subscription_date, $start_date, $duration, $subscription_state)
    {
        $this->id_subscription = $id_subscription;
        $this->field = $field;
        $this->subscription_date = $subscription_date;
        $this->start_date = $start_date;
        $this->duration = $duration;
        $this->subscription_state = $subscription_state;
    }

///Encapsulation
    public function getIdSubscription()
    {
        return $this->id_subscription;
    }

    public function getField()
    {
        return $this->field;
    }

    public function setField($value)
    {
        $this->field = $value;
    }

    public function setSubscriptionDate($value)
    {
        $this->subscription_date = $value;
    }

    public function getSubscriptionDate()
    {
        return $this->subscription_date;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function setStartDate($value)
    {
        $this->start_date = $value;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($value)
    {
        $this->duration = $value;
    }

    public function getSubscriptionState()
    {
        return $this->subscription_state;
    }

    public function setSubscriptionState($value)
    {
        $this->subscription_state = $value;
    }

    public function getEndDate() {
                
        $date = Carbon::parse($this->getStartDate());
        $date->addMonths($this->getDuration());

        return $date->toDateString(); 
    }

    public function getDayRest() {
        $dateNow = SubscriptionSuivi::getDateNow();      

        $date1 = Carbon::parse($this->getEndDate());
        $date2 = Carbon::parse($dateNow);
        
        return $date1->diffInDays($date2);        
    }

    //Recuperer toutes les abonnement d'un client
    public static function getAllSubscriptionField($field, $year)
    {
        $sql = 'SELECT * FROM subscription WHERE id_field='.$field->getIdField().' AND EXTRACT(YEAR FROM start_date) ='.$year;
        $results = DB::select($sql);
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new SubscriptionSuivi($row->id_subscription, Field::findById($row->id_field),  $row->subscription_date, $row->start_date, $row->duration, SubscriptionState::findById($row->id_subscription_state));
            $i++;
        }
        
        return $datas;
    }


    //Recuperer l'abonnement correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('subscription')->where('id_subscription', $id)->first();
        
        return  new SubscriptionSuivi($results->id_subscription, Field::findById($results->id_field),  $results->subscription_date, $results->start_date, $results->duration, SubscriptionState::findById($results->subscription_state));
    }

    //Avoir le month d'une date
    public static function getMonth($date) {
        $parts = explode(" ", $date);
        $date = Carbon::createFromFormat('Y-m-d', $parts[0]);
        return $date->format('m');
    }

    //Recuperer le tout debut abonnement du terrain
    public static function getStartSubscriptionField($field)
    {
        $sql = 'SELECT * FROM subscription WHERE id_field='.$field->getIdField().' ORDER BY start_date ASC LIMIT 1';
        $results = DB::select($sql);
        foreach ($results as $row) {
            return new SubscriptionSuivi($row->id_subscription, Field::findById($row->id_field),  $row->subscription_date, $row->start_date, $row->duration, SubscriptionState::findById($row->id_subscription_state));
        }
        
        return null;
    }

    
    //Recuperer le tout dernier abonnement du terrain
    public static function getEndSubscriptionField($field)
    {
        $sql = 'SELECT * FROM subscription WHERE id_field='.$field->getIdField().' ORDER BY start_date DESC LIMIT 1';
        $results = DB::select($sql);
        foreach ($results as $row) {
            return new SubscriptionSuivi($row->id_subscription, Field::findById($row->id_field),  $row->subscription_date, $row->start_date, $row->duration, SubscriptionState::findById($row->id_subscription_state));
        }
        
        return null;
    }

    //Recuperer la date d'ajourd'hui
    public static function getDateNow() {
        return Carbon::today();
    }

    //recuprerer l'annee d'une date
    public static function getYear($date) {
        $date = Carbon::parse($date);

        return $date->year;
    } 

    //Est ce que le terrain est abonne
    public static function isAbo($allAbo, $vueAbo) {
        foreach($allAbo as $item) {
            if(SubscriptionSuivi::getMonth($item->getStartDate()) == $vueAbo->getMonth()->getIdMonth()) {
                $vueAbo->setColor("info");
                $vueAbo->setAbo($item);
                
                return $vueAbo;
            }
        }
    
        return null;
    }

    //Est ce que le mois dans l'annee de la date est egale
    public static function isMonthEquals($year1, $month1, $date2) { 
        $mois1 = Carbon::createFromDate($year1, $month1, 1);
        $mois2 = Carbon::createFromDate(SubscriptionSuivi::getYear($date2), SubscriptionSuivi::getMonth($date2), 1);

        if ($mois1->eq($mois2)) {
            return true;
        } 

        return false;
    }

    //Est ce que le mois 1 est inferieur au mois 2
    public static function isMonth1InfToMonth2($year1, $month1, $date2) {
        $mois1 = Carbon::createFromDate($year1, $month1, 1);
        $mois2 = Carbon::createFromDate(SubscriptionSuivi::getYear($date2), SubscriptionSuivi::getMonth($date2), 1);

        if ($mois1->gt($mois2)) {
            return true;
        } 

        return false;
    }

    //Est ce que le mois 1 est superieur au mois 2
    public static function isMonth1SupToMonth2($year1, $month1, $date2) {
        $mois1 = Carbon::createFromDate($year1, $month1, 1);
        $mois2 = Carbon::createFromDate(SubscriptionSuivi::getYear($date2), SubscriptionSuivi::getMonth($date2), 1);

        if ($mois1->lt($mois2)) {
            return true;
        }

        return false;
    }    


}
?>