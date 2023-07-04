<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;

class FieldUser extends FieldDetailled {
    private $haveUser;
    private $users;
    private $users_reservations;
    private $others_reservations;
    private $direct_reservations;

    public function __construct()
    {
        parent::__construct();
    }

    public function checkReservation(Reservation $reservation) {
        $date_reservation = $reservation->getReservationDate();
    }

    public static function Sfind($id_field, $id_users) {
        $field = new FieldUser();
        $field->find($id_field, $id_users);
        return $field;
    }

    public function find($id_field, $id_users) {
        $this->findById($id_field);
        $this->setUsers(Users::SfindById($id_users));
        $this->setHaveUser(true);
        $this->setUsersReservations(Reservation::findUsersReservation($id_users, $id_field));
        $this->setOthersReservations(Reservation::findOthersReservation($id_users, $id_field));
        $this->setDirectReservations(Reservation::findDirectReservationByIdField($id_field));
    }

    public static function findReservation($id_field) {
        $field = new FieldUser();
        $field->findById($id_field);
        $field->setHaveUser(false);
        $field->setUsersReservations([]);
        $field->setOthersReservations(Reservation::findByIdField($id_field));
        $field->setDirectReservations(Reservation::findDirectReservationByIdField($id_field));
        return $field;
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
    public function getDirectReservations() {
        return $this->direct_reservations;
    }
    public function setDirectReservations($values) {
        $this->direct_reservations = $values;
    }
    public function getHaveUser() {
        return $this->haveUser;
    }
    public function setHaveUser($values) {
        $this->haveUser = $values;
    }

}
?>
