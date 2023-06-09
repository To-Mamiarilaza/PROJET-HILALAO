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

    public function __construct(){
        $this->$id_client = null;
        $this->$first_name =  null;
        $this->$last_name = null;
        $this->$phone_number = null;
        $this->$mail = null;
        $this->$address = null;
        $this->$birth_date = null;
        $this->$id_cin = null;
        $this->$cin_number = null;
        $this->$first_picture = null;
        $this->$second_picture = null;
    }

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
        $results = DB::table('v_ClientCin')->where('id_cin', $idCin)->first();
   
        return new V_ClientCin($row->id_client, $row->first_name, $row->last_name, $row->phone_number, $row->mail, $row->address, $row->birth_date,$row->id_cin, $row->cin_number,$row->first_picture,$row->second_picture);
    }
}