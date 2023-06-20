<?php

namespace App\Models\FOC\GestionClient;
use Illuminate\Support\Facades\DB;

class V_ClientCin
{
   public $id_client;
   public $first_name;
   public $last_name;
   public $phone_number;
   public $mail;
   public $address;
   public $birth_date;
   public $id_cin;
   public $cin_number;
   public $first_picture;
   public $second_picture;

    public function __construct($id_client, $first_name, $last_name, $phone_number, $mail, $address, $birth_date,$id_cin,$cin_number,$first_picture,$second_picture){
        $this->$id_client = $id_client;
        $this->$first_name =  $first_name;
        $this->$last_name = $last_name;
        $this->$phone_number = $phone_number;
        $this->$mail = $mail;
        $this->$address = $address;
        $this->$birth_date = $birth_date;
        $this->$id_cin = $id_cin;
        $this->$cin_number = $cin_number;
        $this->$first_picture = $first_picture;
        $this->$second_picture = $second_picture;
    }
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
        if($first_name == "" || $first_name == null) throw new \Exception("Nom ivalide ou vide");
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name = "")
    {
        $this->last_name = $last_name;
        if($last_name == "" || $last_name == null) throw new \Exception("Prenom ivalide ou vide");
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhone_number($phone_number = "")
    {
        $this->phone_number = $phone_number;
        if($phone_number == "" || $phone_number == null) throw new \Exception("Numero telephone ivalide ou vide");
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail = "")
    {
        $this->mail = $mail;
        if($mail == "" || $mail == null) throw new \Exception("Mail ivalide ou vide");
    }

    public function getAdress()
    {
        return $this->address;
    }
    
    public function setAddress($address = "")
    {
        $this->address = $address;
        if ($address == "" || $address == null) throw new \Exception("Adresse invalide ou vide");
    }

    public function getBirthDate()
    {
        return $this->birth_date;
    }

    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
        if($birth_date == "" || $birth_date == null) throw new \Exception("Date de naissance ivalide ou vide");
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function setPwd($pwd = "")
    {
        $this->pwd = $pwd;
        if($pwd == "" || $pwd == null) throw new \Exception("Mot de passe ivalide ou vide");
    }

    public function getStatus()
    {
        return $this->id_status;
    }

    public function setidStatus($status)
    {
        $this->id_status = $status;
        if($status == "" || $status == null) throw new \Exception("Status ivalide ou vide");
    }

    public function getSignUpDate()
    {
        return $this->sign_up_date;
    }

    public function getIdCin()
    {
        return $this->id_cin;
    }

    public function getCinNumber()
    {
        return $this->cin_number;
    }
    public function setCinNumber($cin_number = "")
    {
        $this->cin_number = $cin_number;
        if($cin_number == "" || $cin_number == null) throw new \Exception("id invalid");
    }

    public function getFirstPicture()
    {
        return $this->cin_number;
    }
    public function setFirstPicturer($first_picture = "")
    {
        $this->first_picture = $first_picture;
        if($first_picture == "" || $first_picture == null) throw new \Exception("le nom d'image ne doit pas etre vide ou null");
    }

    public function getSecondPicture()
    {
        return $this->second_picture;
    }
    public function setSecondPicture($second_picture = "")
    {
        $this->second_picture = $second_picture;
        if($second_picture == "" || $second_picture == null) throw new \Exception("le nom d'image ne doit pas etre vide ou null");

    }
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM cin');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new V_ClientCin($row->id_client, $row->first_name, $row->last_name, $row->phone_number, $row->mail, $row->address, $row->birth_date,$row->id_cin, $row->cin_number,$row->first_picture,$row->second_picture);
            $i++;
        }
        
        return $datas;
    }
    public static function findById($idCin)
    {
        $row = DB::table(DB::raw('v_ClientCin'))
        ->select(DB::raw('*'))
        ->where('id_cin', $idCin)
        ->limit(1)
        ->first();
   
        return new V_ClientCin($row->id_client, $row->first_name, $row->last_name, $row->phone_number, $row->mail, $row->address, $row->birth_date,$row->id_cin, $row->cin_number,$row->first_picture,$row->second_picture);
    }
}