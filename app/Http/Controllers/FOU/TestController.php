<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\Availability;
use App\Models\FOU\FieldDetailled;
use App\Models\FOU\Unavailability;
use App\Models\FOU\FieldUser;
use Illuminate\Support\Facades\Session;
use DateTime;

class TestController extends Controller
{
    public function index()
    {
        $id_field = 4;
        $date = date('Y-m-d');
        $users = null;
        if (Session::get("user") !== null) {
            $users = Session::get("user");
            $field = FieldUser::Sfind( $id_field, $users->getIdUsers());
        } else {
            $field = FieldUser::findReservation($id_field);
        }
        return view('FOU\empty', ['field' => $field, 'date' => $date]);
    }
}
