<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use App\Exceptions\UserException;

class Users {
    private $id_users;
    private $first_name;
    private $last_name;
    private $birth_date;
    private $phone_number;
    private $mail;
    private $sign_up_date;
    private $pwd;

    public function log() {
        $user = Users::findByMail($this->getMail());
        if ($user->getPwd() == $this->getPwd()) {
            return $user;
        }
        throw new UserException(message:"Le mot de passe est erroné", type:"pwd");
    }

    public static function findByMail($mail) {
        $sql = "SELECT id_users, first_name, last_name, birth_date, phone_number, mail, sign_up_date, pwd FROM users WHERE mail='%s'";
        $sql = sprintf($sql, $mail);
        $users_db = DB::select($sql);
        $user = new Users();
        if (count($users_db)!=0) {
            $user->settingDBResult($users_db[0]);
        } else {
            throw new UserException();
        }
        return $user;
    }

    public static function SfindById($id) {
        $sql = 'SELECT id_users, first_name, last_name, birth_date, phone_number, mail, sign_up_date, pwd FROM users WHERE id_users=%s';
        $sql = sprintf($sql, $id);
        $users_db = DB::select($sql);
        $user = new Users();
        if (count($users_db)!=0) {
            $user->settingDBResult($users_db[0]);
        } else {
            throw new UserException();
        }
        return $user;
    }

    public function findById($id) {
        $sql = 'SELECT id_users, first_name, last_name, birth_date, phone_number, mail, sign_up_date, pwd FROM users WHERE id_users=%s';
        $sql = sprintf($sql, $id);
        $users_db = DB::select($sql);
        if (count($users_db)!=0) {
            $this->settingDBResult($users_db[0]);
        } else {
            throw new UserException();
        }
    }

    public function settingDBResult($result) {
        $this->setIdUsers($result->id_users);
        $this->setFirstName($result->first_name);
        $this->setLastName($result->last_name);
        $this->setBirthDate($result->birth_date);
        $this->setPhoneNumber($result->phone_number);
        $this->setMail($result->mail);
        $this->setSignUpDate($result->sign_up_date);
        $this->setPwd($result->pwd);
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
