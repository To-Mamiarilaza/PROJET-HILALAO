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
    private $field;
    private $duration;
    private $end_time;


    public function save() {
        $sql =
        "INSERT INTO \"public\".reservation
            ( reservation_date, id_users, start_time, id_field, duration)
        VALUES
            ( '%s', %s, '%s', %s, %s )";
        $sql = sprintf($sql, $this->getReservationDate(), $this->getIdUsers(), $this->getStartTime(), $this->getIdField(), $this->getDuration());
        DB::insert($sql);
    }

    public static function findAll() {
        $reservations_db = DB::select(
            'SELECT
                id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time
            FROM
                "public".v_liste_reservation_actif f
            ');
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $temp = new Reservation();
            $temp->setIdReservation($reservation_db->id_reservation);
            $temp->setReservationDate($reservation_db->reservation_date);
            $temp->setIdUsers($reservation_db->id_users);
            $temp->setUsers(Users::findById($reservation_db->id_users));
            $temp->setStartTime($reservation_db->start_time);
            $temp->setField(Field::findById($reservation_db->id_field));
            $temp->setIdField($reservation_db->id_field);
            $temp->setDuration($reservation_db->duration);
            $temp->setEndTime($reservation_db->end_time);
            $res[] = $temp;
        }
        return $res;
    }

    public function findActifReservation() {
        $reservations_db = DB::select(
        'SELECT
            id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time
        FROM
            "public".v_liste_reservation_actif f
        ');
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $temp = new Reservation();
            $temp->setIdReservation($reservation_db->id_reservation);
            $temp->setReservationDate($reservation_db->reservation_date);
            $temp->setIdUsers($reservation_db->id_users);
            $temp->setUsers(Users::findById($reservation_db->id_users));
            $temp->setStartTime($reservation_db->start_time);
            $temp->setIdField($reservation_db->id_field);
            $temp->setField(Field::findById($reservation_db->id_field));
            $temp->setDuration($reservation_db->duration);
            $temp->setEndTime($reservation_db->end_time);
            $res[] = $temp;
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
    public function getField() {
        return $this->field;
    }
    public function setField($values) {
        $this->field = $values;
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

}
?>
