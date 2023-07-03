<?php

namespace App\Models\BO;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;

class SubscriptionState
{
    public $id_subscription_state;
    public $subscription_state;
    private $status;

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

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($value) {
        $this->status = $value;
    }

    public function __construct()
    {
    }

    public function getAllSubscriptionState()
    {
        $field_type = DB::select('SELECT * FROM subscription_state where status = 1');
        $res = array();
        foreach ($field_type as $result) {
            $temp = new SubscriptionState();
            $temp->setId_subscription_state($result->id_subscription_state);
            $temp->setSubscription_state($result->subscription_state);
            $res[] = $temp;
        }
        return $res;
    }
    
    public function getSubscriptionStateById($id)
    {
        $req = sprintf("SELECT * FROM subscription_state WHERE id_subscription_state = %s", $id);
        $res = DB::select($req);
        
        if (count($res) > 0) {
            $result = $res[0];
            $temp = new SubscriptionState();
            $temp->setId_subscription_state($result->id_subscription_state);
            $temp->setSubscription_state($result->subscription_state);
            return $temp;
        }
        
        return null;
    }

    public function save(){
        $req = "INSERT INTO subscription_state(subscription_state) VALUES ('%s')";
        $subscription_state = $this->getSubscription_state();
        $req = sprintf($req,$subscription_state);
        DB::insert($req);
    }

    public function delete(){
        try{
            $req = "update subscription_state set status = 10 where id_subscription_state = %s";
            $subscription_state = $this->getId_subscription_state();
            $req = sprintf($req, $subscription_state);
            echo $req;
            DB::update($req);
        }catch(Exception $e){
            throw new Exception("Supression non valider");
        }
    }

    public function update(){
        $req = "update subscription_state set subscription_state='%s' where id_subscription_state = %s";
        $id_subscription_state = $this->getId_subscription_state();
        $subscription_state = $this->getSubscription_state();
        $req = sprintf($req,$subscription_state,$id_subscription_state);
        DB::update($req);
    }
}
