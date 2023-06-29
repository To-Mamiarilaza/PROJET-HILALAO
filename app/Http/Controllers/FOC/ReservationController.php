<?php
namespace App\Http\Controllers\FOC;

use App\Http\Controllers\Controller;
use App\Models\FOC\SuiviReservation\Reservation_field;
use App\Models\FOC\SuiviReservation\DirectReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{

    public function getReservationOneWeek()
    {
        $data = Session::get('field');
            $start_time = '10:00';
            $end_time = '11:30';
            $rf_id_field = 1;
            $price = 10000;
            $field_id = 1;
            $field_name = 'Terrain de football';
            $field_category = 'Sports';
            $subscribing_price = 5000;
            $field_type = 'Outdoor';
            $infrastructure = 'Stade';
            $light = 'Non';
            $address = '123 Rue du Terrain';
            $longitude = 45.123456;
            $latitude = -73.654321;
            $description = 'Un terrain de football de qualité';
            $id_reservation = 1;
            $reservation_date = '2023-06-01';
            $first_name = 'John';
            $last_name = 'Doe';
            $birth_date = '1990-01-01';
            $phone_number = '0123456789';
            $mail = 'john.doe@example.com';
            $rv_field_name = 'Terrain de football';
            $field_description = 'Un terrain de football de qualité';
            $field_address = '123 Rue du Terrain';

            $reservationField = new Reservation_field(
                1,
                1,
                $start_time,
                $end_time,
                $rf_id_field,
                $price,
                $field_id,
                $field_name,
                $field_category,
                $subscribing_price,
                $field_type,
                $infrastructure,
                $light,
                $address,
                $longitude,
                $latitude,
                $description,
                $id_reservation,
                $reservation_date,
                $first_name,
                $last_name,
                $birth_date,
                $phone_number,
                $mail,
                '10:00',
                1,
                $rv_field_name,
                $field_description,
                $field_address
            );

            $reservationFields = $reservationField->getReservationsOneWeek($data->getIdField());

            return view('FOC/reservation', ['reservationFields' => $reservationFields]);
    }

    public function insertDirectReservation(Request $request)
    {

        $nom_client = $request->input('nom_client');
        $telephone_client = $request->input('telephone_client');
        $date_reservation = $request->input('date_reservation');
        $heure_debut = $request->input('heure_debut');
        $duration = $request->input('duration');
        $data = Session::get('field');
        try {
            $reservationDirect = new DirectReservation(1, $date_reservation, $nom_client, $heure_debut, $data->getIdField(), $duration, $telephone_client);
            $reservationDirect->create();
            return $this->getAllReservation();
        } catch (\Exception $e) {
            return $this->getAllReservation();
        }
    }
    public function getAllReservation()
    {
            $data = Session::get('field');
            $start_time = '10:00';
            $end_time = '11:30';
            $rf_id_field = 1;
            $price = 10000;
            $field_id = 1;
            $field_name = 'Terrain de football';
            $field_category = 'Sports';
            $subscribing_price = 5000;
            $field_type = 'Outdoor';
            $infrastructure = 'Stade';
            $light = 'Non';
            $address = '123 Rue du Terrain';
            $longitude = 45.123456;
            $latitude = -73.654321;
            $description = 'Un terrain de football de qualité';
            $id_reservation = 1;
            $reservation_date = '2023-06-01';
            $first_name = 'John';
            $last_name = 'Doe';
            $birth_date = '1990-01-01';
            $phone_number = '0123456789';
            $mail = 'john.doe@example.com';
            $rv_field_name = 'Terrain de football';
            $field_description = 'Un terrain de football de qualité';
            $field_address = '123 Rue du Terrain';

            $reservationField = new Reservation_field(
                1,
                1,
                $start_time,
                $end_time,
                $rf_id_field,
                $price,
                $field_id,
                $field_name,
                $field_category,
                $subscribing_price,
                $field_type,
                $infrastructure,
                $light,
                $address,
                $longitude,
                $latitude,
                $description,
                $id_reservation,
                $reservation_date,
                $first_name,
                $last_name,
                $birth_date,
                $phone_number,
                $mail,
                '10:00',
                1,
                $rv_field_name,
                $field_description,
                $field_address
            );

            $reservationFields = $reservationField->getReservationsWithFields($data->getIdField());

            return view('FOC/reservation', ['reservationFields' => $reservationFields]);
        } 
    }
?>