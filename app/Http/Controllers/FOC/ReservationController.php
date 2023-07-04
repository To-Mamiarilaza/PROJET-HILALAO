<?php
namespace App\Http\Controllers\FOC;

use App\Http\Controllers\Controller;
use App\Models\FOC\SuiviReservation\Reservation_field;
use App\Models\FOC\SuiviReservation\DirectReservation;
use App\Models\FOC\SuiviReservation\HistoriqueReservation;
use App\Models\FOC\SuiviReservation\BoardReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{

    public function updateEtatReservation(Request $request){
        $etat = $request->input('etatReservation');
        $idReservation = $request->input('idReservation');
        $histo = new HistoriqueReservation("Rakoto", "bila", "2023-06-28", "02:00:00", 1, 5000, 2);
        $histo->updateReservation($etat, $idReservation);
        return redirect('/selectAllReservation');
    }

    public function filtreBoard(Request $request){
        $board = new BoardReservation("","","");

        $client = Session::get('clientConnected');

        $mois = $request->input('mois');
        $annee = $request->input('annee');

        $filtreBoard = $board->filtreBoard($mois,$annee,$client->getIdClient());
        $filtreB = $board->getNombreField($annee,$mois,$client->getIdClient());
 
        //echo $client->getIdClient();

        $prices = [];
        foreach ($filtreBoard as $item) {
            $price = $item->getTotalArgent();
            $prices[] = $price;
        }

        $nbrField = [];
        foreach ($filtreB as $item) {
            $field = $item;
            $nbrField[] = $field;
        }
        //echo count($nbrField);

        //echo count($nbrField);
        $nbrRes = [];
        foreach ($filtreBoard as $item) {
            $res = $item->getNombreReservation();
            $nbrRes[] = $res;
        }
        //echo count($nbrRes);
        //$numFieldByid = $board->getNombreReservationByIdField($data->getIdField());
        
        $ReservationFieldClient = $board->getIdFieldClient($client->getIdClient());
        
        $NomFields = $board->getNomTerrain($client->getIdClient());
        // foreach ($NomFields as $nom) {
        //     echo $nom;
        // }
        // echo count($ReservationFieldClient)*100;
        // echo count($nbrRes);
        $proportionFields[] = ((count($ReservationFieldClient)*100)/count($nbrRes));
        //echo count($proportionFields); 

        //echo $proportionFields;
        //echo $filtreBoard['numberField'];
        return view('FOC/board',[
            'nombreReservation' => $nbrRes,
            'nombreTerrain' => $nbrField,
            'prices' => $prices,
            'proportion' => $proportionFields,
            'nomTerrain' => $NomFields
        ]);
    }
    public function filtre(Request $request)
    {
        $data = Session::get('field');
        $mois = $request->input('mois');
        $annee = $request->input('annee');
        $histo = new HistoriqueReservation("Rakoto", "bila", "2023-06-28", "02:00:00", 1, 5000, 2);
        $filtre = $histo->filtre($mois, $annee, $data->getIdField());

        $prices = [];
        foreach ($filtre as $item) {
            $price = $item->getPrice();
            $prices[] = $price;
        }

        return view('FOC/statistic-field', [
            'historiques' => $filtre, 
            'prices' => $prices
        ]);
    }

    public function getReservationOneWeek()
    {
        $data = Session::get('field');
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
        $field_description = 'Un terrain de football de qualité';
        $field_address = '123 Rue du Terrain';

        $reservationField = new Reservation_field(
            1,
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
            $field_description,
            $field_address,
            'RF00321320',
            1
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

    public function getReservationNearBy()
    {
        $data = Session::get('field');
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
        $field_description = 'Un terrain de football de qualité';
        $field_address = '123 Rue du Terrain';

        $reservationField = new Reservation_field(
            1,
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
            $field_description,
            $field_address,
            'RF00321320',
            1
        );

        $reservationFields = $reservationField->getReservationNearBy($data->getIdField());

        return view('FOC/reservation', ['reservationFields' => $reservationFields]);
    }

    public function getAllReservation()
    {
        $data = Session::get('field');
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
        $field_description = 'Un terrain de football de qualité';
        $field_address = '123 Rue du Terrain';

        $reservationField = new Reservation_field(
            1,
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
            $field_description,
            $field_address,
            'RF00321320',
            1
        );

        $reservationFields = $reservationField->getReservationsWithFields($data->getIdField());

        return view('FOC/reservation', ['reservationFields' => $reservationFields]);
    }
}
?>