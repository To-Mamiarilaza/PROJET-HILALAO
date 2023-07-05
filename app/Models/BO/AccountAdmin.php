<?php

namespace App\Models\BO;

use Exception;
use Illuminate\Support\Facades\DB;

class AccountAdmin
{   
    protected $id_account_admin;
    protected $first_name;
    protected $last_name;
    protected $mail;
    protected $phone_number;
    protected $pwd;


    // Getter pour l'attribut 'id_account_admin'
    public function getId_account_admin()
    {
        return $this->id_account_admin;
    }

    // Setter pour l'attribut 'Id_account_admin'
    public function setId_account_admin($value)
    {
        $this->id_account_admin = $value;
    }

    // Getter pour l'attribut 'pwd'
    public function getPwd()
    {
        return $this->pwd;
    }

    // Setter pour l'attribut 'pwd'
    public function setPwd($value)
    {
        $this->pwd = $value;
    }

    // Getter pour l'attribut 'mail'
    public function getMail()
    {
        return $this->mail;
    }

    // Setter pour l'attribut 'mail'
    public function setMail($value)
    {
        $this->mail = $value;
    }

    // Getter pour l'attribut 'first_name'
    public function getFirst_name()
    {
        return $this->first_name;
    }

    // Setter pour l'attribut 'first_name'
    public function setFirst_name($value)
    {
        $this->first_name = $value;
    }

    public function getLast_name()
    {
        return $this->last_name;
    }

    // Setter pour l'attribut 'name'
    public function setLast_name($value)
    {
        $this->last_name = $value;
    }

    // Getter pour l'attribut 'telephone_number'
    public function getPhone_number()
    {
        // Ajouter une logique personnalisée si nécessaire
        return $this->phone_number;
    }

    // Setter pour l'attribut 'telephone_number'
    public function setPhone_number($value)
    {
        // Ajouter une logique personnalisée si nécessaire
        $this->phone_number = $value;
    }

    public function __construct()
    {
    }

    public function getAllAccountAdmin()
    {
        $category = DB::select('SELECT * FROM account_admin ');
        $res = array();
        foreach ($category as $result) {
            $temp = new AccountAdmin();
            $temp->setId_account_admin($result->id_account_admin);
            $temp->setMail($result->mail);
            $temp->setPwd($result->pwd);
            $temp->setFirst_name($result->first_name);
            $temp->setLast_name($result->last_name);
            $temp->setPhone_number($result->phone_number);
            $res[] = $temp;
        }
        return $res;
    }


    public function getAccountAdminConnected($mail, $pwd)
    {
        $req = "SELECT * FROM account_admin WHERE mail = '%s' AND pwd = '%s'";
        $req = sprintf($req, $mail, $pwd);
        $account = DB::select($req);
        if (count($account) > 0) {
            $result = $account[0];
            $temp = new AccountAdmin();
            $temp->setId_account_admin($result->id_account_admin);
            $temp->setMail($result->mail);
            $temp->setPwd($result->pwd);
            $temp->setFirst_name($result->first_name);
            $temp->setLast_name($result->last_name);
            $temp->setPhone_number($result->phone_number);
            return $temp;
        }else{
            throw new \Exception("Adresse e-mail ou mot de passe incorrect.");
        }
    }

    public function save() {
        try{
            $req = "INSERT INTO account_admin(first_name,last_name,mail,phone_number,pwd) VALUES ('%s','%s','%s','%s','%s')";
            $mail = $this->getMail();
            $pwd = $this->getPwd();
            $last_name = $this->getLast_name() ;
            $first_name = $this->getFirst_name() ;
            $phone_number = $this->getPhone_number() ;
            $req = sprintf($req,$first_name,$last_name,$mail,$phone_number,$pwd);
            // echo $req;
            DB::insert($req);
        }catch(Exception $e){
            throw new Exception("Veuillez ressayer");
        }
        
    }
}
