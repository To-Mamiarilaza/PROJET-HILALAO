<?php

namespace App\Models\BO;
use Exception;
use Illuminate\Support\Facades\DB;

class Statistique
{
    public $nb;
    public $month;
    public $date;

    public function getNb()
    {
        return $this->nb;
    }
    public function setNb($value)
    {
        $this->nb = $value;
    }

    public function getMonth()
    {
        return $this->month;
    }
    public function setMonth($value)
    {
        $this->month = $value;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function setDate($value)
    {
        $this->date = $value;
    }

    public function __construct()
    {

    }

    public static function getDataClientsMonth($mois,$annee)
    {
        try{
            $req= "SELECT COUNT(id_client) AS nb, sign_up_date 
            FROM client
            WHERE EXTRACT(MONTH FROM sign_up_date) = %s
            AND EXTRACT(YEAR FROM sign_up_date) = %s
            GROUP BY sign_up_date
            ORDER BY sign_up_date;";
            $req = sprintf($req,$mois,$annee);
            
            $category = DB::select($req);
            $res = array();
            foreach ($category as $result) {
                $statique = new Statistique();
                $statique->setNb($result->nb);
                $statique->setDate($result->sign_up_date);
                $res[] = $statique;
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public static function getDataClientsYear($annee)
    {
        try{
           
            $req = "SELECT EXTRACT(MONTH FROM sign_up_date) AS month,
            COUNT(id_client) AS nb_clients
            FROM client
            WHERE EXTRACT(YEAR FROM sign_up_date) = %s
            GROUP BY EXTRACT(MONTH FROM sign_up_date)
            ORDER BY EXTRACT(MONTH FROM sign_up_date)";
            $req = sprintf($req,$annee);
            $category = DB::select($req);
            $res = array();
            foreach ($category as $result) {
                $statique = new Statistique();
                $statique->setNb($result->nb_clients);
                $statique->setMonth($result->month);
                // $statique->setDate($result->sign_up_date);
                $res[] = $statique;
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public static function getDataUsersMonth($mois,$annee)
    {
        try{
            $req= "SELECT COUNT(id_users) AS nb, sign_up_date 
            FROM users
            WHERE EXTRACT(MONTH FROM sign_up_date) = %s
            AND EXTRACT(YEAR FROM sign_up_date) = %s
            GROUP BY sign_up_date
            ORDER BY sign_up_date;";
            $req = sprintf($req,$mois,$annee);
            $category = DB::select($req);
            $res = array();
            foreach ($category as $result) {
                $statique = new Statistique();
                $statique->setNb($result->nb);
                $statique->setDate($result->sign_up_date);
                $res[] = $statique;
            }
            return $res;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public static function getDataUsersYear($annee)
    {
        try {
            $req = "SELECT EXTRACT(MONTH FROM sign_up_date) AS month,
            COUNT(id_users) AS nb_users
            FROM users
            WHERE EXTRACT(YEAR FROM sign_up_date) = %s
            GROUP BY EXTRACT(MONTH FROM sign_up_date)
            ORDER BY EXTRACT(MONTH FROM sign_up_date)";
            $req = sprintf($req, $annee);
            $category = DB::select($req);
            $res=[];
            foreach ($category as $result) {
                $statique = new Statistique();
                $statique->setNb($result->nb_users);
                $statique->setMonth($result->month);
                // $statique->setDate($result->sign_up_date);
                $res[] = $statique;
            }
            return $res;
        } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir les données");
        }
    }

    public static function getDataTerrainsMonth($mois,$annee)
    {
        try{
            $req= "SELECT COUNT(id_field) AS nb, insert_date 
            FROM field
            WHERE EXTRACT(MONTH FROM insert_date) = %s
            AND EXTRACT(YEAR FROM insert_date) = %s
            GROUP BY insert_date
            ORDER BY insert_date;";
            $req = sprintf($req,$mois,$annee);
            $category = DB::select($req);
            $res = array();
            foreach ($category as $result) {
                $statique = new Statistique();
                $statique->setNb($result->nb);
                $statique->setDate($result->insert_date);
                $res[] = $statique;
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public static function getDataTerrainsYear($annee)
    {
        try {
            $req = "SELECT EXTRACT(MONTH FROM insert_date) AS month,
            COUNT(id_field) AS nb_field
            FROM field
            WHERE EXTRACT(YEAR FROM insert_date) = %s
            GROUP BY EXTRACT(MONTH FROM insert_date)
            ORDER BY EXTRACT(MONTH FROM insert_date) ";
            $req = sprintf($req, $annee);
            $category = DB::select($req);
            $res=[];
            foreach ($category as $result) {
                $statique = new Statistique();
                $statique->setNb($result->nb_field);
                $statique->setMonth($result->month);
                // $statique->setDate($result->sign_up_date);
                $res[] = $statique;
            }
            return $res;
        } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir les données");
        }
    }

    public static function getDonneeNb($database)
    {
        $res=[];
        $month = 1;
        $jour = 1;
        if(count($database)>0){
            
        }
        for($k=0; $k<count($database); $k++){
            if($database[$k]->getMonth() !=null){
                for($i = 0;$i<$database[$k]->getMonth()-$month; $i++){
                    $res = [...$res,0];
                }
                $res = [...$res,$database[$k]->getNb()];
                if($k == count($database)-1){
                    for($i = 0;$i<12-$database[$k]->getMonth(); $i++){
                        $res = [...$res,0];
                    }
                }
                $month = count($res)+ 1;
            }else{
                $j = date("d", strtotime($database[$k]->getDate()));
                for($i = 0;$i<$j-$jour; $i++){
                    $res = [...$res,0];
                }
                $res = [...$res,$database[$k]->getNb()];
                if($k == count($database)-1){
                    for($i = 0;$i<31-$j; $i++){
                        $res = [...$res,0];
                    }
                }
                $jour = count($res)+ 1;
            }
            
        }
        return $res;
    }
}
