<?php
namespace App\Models\BO;
use Exception;
use Illuminate\Support\Facades\DB;

class DetailTerrain
{
    private $first_name;
    private $last_name;
    private $name;
    private $phone_number;
    private $mail;
    private $adress;
    private $insert_date;
    private $category;
    private $id_terrain;
    private $id_client;
    private $description;
    private $months;
    private $picture;
    private $cin_number;
    private $first_picture;
    private $second_picture;
    private $sign_up_date;
    private $field_files;

    public function getFirst_name() {
        return $this->first_name;
    }
    public function setFirst_name($value) {
        $this->first_name = $value;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($value) {
        $this->description = $value;
    }

    public function getId_terrain() {
        return $this->id_terrain;
    }
    public function setId_terrain($value) {
        $this->id_terrain = $value;
    }

    public function getId_client() {
        return $this->id_client;
    }
    public function setId_client($value) {
        $this->id_client = $value;
    }

    public function getLast_name() {
        return $this->last_name;
    }
    public function setLast_name($value) {
        $this->last_name = $value;
    }

    public function getField_files() {
        return $this->field_files;
    }
    public function setField_files($value) {
        $this->field_files = $value;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($value) {
        $this->name = $value;
    }

    public function getPhone_number() {
        return $this->phone_number;
    }
    public function setPhone_number($value) {
        $this->phone_number = $value;
    }

    public function getMail() {
        return $this->mail;
    }
    public function setMail($value) {
        $this->mail = $value;
    }

    public function getMonths() {
        return $this->months;
    }
    public function setMonths($value) {
        $this->months = $value;
    }

    public function getAdress() {
        return $this->adress;
    }
    public function setAdress($value) {
        $this->adress = $value;
    }

    public function getInsert_date() {
        return $this->insert_date;
    }
    public function setInsert_date($value) {
        $this->insert_date = $value;
    }

    public function getCategory() {
        return $this->category;
    }
    public function setCategory($value) {
        $this->category = $value;
    }

    public function getPicture() {
        return $this->picture;
    }
    public function setPicture($value) {
        $this->picture = $value;
    }
    
    public function getCin() {
        return $this->cin_number;
    }
    public function setCin($value) {
        $this->cin_number = $value;
    }

    public function getFirst_picture() {
        return $this->first_picture;
    }
    public function setFirst_picture($value) {
        $this->first_picture = $value;
    }

    public function getSecond_picture() {
        return $this->second_picture;
    }
    public function setSecond_picture($value) {
        $this->second_picture = $value;
    }

    public function getSign() {
        return $this->sign_up_date;
    }
    public function setSign($value) {
        $this->sign_up_date = $value;
    }
    //terrain en attente

    public function getMonthTerrain($id_terrain,$year){
        try{
            $detail = "SELECT
            f.id_field,
            EXTRACT(MONTH FROM DATE_TRUNC('month', generate_series(s.start_date, s.start_date + (s.duration || ' month')::interval - 
            INTERVAL '1 day', '1 month'))) AS month
            FROM
                field f
                JOIN category c ON c.id_category = f.id_category
                JOIN subscription s ON s.id_field = f.id_field
            WHERE
                EXTRACT(YEAR FROM s.start_date) = ".$year." and
                f.id_field = ".$id_terrain."
            GROUP BY
                f.id_field,
                EXTRACT(MONTH FROM DATE_TRUNC('month', generate_series(s.start_date, s.start_date + (s.duration || ' month')::interval - 
                INTERVAL '1 day', '1 month')))
            ORDER BY
                f.id_field ASC,
                month ASC;";
            $months = array();
            $details = DB::select($detail);
            if (count($details) > 0) {
                foreach ($details as $result) {
                    $months[] = $result->month;
                }
            }
        
            $temp = new DetailTerrain();
            $temp->setId_terrain($result->id_field);
            $temp->setMonths($months);
            return $temp;
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    public function getDetailTerrain($id_terrain){
        try{
            $detail = "select f.id_client, f.id_field, c.first_name, c.last_name, c.phone_number, c.mail, f.address, f.name , f.insert_date, 
            cat.category,f.insert_date,f.description,f.field_files
            from field f
            join client c on c.id_client = f.id_client
            join category cat on cat.id_category = f.id_category
            where f.id_field = ".$id_terrain;

            $details = DB::select($detail);
            
            if (count($details) > 0) {
                $result = $details[0];
                $temp = new DetailTerrain();
                $temp->setFirst_name($result->first_name);
                $temp->setLast_name($result->last_name);
                $temp->setPhone_number($result->phone_number);
                $temp->setMail($result->mail);
                $temp->setAdress($result->address);
                $temp->setInsert_date($result->insert_date);
                $temp->setName($result->name);
                $temp->setCategory($result->category);
                $temp->setId_client($result->id_client);
                $temp->setId_terrain($result->id_field);
                $temp->setDescription($result->description);
                $temp->setField_files($result->field_files);
                return $temp;
            }
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    public function getDetailTerrains(){
        try{
            $detail = "select f.id_field,c.first_name, c.last_name, c.phone_number, c.mail, f.address,f.name , f.insert_date, 
            cat.category,f.insert_date,f.description
            from field f
            join client c on c.id_client = f.id_client
            join category cat on cat.id_category = f.id_category 
            where f.state = 2";

            $details = DB::select($detail);
            $res = array();
            
            if (count($details) > 0) {
                foreach ($details as $result) {
                    $temp = new DetailTerrain();
                    $temp->setFirst_name($result->first_name);
                    $temp->setLast_name($result->last_name);
                    $temp->setPhone_number($result->phone_number);
                    $temp->setMail($result->mail);
                    $temp->setAdress($result->address);
                    $temp->setInsert_date($result->insert_date);
                    $temp->setName($result->name);
                    $temp->setCategory($result->category);
                    $temp->setId_terrain($result->id_field);
                    $temp->setDescription($result->description);
                    $res[] = $temp;
                }
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public function getAllField(){
        try{
            $detail = "select f.id_field,c.first_name, c.last_name, c.phone_number, c.mail, f.address,f.name , f.insert_date, 
            cat.category,f.insert_date,f.description
            from field f
            join client c on c.id_client = f.id_client
            join category cat on cat.id_category = f.id_category 
            where f.state = 1";

            $details = DB::select($detail);
            $res = array();
            
            if (count($details) > 0) {
                foreach ($details as $result) {
                    $temp = new DetailTerrain();
                    $temp->setFirst_name($result->first_name);
                    $temp->setLast_name($result->last_name);
                    $temp->setPhone_number($result->phone_number);
                    $temp->setMail($result->mail);
                    $temp->setAdress($result->address);
                    $temp->setInsert_date($result->insert_date);
                    $temp->setName($result->name);
                    $temp->setCategory($result->category);
                    $temp->setId_terrain($result->id_field);
                    $temp->setDescription($result->description);
                    $res[] = $temp;
                }
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }
    public function update_status($value, $id_terrain) {
        try{
            $requette = "update field set state = ".$value." where id_field = ".$id_terrain;
            DB::update($requette);
        } catch(Exception $e){
            $e->getMessage();
        }
    }

    public function findByClient($id_client) {
        try{
            $requette = "SELECT name,category, p.picture, f.id_field,
            insert_date
            from field f
            join picture p on p.id_field = f.id_field
            join category c on f.id_category = c.id_category 
            where f.state = 1 and f.id_client = ".$id_client;

            $field = DB::select($requette);
            $res = array();

            if(count($field) > 0){
                foreach($field as $result){
                    $temp = new DetailTerrain();
                    $temp->setName($result->name);
                    $temp->setCategory($result->category);
                    $temp->setPicture($result->picture);
                    $temp->setInsert_date($result->insert_date);
                    $temp->setId_terrain($result->id_field);
                    $res[] = $temp;
                }
            }
            return $res;
        } catch(Exception $e){
            $e->getMessage();
        }
    }
}