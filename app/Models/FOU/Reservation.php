<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Reservation {
    private $id_reservation;
    private $reservation_date;
    private $id_users;
    private $users;
    private $start_time;
    private $id_field;
    private $duration;
    private $end_time;

    public static function prepareReservation($id_field, $id_users,$reservation_date, $start_time, $duration) {
        $reservation = new Reservation();
        $reservation->setStartTime($start_time);
        $reservation->setDuration($duration);
        $reservation->setReservationDate($reservation_date);
        $reservation->setIdField($id_field);
        $reservation->setIdUsers($id_users);
        return $reservation;
    }


    public function save() {
        $sql = "INSERT INTO \"public\".reservation ( reservation_date, id_users, start_time, id_field, duration) VALUES ( '%s', %s, '%s', %s, %s )";
        $sql = sprintf($sql, $this->getReservationDate(), $this->getIdUsers(), $this->getStartTime(), $this->getIdField(), $this->getDuration());
        DB::insert($sql);
    }

    public static function findAll() {
        $sql = 'SELECT id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time FROM "public".v_liste_reservation_actif f ';
        $reservations_db = DB::select($sql);
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $res[] = Reservation::settingDBResult($reservation_db);
        }
        return $res;
    }

    public static function findOthersReservation($id_users, $id_field) {
        $sql = 'SELECT id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time FROM "public".v_actif_reservation f WHERE id_field = %s AND id_users != %s';
        $sql = sprintf($sql, $id_field, $id_users);
        $reservations_db = DB::select($sql);
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $res[] = Reservation::settingDBResult($reservation_db);
        }
        return $res;
    }

    public static function findUsersReservation($id_users, $id_field) {
        $sql = 'SELECT id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time FROM "public".v_actif_reservation f WHERE id_field = %s AND id_users = %s';
        $sql = sprintf($sql, $id_field, $id_users);
        $reservations_db = DB::select($sql);
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $res[] = Reservation::settingDBResult($reservation_db);
        }
        return $res;
    }

    public static function findActifReservationByIdField($id_field) {
        $sql = 'SELECT id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time FROM "public".v_actif_reservation f WHERE id_field = %s';
        $sql = sprintf($sql, $id_field);
        $reservations_db = DB::select($sql);
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $res[] = Reservation::settingDBResult($reservation_db);
        }
        return $res;
    }

    public function findActifReservation() {
        $sql = 'SELECT id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time FROM "public".v_liste_reservation_actif f';
        $reservations_db = DB::select($sql);
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $res[] = Reservation::settingDBResult($reservation_db);
        }
        return $res;
    }



    public function getIdReservation() {
        return $this->id_reservation;
    }
    public function setIdReservation($values) {
        $this->id_reservation = $values;
    }
    public function getReservationDate() {
        return $this->reservation_date;
    }
    public function setReservationDate($values) {
        $this->reservation_date = $values;
    }
    public function getIdUsers() {
        return $this->id_users;
    }
    public function setIdUsers($values) {
        $this->id_users = $values;
    }
    public function getUsers() {
        return $this->users;
    }
    public function setUsers($values) {
        $this->users = $values;
    }
    public function getStartTime() {
        return $this->start_time;
    }
    public function setStartTime($values) {
        $this->start_time = $values;
    }
    public function getIdField() {
        return $this->id_field;
    }
    public function setIdField($values) {
        $this->id_field = $values;
    }
    public function getDuration() {
        return $this->duration;
    }
    public function setDuration($values) {
        $this->duration = $values;
    }
    public function getEndTime() {
        return $this->end_time;
    }
    public function setEndTime($values) {
        $this->end_time = $values;
    }

    public static function settingDBResult($result) {
        $temp = new Reservation();
        $temp->setIdReservation($result->id_reservation);
        $temp->setReservationDate($result->reservation_date);
        $temp->setIdUsers($result->id_users);
        $temp->setUsers(Users::SfindById($result->id_users));
        $temp->setStartTime($result->start_time);
        $temp->setIdField($result->id_field);
        $temp->setDuration($result->duration);
        $temp->setEndTime($result->end_time);
        return $temp;
    }

}
?>
