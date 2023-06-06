<?php

namespace App\Models\FOC\GestionClient;
use Illuminate\Support\Facades\DB;

class Client
{
    private $id_client;
    private $first_name;
    private $last_name;
    private $phone_number;
    private $mail;
    private $address;
    private $birth_date;
    private $pwd;
    private $status;
    private $sign_up_date;
    private $cin;

    public function __construct($id_client, $first_name, $last_name, $phone_number, $mail, $address, $birth_date, $pwd, $status, $sign_up_date, $cin)
    {
        $this->id_client = $id_client;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
        $this->mail = $mail;
        $this->address = $address;
        $this->birth_date = $birth_date;
        $this->pwd = $pwd;
        $this->status = $status;
        $this->sign_up_date = $sign_up_date;
        $this->cin = $cin;
    }

///Encapsulation
    public function getIdClient()
    {
        return $this->id_client;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name = "")
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name = "")
    {
        $this->last_name = $last_name;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhone_number($phone_number = "")
    {
        $this->phone_number = $phone_number;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail = "")
    {
        $this->mail = $mail;
    }

    public function getAdress()
    {
        return $this->address;
    }

    public function setAdress($adress = "")
    {
        $this->address = $adress;
    }

    public function getBirhDate()
    {
        return $this->birth_date;
    }

    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function setPwd($pwd = "")
    {
        $this->pwd = $pwd;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getSignUpDate()
    {
        return $this->address;
    }

    public function getCin()
    {
        return $this->cin;
    }

    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    //Recuperer toutes les clients
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM client');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Client($row->id_client, $row->first_name, $row->last_name, $row->phone_number, $row->mail, $row->address, $row->birth_date, $row->pwd, $row->status, $row->sign_up_date, $row->cin);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer le client correspondant le id au parametre id
    public static function findById($id)
    {
        $results = DB::table('client')->where('id_client', $id)->first();
        
        return  new Client($results->id_client, $results->first_name, $results->last_name, $results->phone_number, $results->mail, $results->address, $results->birth_date, $results->pwd, $results->status, $results->sign_up_date, $results->cin);
    }

    //Sauvegarder un client dans la base
    public function create()
    {
        $req = "INSERT INTO client VALUES ( default, '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, '%s', %d)";
        $req = sprintf($req,$this->first_name,$this->last_name,$this->phone_number,$this->mail,$this->adress,$this->birth_date,$this->pwd,$this->status->id_status,$this->sign_up_date,$this->cin->id_cin);
        //echo $req;  
        DB::insert($req);
    }

    //Mettre a jour un client
    public function update()
    {
        DB::table('client')
        ->where('id_client', $this->id_client)
        ->update([
            'first_name' => $this->first_name, 
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number, 
            'mail' => $this->mail, 
            'adress' => $this->address, 
            'birth_date' => $this->birth_date, 
            'pwd' => $this->pwd,
            'id_status' => $this->status->id_status,
            'sign_up_date' => $this->sign_up_date,
            'sign_up_date' => $this->cin->id_cin
        ]);
    }

    //Supprimer un client par son id
    public function delete()
    {
        DB::table('customer')
        ->where('id_client', $this->id_client)
        ->delete();
    }

    public static function login($pwd, $mail) 
    {
        $req = "SELECT * FROM client WHERE pwd = '%s' AND mail = '%s'";
        $req = sprintf($req,$pwd,$mail);
        $results = DB::select($req);
        $i = 0;
        if($results) {
            foreach ($results as $row) {
                return new Client($row->id_client, $row->first_name, $row->last_name, $row->phone_number, $row->mail, $row->address, $row->birth_date, $row->pwd, $row->id_status, $row->sign_up_date, $row->id_cin);
            }    
        }
        
        return null;
        //throw Exception("Customer not found");
    }
    
}