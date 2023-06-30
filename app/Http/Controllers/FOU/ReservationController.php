<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\FieldUser;
use App\Models\FOU\Reservation;
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
        } else {
            $field = FieldUser::findReservation($id_field);
        }
        return view('FOU\calendar' , ['field' => $field], ['date' => $date]);
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
        $reservation = Reservation::prepareReservation($id_field, $id_users, $reservation_date, $start_time, $duration);
        $reservation->save();
        return redirect('/field/detail/'.$id_field);
    }
}
