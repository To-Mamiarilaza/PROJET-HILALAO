<?php
namespace App\Models\FOU;

use App\Exceptions\SecurityException;
use Illuminate\Support\Facades\DB;
use DateTime;

class Reservation {
    private $id_reservation;
    private $reservation_date;
    private $id_users;
    private $users;
    private $start_time;
    private $id_field;
    private $duration;
    private $end_time;
    private $date_heure_reservation;

    public static function prepareReservation($id_field, $id_users,$reservation_date, $start_time, $duration) {
        $reservation = new Reservation();
        $reservation->setStartTime(DateTime::createFromFormat('H:i', $start_time));
        $reservation->setDuration($duration);
        $reservation->setReservationDate(DateTime::createFromFormat('Y-m-d', $reservation_date));
        $reservation->setIdField($id_field);
        $reservation->setIdUsers($id_users);
        $reservation->setDateHeureReservation(new DateTimeFO($reservation->getReservationDate(), $reservation->getStartTime()));
        return $reservation;
    }

    public function isDispo() {
    }

    public function save() {
        $sql = "INSERT INTO \"public\".reservation ( reservation_date, id_users, start_time, id_field, duration) VALUES ( '%s', %s, '%s', %s, %s )";
        $sql = sprintf($sql, $this->getReservationDate()->format('Y-m-d'), $this->getIdUsers(), $this->getStartTime()->format('H:i:s'), $this->getIdField(), $this->getDuration());
        DB::insert($sql);
    }

    public static function findByIdField($id) {
        $sql = 'SELECT id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time FROM "public".v_actif_reservation f WHERE id_field = %s';
        $sql = sprintf($sql, $id);
        $reservations_db = DB::select($sql);
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $res[] = Reservation::settingDBResult($reservation_db);
        }
        return $res;
    }

    public static function findAll() {
        $sql = 'SELECT id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time FROM "public".v_actif_reservation f ';
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
        echo $sql;
        $reservations_db = DB::select($sql);
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $res[] = Reservation::settingDBResult($reservation_db);
        }
        return $res;
    }

    public static function findDirectReservationByIdField($id_field) {
        $sql = 'SELECT id_direct_reservation, reservation_date, client_name, start_time, id_field, duration, end_time FROM "public".v_direct_reservation f WHERE id_field = %s';
        $sql = sprintf($sql, $id_field);
        echo $sql;
        $reservations_db = DB::select($sql);
        $res = array();
        foreach ($reservations_db as $reservation_db) {
            $temp = new Reservation();
            $users = new Users();
            $users->setLastName($reservation_db->client_name);
            $temp->setIdReservation($reservation_db->id_direct_reservation);
            $temp->setReservationDate(DateTime::createFromFormat('Y-m-d', $reservation_db->reservation_date));
            $temp->setUsers($users);
            $temp->setStartTime(DateTime::createFromFormat('H:i:s', $reservation_db->start_time));
            $temp->setIdField($reservation_db->id_field);
            $temp->setDuration($reservation_db->duration);
            $temp->setEndTime(DateTime::createFromFormat('H:i:s', $reservation_db->end_time));
            $temp->setDateHeureReservation(new Availability(DateTime::createFromFormat('Y-M-d', $reservation_db->reservation_date), DateTime::createFromFormat('H:i:s',$reservation_db->start_time), DateTime::createFromFormat('H:i:s', $reservation_db->end_time)));
            $res[] = $temp;
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
        $sql = 'SELECT id_reservation, reservation_date, id_users, start_time, id_field, duration, end_time FROM "public".v_actif_reservation f';
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
    public function getDateHeureReservation() {
        return $this->date_heure_reservation;
    }
    public function setDateHeureReservation($values) {
        $this->date_heure_reservation = $values;
    }

    public static function settingDBResult($result) {
        $temp = new Reservation();
        $temp->setIdReservation($result->id_reservation);
        $temp->setReservationDate(DateTime::createFromFormat('Y-m-d', $result->reservation_date));
        $temp->setIdUsers($result->id_users);
        $temp->setUsers(Users::SfindById($result->id_users));
        $temp->setStartTime(DateTime::createFromFormat('H:i:s', $result->start_time));
        $temp->setIdField($result->id_field);
        $temp->setDuration($result->duration);
        $temp->setEndTime(DateTime::createFromFormat('H:i:s', $result->end_time));
        $temp->setDateHeureReservation(new Availability(DateTime::createFromFormat('Y-M-d', $result->reservation_date), DateTime::createFromFormat('H:i:s',$result->start_time), DateTime::createFromFormat('H:i:s', $result->end_time)));
        return $temp;
    }

}
?>
