<?php

namespace App\Models\FOC\GestionClient;
use Illuminate\Support\Facades\DB;
use DateTime;
use Exception;
use App\Exceptions\ClientExceptionHandler;

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
    private $cin = null;
    private $customer_picture;

    public function __construct($id_client, $first_name, $last_name, $phone_number, $mail, $address, $birth_date, $pwd, $status, $sign_up_date, $cin ,$customer_picture)
    {
        $this->id_client = $id_client;
        $this->setFirstName($first_name);
        $this->setLastName($last_name);
        $this->setPhone_number($phone_number);
        $this->setMail($mail);
        $this->setAddress($address);
        $this->setBirthDate($birth_date);
        $this->setPwd($pwd);
        $this->setStatus($status);
        $this->sign_up_date = $sign_up_date;
        $this->cin = $cin->getIdCin();
        $this->setCustomerPicture($customer_picture);
    }

///Encapsulation
    public function getIdClient()
    {
        return $this->id_client;
    }

    public function getCustomerPicture()
    {
        return $this->customer_picture;
    }

    public function setCustomerPicture($customer_picture = "")
    {
        if($customer_picture == "" || $customer_picture == null) throw new \Exception("Nom d'image ivalide ou vide");
        $this->customer_picture = $customer_picture;
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
    public function getCIn()
    {
        return $this->cin;
    }
    
    public function setCin($Cin = null)
    {
        if ($Cin == null) throw new \Exception("Cin vide");
        $this->cin = $Cin;
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
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        if($status == null) throw new \Exception("Status ivalide ou vide");
    }

    public function getSignUpDate()
    {
        return $this->sign_up_date;
    }

    public static function lastClientId()
    {
        $result = DB::table('client')->orderBy('id_client', 'desc')->value('id_client');
    
        return $result ? $result : null;
    }

    public function updateCustomerPicture($id, $newPicture)
    {
        try {
            DB::table('client')
                ->where('id_cin', $id)
                ->update(['customer_picture' => $newPicture]);
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de la mise à jour de la photo du client : " . $e->getMessage());
        }
    }
       
    //Recuperer toutes les clients
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM client');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Client($row->id_client, $row->first_name, $row->last_name, $row->phone_number, $row->mail, $row->address, $row->birth_date, $row->pwd, Status::findById($row->id_status), $row->sign_up_date, Cin::findById($row->id_cin), $row->customer_picture);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer le client correspondant le id au parametre id
    public static function findByIdCin($idCin)
    {
        $results = DB::table('client')->where('id_cin', $idCin)->first();
        
        return new Client($results->id_client, $results->first_name, $results->last_name, $results->phone_number, $results->mail, $results->address, $results->birth_date, $results->pwd, Status::findById($results->id_status), $results->sign_up_date, Cin::findById($results->id_cin), $results->customer_picture);
    }

    //Sauvegarder un client dans la base
    public function create()
    {
        try {
            $birthDate = new DateTime($this->birth_date);
            $formattedBirthDate = $birthDate->format('Y-m-d');
            $req = "INSERT INTO client VALUES (DEFAULT, '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, DEFAULT, %d)";
            $req = sprintf($req, $this->first_name, $this->last_name, $this->phone_number, $this->mail, $this->address, $formattedBirthDate, $this->pwd, $this->status->getIdStatus(), $this->cin->getIdCin());
            $insertAdmin = "INSERT INTO admin_notification VALUEs (DEFAULT, 20, now(), 0)";
            DB::insert($req);
            DB::insert($insertAdmin);
            $lastAdminNotify = Client::getLastInsertAdminNotif();
            $insertClientAdhesion = "INSERT INTO client_adhesion_notification VALUES(".$lastAdminNotify->id_admin_notification.", ".$lastAdminNotify->id_client.")";
            DB::insert($insertClientAdhesion);
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de la création du client : " . $e->getMessage());
        }
    }

    //Avoir le dernier insertion dans admin_notification
    public static function getLastInsertAdminNotif() {
        $req = "SELECT * FROM admin_notification ORDER BY id_admin_notification DESC LIMIT 1";
        $result = DB::select($req);
        foreach ($result as $row) {
            return $row;
        }
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
            'id_status' => $this->status->getIdstatus(),
            'sign_up_date' => $this->sign_up_date,
            'id_cin' => $this->cin->getIdin()
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
        try {
            $req = "SELECT * FROM client WHERE pwd = '%s' AND mail = '%s'";
            $req = sprintf($req,$pwd,$mail);
            $results = DB::select($req);
            $i = 0;
            if($results) {
                foreach ($results as $row) {
                    return new Client($row->id_client, $row->first_name, $row->last_name, $row->phone_number, $row->mail, $row->address, $row->birth_date, $row->pwd, Status::findById($row->id_status), $row->sign_up_date, Cin::findById($row->id_cin), $row->customer_picture);
                }
            }
            throw new Exception("Veuillez ressayer");
                
        } catch(Exception $e) {
        }
    }

    //Recuperer le cin correspondant le id au parametre id
    public static function findById($id)
    {
        $results = DB::table('client')->where('id_client', $id)->first();
    
        return new Client($results->id_client, $results->first_name, $results->last_name, $results->phone_number, $results->mail, $results->address, $results->birth_date, $results->pwd, Status::findById($results->id_status), $results->sign_up_date, Cin::findById($results->id_cin),  $results->customer_picture);
    }  
}