<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use App\Exceptions\UserException;

class UserReservation extends Users {
    private $reservations;

    public static function findReservationByIdUser($id_users) {
        $user = new UserReservation();
        $user->findById($id_users);
        $user->setReservations(Reservation::findUsersReservation($id_users));
        return $user;
    }

    public function getReservations() {
        return $this->reservations;
    }
    public function setReservations($values) {
        $this->reservations = $values;
    }
}
?>
