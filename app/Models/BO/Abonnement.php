<?php
namespace App\Models\BO;
use Exception;
use Illuminate\Support\Facades\DB;

class Abonnement
{
    public $name;
    public $category;
    public $client;
    public $price;
    public $start_date;
    public $end_date;
    public $duration;

    public function getName() {
        return $this->name;
    }
    public function setName($value) {
        $this->name = $value;
    }

    public function getCategory() {
        return $this->category;
    }
    public function setCategory($value) {
        $this->category = $value;
    }

    public function getClient() {
        return $this->client;
    }
    public function setClient($value) {
        $this->client = $value;
    }

    public function getPrice() {
        return $this->price;
    }
    public function setPrice($value) {
        $this->price = $value;
    }

    public function getStart_date() {
        return $this->start_date;
    }
    public function setStart_date($value) {
        $this->start_date = $value;
    }

    public function getEnd_date() {
        return $this->end_date;
    }
    public function setEnd_date($value) {
        $this->end_date = $value;
    }

    public function getDuration() {
        return $this->duration;
    }
    public function setDuration($value) {
        $this->duration = $value;
    }

    public function getAllAbonnenent(){
        try{
            $abonnement = DB::select("select f.name, c.category, cl.first_name as client, c.subscribing_price as price,  start_date, start_date + INTERVAL '1 month' * duration AS end_date, duration
            from field f
            join category c on c.id_category = f.id_category
            join client cl on cl.id_client = f.id_client
            join subscription s on s.id_field = f.id_field
            join subscription_state ss on ss.id_subscription_state = s.id_subscription_state");
            $res = array();
            foreach ($abonnement as $result) {
                $temp = new Abonnement();
                $temp->setName($result->name);
                $temp->setCategory($result->category);
                $temp->setClient($result->client);
                $temp->setPrice($result->price);
                $temp->setStart_date($result->start_date);
                $temp->setEnd_date($result->end_date);
                $temp->setDuration($result->duration);
                $res[] = $temp;
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public function getAbonnementSort($selectedCategorie, $selectedMonth, $selectedYear, $selectedPayed){
        try{
            $res = array();
            if($selectedPayed != "paid"){
                if($selectedMonth != 00){
                    $date = mktime(0, 0, 0, $selectedMonth, 0, $selectedYear);
                    $date_formatee = date('Y-m-d', $date);

                    $date2 = mktime(0, 0, 0, $selectedMonth + 1, 0, $selectedYear);
                    $date_formatee2 = date('Y-m-d', $date2);

                    $requette = "SELECT f.name, c.category, cl.first_name AS client, c.subscribing_price AS price
                    FROM field f
                    JOIN category c ON c.id_category = f.id_category
                    JOIN client cl ON cl.id_client = f.id_client
                    LEFT JOIN subscription s ON f.id_field = s.id_field 
                        AND EXTRACT(YEAR FROM s.start_date) =" .$selectedYear.
                        "AND EXTRACT(MONTH FROM s.start_date) = ".$selectedMonth.
                    "WHERE s.id_field IS NULL";
                }
                $abonnement = DB::select($requette);
                
                foreach ($abonnement as $result) {
                    $temp = new Abonnement();
                    $temp->setName($result->name);
                    $temp->setCategory($result->category);
                    $temp->setClient($result->client);
                    $temp->setPrice($result->price);
                    $temp->setStart_date($date_formatee);
                    $temp->setEnd_date($date_formatee2);
                    $temp->setDuration(1);
                    $res[] = $temp;
                }
                return $res;
            }else{
                $requette = "select f.name, c.category, cl.first_name as client, c.subscribing_price as price,  start_date, duration, start_date + INTERVAL '1 month' * duration AS end_date 
                from field f
                join category c on c.id_category = f.id_category
                join client cl on cl.id_client = f.id_client
                join subscription s on s.id_field = f.id_field
                join subscription_state ss on ss.id_subscription_state = s.id_subscription_state
                where EXTRACT(YEAR FROM start_date) = ".$selectedYear;
                
                if($selectedMonth != 00){
                    $requette .="and EXTRACT(MONTH FROM start_date) = ".$selectedMonth;
                    
                }

                if($selectedCategorie != "all"){
                    $requette .="and c.category = '".$selectedCategorie."'";
                }
                $abonnement = DB::select($requette);
            }
                foreach ($abonnement as $result) {
                    $temp = new Abonnement();
                    $temp->setName($result->name);
                    $temp->setCategory($result->category);
                    $temp->setClient($result->client);
                    $temp->setPrice($result->price);
                    $temp->setStart_date($result->start_date);
                    $temp->setEnd_date($result->end_date);
                    $temp->setDuration($result->duration);
                    $res[] = $temp;
                }
            return $res;

        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }
}
?>