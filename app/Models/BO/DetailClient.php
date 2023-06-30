<?php
namespace App\Models\BO;
use Exception;
use Illuminate\Support\Facades\DB;

class DetailClient
{
    private $id_client;
    private $first_name;
    private $last_name;
    private $phone_number;
    private $mail;
    private $adress;
    private $birth_date;
    private $sign_up_date;
    private $cin_number;
    private $first_picture;
    private $second_picture;
    private $nombre_terrains;

    public function getId_client() {
        return $this->id_client;
    }
    public function setId_client($value) {
        $this->id_client = $value;
    }

    public function getFirst_name() {
        return $this->first_name;
    }
    public function setFirst_name($value) {
        $this->first_name = $value;
    }

    public function getLast_name() {
        return $this->last_name;
    }
    public function setLast_name($value) {
        $this->last_name = $value;
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

    public function getAdress() {
        return $this->adress;
    }
    public function setAdress($value) {
        $this->adress = $value;
    }

    public function getBirth_date() {
        return $this->birth_date;
    }
    public function setBirth_date($value) {
        $this->birth_date = $value;
    }

    public function getSign_up_date() {
        return $this->sign_up_date;
    }
    public function setSign_up_date($value) {
        $this->sign_up_date = $value;
    }

    public function getCin_number() {
        return $this->cin_number;
    }
    public function setCin_number($value) {
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

    public function getNombre_terrains() {
        return $this->nombre_terrains;
    }
    public function setNombre_terrains($value) {
        $this->nombre_terrains = $value;
    }


    //client en attente
    public function getDetailClient($id_client){
        try{
            $detail = "select c.id_client, c.first_name, c.last_name, c.phone_number, c.mail, c.address, c.birth_date, c.sign_up_date, cin.cin_number, cin.first_picture, cin.second_picture
            from client c
            join cin on cin.id_cin = c.id_cin
            where c.id_client = ".$id_client;

            $details = DB::select($detail);
            
            if (count($details) > 0) {
                $result = $details[0];
                $temp = new DetailClient();
                $temp->setId_client($result->id_client);
                $temp->setFirst_name($result->first_name);
                $temp->setLast_name($result->last_name);
                $temp->setPhone_number($result->phone_number);
                $temp->setMail($result->mail);
                $temp->setAdress($result->address);
                $temp->setBirth_date($result->birth_date);
                $temp->setSign_up_date($result->sign_up_date);
                $temp->setCin_number($result->cin_number);
                $temp->setFirst_picture($result->first_picture);
                $temp->setSecond_picture($result->second_picture);
                return $temp;
            }
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public function getDetailClients(){
        try{
            $detail = "select c.id_client, c.first_name, c.last_name, c.phone_number, c.mail, c.address, c.birth_date, c.sign_up_date, cin.cin_number, cin.first_picture, cin.second_picture
            from client c
            join cin on cin.id_cin = c.id_cin 
            where c.id_status = 1
            group by c.id_client,cin.cin_number, cin.first_picture, cin.second_picture";

            $details = DB::select($detail);
            $res = array();
            
            if (count($details) > 0) {
                foreach ($details as $result) {
                    $temp = new DetailClient();
                    $temp->setId_client($result->id_client);
                    $temp->setFirst_name($result->first_name);
                    $temp->setLast_name($result->last_name);
                    $temp->setPhone_number($result->phone_number);
                    $temp->setMail($result->mail);
                    $temp->setAdress($result->address);
                    $temp->setBirth_date($result->birth_date);
                    $temp->setSign_up_date($result->sign_up_date);
                    $temp->setCin_number($result->cin_number);
                    $temp->setFirst_picture($result->first_picture);
                    $temp->setSecond_picture($result->second_picture);
                    $res[] = $temp;
                }
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public function getFieldOfClient($id_client){
        try{
            $detail = "select count(id_field) as nombre
            from field f
            where state = 1 and id_client = ".$id_client."
            group by id_client";
            $details = DB::select($detail);
            $res =null;
            
            if (count($details) > 0) {
                $result = $details[0];
                $temp = new DetailClient();
                $temp->setId_client($id_client);
                $temp->setNombre_terrains($result->nombre);
                $res = $temp;
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public function update_status($value, $id_client) {
        try{
            $requette = "update client set id_status = ".$value." where id_client = ".$id_client;
            DB::update($requette);
        } catch(Exception $e){
            throw new Exception("Impossible de modifier");
        }
    }
}