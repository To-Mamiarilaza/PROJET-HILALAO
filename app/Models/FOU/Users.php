<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;

class Users {
    private $id_users;
    private $first_name;
    private $last_name;
    private $birth_date;
    private $phone_number;
    private $mail;
    private $sign_up_date;
    private $pwd;

    public static function findById($id) {
        $sql = 'SELECT id_users, first_name, last_name, birth_date, phone_number, mail, sign_up_date, pwd FROM users WHERE id_cin=%s';
        $sql = sprintf($sql, $id);
        $users_db = DB::select($sql);
        $user = new Users();
        if (count($users_db)!=0) {
            $user->setIdUsers($users_db[0]->id_users);
            $user->setFirstName($users_db[0]->first_name);
            $user->setLastName($users_db[0]->last_name);
            $user->setBirthDate($users_db[0]->birth_date);
            $user->setPhoneNumber($users_db[0]->phone_number);
            $user->setMail($users_db[0]->mail);
            $user->setSignUpDate($users_db[0]->sign_up_date);
            $user->setPwd($users_db[0]->pwd);
        }
        return $user;
    }


    public function getIdUsers() {
        return $this->id_users;
    }
    public function setIdUsers($values) {
        $this->id_users = $values;
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
    public function getBirhtDate() {
        return $this->birth_date;
    }
    public function setBirthDate($values) {
        $this->birth_date = $values;
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
    public function getSignUpDate() {
        return $this->sign_up_date;
    }
    public function setSignUpDate($values) {
        $this->sign_up_date = $values;
    }
    public function getPwd() {
        return $this->pwd;
    }
    public function setPwd($values) {
        $this->pwd = $values;
    }


}
?>
