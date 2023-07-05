<?php

namespace App\Models\FOC\suiviAbo;
use Illuminate\Support\Facades\DB;

class SubscriptionState
{
    private $id_subscription_state;
    private $subscriptionState;

    public function __construct($id_subscription_state, $subscriptionState)
    {
        $this->id_subscription_state = $id_subscription_state;
        $this->subscriptionState = $subscriptionState;
    }

///Encapsulation
    public function getIdSubscriptionState()
    {
        return $this->id_subscription_state;
    }

    public function getSubscriptionState()
    {
        return $this->subscriptionState;
    }


    //Recuperer toutes les etats abonnements
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM subscription_state');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new SubscriptionState($row->id_light, $row->light);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer l'etat ebonnement' correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('subscription_state')->where('id_subscription_state', $id)->first();
        
        return new SubscriptionState($results->id_subscription_state, $results->subscription_state);
    }
}