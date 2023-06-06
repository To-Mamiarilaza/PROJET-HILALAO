<?php

namespace App\Models\FOC\GestionClient;
use Illuminate\Support\Facades\DB;

class Customer
{
    private $id_customer;
    private $name;
    private $number_card;
    private $profile_picture;
    private $adress;
    private $phone_numbers;
    private $email;
    private $password;

    public function __construct($id_customer, $name, $number_card, $profile_picture, $adress, $phone_numbers, $email, $password)
    {
        $this->id_customer = $id_customer;
        $this->name = $name;
        $this->number_card = $number_card;
        $this->profile_picture = $profile_picture;
        $this->adress = $adress;
        $this->phone_numbers = $phone_numbers;
        $this->email = $email;
        $this->password = $password;
    }

///Encapsulation
    public function getId_customer()
    {
        return $this->id_customer;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCustomer_id_card()
    {
        return $this->number_card;
    }

    public function getProfile_picture()
    {
        return $this->profile_picture;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function getPhone_numbers()
    {
        return $this->phone_numbers;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    //Recuperer toutes les clients
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM customer');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Customer($row->id_customer, $row->name, $row->getCustomer_id_card, $row->profile_picture, $row->adress, $row->phone_numbers, $row->email, $row->password);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer le client correspondant le id au parametre id
    public static function findById($id)
    {
        $results = DB::table('customer')->where('id_customer', $id)->first();
        
        return new Customer($results->id_customer,$results->name, $results->number_card, $results->profile_picture, $results->adress, $results->phone_numbers, $results->email, $results->password);
    }

    //Sauvegarder un client dans la base
    public function create()
    {
        $req = "INSERT INTO customer VALUES ( default, '%s', '%s', '%s', '%s', '%s', '%s', '%s')";
        $req = sprintf($req,$this->name,$this->number_card,$this->profile_picture,$this->adress,$this->phone_numbers,$this->email,$this->password);
        //echo $req;
        DB::insert($req);
    }

    //Mettre a jour un client
    public function update()
    {
        DB::table('customer')
        ->where('id_customer', $this->id_customer)
        ->update([
            'name' => $this->name, 
            'number_card' => $this->number_card, 
            'profile_picture' => $this->profile_picture, 
            'adress' => $this->adress,
            'phone_numbers' => $this->phone_numbers,
            'email' => $this->email,
            'password' => $this->password
        ]);
    }

    //Supprimer un client par son id
    public function delete()
    {
        DB::table('customer')
        ->where('id_customer', $this->id_customer)
        ->delete();
    }

    public static function login($password, $email) 
    {
        $req = "SELECT * FROM customer WHERE password = '%s' AND email = '%s'";
        $req = sprintf($req,$password,$email);
        $results = DB::select($req);
        $i = 0;
        if($results) {
            foreach ($results as $row) {
                return new Customer($row->id_customer,$row->name, $row->number_card, $row->profile_picture, $row->adress, $row->phone_numbers, $row->email, $row->password);
            }    
        }
        
        return null;
        //throw Exception("Customer not found");
    }
    
}