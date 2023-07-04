<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\FieldUser;
use App\Models\FOU\UserNotification;
use App\Models\FOU\Reservation;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DateTime;

class ReservationController extends Controller
{
    public function index($id_field, $date = null)
    {
        if ($date === null) {
            $date = date('Y-m-d');
        }
        $users = null;
        if (Session::get("user") !== null) {
            $users = Session::get("user");
            $field = FieldUser::Sfind( $id_field, $users->getIdUsers());
            return view('FOU\calendar' , ['field' => $field, 'date' => $date, 'haveUser' => true]);
        } else {
            $field = FieldUser::findReservation($id_field);
            return view('FOU\calendar' , ['field' => $field, 'date' => $date]);
        }
    }

    public function cancel($id_reservation) {
    }

    public function reserve(Request $request) {
        if (Session::get("user") === null) {
            return back();
        }
        $id_users = Session::get("user")->getIdUsers();
        $id_field = $request->input('id_field');
        $reservation_date = $request->input('reservation_date');
        $start_time = $request->input('start_time');
        $duration = $request->input('duration');
        $montant = $request->input('montant');
        $reservation = Reservation::prepareReservation($id_field, $id_users, $reservation_date, $start_time, $duration, $montant);
        $reservation->save();
        $notif = new UserNotification(0, $id_users, $id_field, "", 1, $reservation_date, 0, $start_time);
        $notif->save();
        return redirect('/field/detail/'.$id_field);
    }


    public function calculPrix($id_field,$reservation_date, $start_time, $duration) {
        $price = Reservation::calculPrix($id_field, $reservation_date, $start_time, $duration);
        return $price;
    }
}
