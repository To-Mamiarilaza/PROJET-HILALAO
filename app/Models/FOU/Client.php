<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use App\Models\FOU\CIN;
use Illuminate\Database\Eloquent\Model;

class Client {
    private $id_client;
    private $first_name;
    private $last_name;
    private $phone_number;
    private $mail;
    private $address;
    private $birth_date;
    private $pwd;
    private $id_status;
    private $status;
    private $sign_up_date;
    private $CIN;

    public static function findById($id) {
        $sql = "SELECT id_client, first_name, last_name, phone_number, mail, address, birth_date, pwd, id_status, status, sign_up_date, id_cin FROM v_client_detailled WHERE id_client=%s";
        $sql = sprintf($sql, $id);
        $client_db = DB::select($sql);
        $client = new Client();
        if (count($client_db) != 0) {
            $client->setIdClient($client_db[0]->id_client);
            $client->setFirstName($client_db[0]->first_name);
            $client->setLastName($client_db[0]->last_name);
            $client->setPhoneNumber($client_db[0]->phone_number);
            $client->setMail($client_db[0]->mail);
            $client->setAddress($client_db[0]->address);
            $client->setBirthDate($client_db[0]->birth_date);
            $client->setPwd($client_db[0]->pwd);
            $client->setIdStatus($client_db[0]->id_status);
            $client->setStatus($client_db[0]->status);
            $client->setSignUpDate($client_db[0]->sign_up_date);
            $client->setCIN(CIN::findById($client_db[0]->id_cin));
        }
    }

    public function getIdClient() {
        return $this->id_client;
    }
    public function setIdClient($values) {
        $this->id_client = $values;
    }
    public function getFirstName() {
        return $this->first_name;
    }
    public function setFirstName($values) {
        $this->first_name = $values;
    }
    public function getLastName() {
        return $this->last_name;
    }
    public function setLastName($values) {
        $this->last_name = $values;
    }
    public function getPhoneNumber() {
        return $this->phone_number;
    }
    public function setPhoneNumber($values) {
        $this->phone_number = $values;
    }
    public function getMail() {
        return $this->mail;
    }
    public function setMail($values) {
        $this->mail = $values;
    }
    public function getAddress() {
        return $this->address;
    }
    public function setAddress($values) {
        $this->address = $values;
    }
    public function getBirthDate() {
        return $this->birth_date;
    }
    public function setBirthDate($values) {
        $this->birth_date = $values;
    }
    public function getPwd() {
        return $this->pwd;
    }
    public function setPwd($values) {
        $this->pwd = $values;
    }
    public function getIdStatus() {
        return $this->id_status;
    }
    public function setIdStatus($values) {
        $this->id_status = $values;
    }
    public function getStatus() {
        return $this->status;
    }
    public function setStatus($values) {
        $this->status = $values;
    }
    public function getSignUpDate() {
        return $this->sign_up_date;
    }
    public function setSignUpDate($values) {
        $this->sign_up_date = $values;
    }
    public function getCIN() {
        return $this->CIN;
    }
    public function setCIN($values) {
        $this->CIN = $values;
    }

}
?>
