<?php

namespace App\Models\BO;
use Exception;
use Illuminate\Support\Facades\DB;

class Statistique
{
    public static function countClientsDay($mois,$annee)
    {
        try{
            $req = "SELECT COUNT(id_client) AS nb, DATE_TRUNC('day', sign_up_date) AS day"+
            "FROM client"+
            "WHERE sign_up_date >= DATE_TRUNC('month', DATE '2023-04-12') " + //-- début du mois actuel
              "AND sign_up_date < DATE_TRUNC('month', DATE '2023-04-12') + INTERVAL '1 month'" +//-- début du mois suivant
              "AND sign_up_date >= DATE '2023-04-12' - INTERVAL '2 days' "+//-- période de deux jours
           " GROUP BY day"+
            "ORDER BY day;";
            $req = sprintf($req,$mois,$annee);
            $category = DB::select($req);
            $res = array();
            foreach ($category as $result) {
                $res[] = ['nb' => $result->nb,'date'=>$result->day];
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public static function countClientsMonth($annee)
    {
        try {
            $req = "SELECT EXTRACT(MONTH FROM sign_up_date) AS month,
                COUNT(id_client) AS nb_clients
                FROM client
                WHERE EXTRACT(YEAR FROM sign_up_date) = %s
                GROUP BY EXTRACT(MONTH FROM sign_up_date)
                ORDER BY EXTRACT(MONTH FROM sign_up_date)";
            $req = sprintf($req, $annee);
            $category = DB::select($req);
            $res = array();
            foreach ($category as $result) {
                $res[] = ['nb' => $result->nb_clients, 'date' => $result->month];
            }
            return $res;
        } catch (Exception $e) {
            throw new Exception("Impossible d'obtenir les données");
        }
    }

    // public function getCategoryById($id)
    // {
    //     try{
    //         $req = sprintf("SELECT * FROM category WHERE id_category = %s", $id);
    //         $category = DB::select($req);
            
    //         if (count($category) > 0) {
    //             $result = $category[0];
    //             $temp = new Category();
    //             $temp->setId_category($result->id_category);
    //             $temp->setCategory($result->category);
    //             $temp->setSubscribing_price($result->subscribing_price);
    //             return $temp;
    //         }

    //     }catch(Exception $e){
    //         throw new Exception("Cette categorie n'existe meme pas");
    //     }
        
    // }


    // public function save(){
    //     try{
    //         $req = "INSERT INTO category(category,subscribing_price) VALUES ('%s',%s)";
    //         $category = $this->category;
    //         $subscribing_price = $this->subscribing_price;
    //         $req = sprintf($req,$category,$subscribing_price);
    //         DB::insert($req);

    //     }catch(Exception $e){
    //         throw new Exception("Impossible d'inserer la categorie");
    //     }
    // }

    // public function update(){
    //     try{
    //         $req = "update category set category='%s' , subscribing_price =%s  where id_category = %s ";
    //         $id_category = $this->id_category;
    //         $category = $this->category;
    //         $subscribing_price = $this->subscribing_price;
    //         $req = sprintf($req,$category,$subscribing_price,$id_category);
    //         print($req);
    //         DB::update($req);
    //     }catch(Exception $e){
    //         throw new Exception("Veuillez ressayer");
    //     }
    // }
}
