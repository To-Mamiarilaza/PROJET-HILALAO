<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;

class FieldUser extends FieldDetailled {
    private $users;
    private $users_reservations;
    private $others_reservations;

    public function __construct()
    {
        parent::__construct();
    }

    public static function Sfind($id_field, $id_users) {
        $field = new FieldUser();
        if ($id_users != null) {
            $field->findById($id_field);
            $field->setUsers(Users::SfindById($id_users));
            $field->setUsersReservations(Reservation::findUsersReservation($id_field, $id_users));
            $field->setOthersReservations(Reservation::findOthersReservation($id_field, $id_users));
        } else {
            $field->findById($id_field);
            $field->setUsers(Users::SfindById($id_users));
            $field->setUsersReservations([]);
            $field->setOthersReservations(Reservation::findOthersReservation($id_field, 0));
        }
        return $field;
    }

    public function find($id_field, $id_users) {
        $this->findById($id_field);
        $this->setUsers(Users::SfindById($id_users));
        $this->setUsersReservations(Reservation::findUsersReservation($id_field, $id_users));
        $this->setOthersReservations(Reservation::findOthersReservation($id_field, $id_users));
    }

    public function getUsers() {
        return $this->users;
    }
    public function setUsers($values) {
        $this->users = $values;
    }
    public function getUsersReservations() {
        return $this->users_reservations;
    }
    public function setUsersReservations($values) {
        $this->users_reservations = $values;
    }
    public function getOthersReservations() {
        return $this->others_reservations;
    }
    public function setOthersReservations($values) {
        $this->others_reservations = $values;
    }

}
?>
