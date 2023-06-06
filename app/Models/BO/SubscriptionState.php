<?php

namespace App\Models\BO;
use Illuminate\Support\Facades\DB;

class SubscriptionState
{
    public $id_subscription_state;
    public $subscription_state;

    public function getId_subscription_state()
    {
        return $this->id_subscription_state;
    }
    public function setId_subscription_state($value)
    {
        $this->id_subscription_state = $value;
    }

    public function getSubscription_state()
    {
        return $this->subscription_state;
    }
    public function setSubscription_state($value)
    {
        $this->subscription_state = $value;
    }

    public function __construct()
    {
    }

    public function getAllSubscriptionState()
    {
        $field_type = DB::select('SELECT * FROM subscription_state ');
        $res = array();
        foreach ($field_type as $result) {
            $temp = new SubscriptionState();
            $temp->setId_subscription_state($result->id_subscription_state);
            $temp->setSubscription_state($result->subscription_state);
            $res[] = $temp;
        }
        return $res;
    }

    public function save(){
        $req = "INSERT INTO subscription_state(subscription_state) VALUES ('%s')";
        $subscription_state = $this->subscription_state;
        $req = sprintf($req,$subscription_state);
        DB::insert($req);
    }
}
