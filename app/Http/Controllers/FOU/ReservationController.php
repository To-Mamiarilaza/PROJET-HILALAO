<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\Field;
use App\Models\FOU\FieldDetailled;
use App\Models\FOU\FieldUser;
use App\Models\FOU\Reservation;
use DateTime;

class ReservationController extends Controller
{
    public function index()
    {
        $id_field = 1;
        $id_users = 1;
        $field = FieldUser::Sfind($id_field, $id_users);
        return view('FOU\calendar' , ['field' => $field]);
    }

    public function reserve() {
        $id_users = 1;
        $id_field = 1;
        $reservation_date = Date('Y-M-d');
        $start_time = '10:00';
        $duration = 5;
        $reservation = Reservation::prepareReservation($id_field, $id_users, $reservation_date, $start_time, $duration);
        $reservation->save();
    }
}
