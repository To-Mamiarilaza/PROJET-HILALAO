<?php
namespace App\Models\FOC\SuiviReservation;

use Illuminate\Support\Facades\DB;
use DateTime;

class Reservation_field
{
    private $state;
    private $id_client;
    private $rf_id_field;
    private $price;
    private $id_field;
    private $field_name;
    private $field_category;
    private $subscribing_price;
    private $field_type;
    private $infrastructure;
    private $light;
    private $address;
    private $longitude;
    private $latitude;
    private $description;
    private $id_reservation;
    private $reservation_date;
    private $first_name;
    private $last_name;
    private $birth_date;
    private $phone_number;
    private $mail;
    private $start;
    private $duration;
    private $field_description;
    private $field_address;
    private $reference;

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
    public function getIdClient()
    {
        return $this->id_client;
    }

    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }

    public function getRfIdField()
    {
        return $this->rf_id_field;
    }

    public function setRfIdField($rf_id_field)
    {
        $this->rf_id_field = $rf_id_field;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $price = number_format($price, 0, ',', ' ');
        $this->price = $price;
    }

    public function getFieldId()
    {
        return $this->id_field;
    }

    public function setFieldId($id_field)
    {
        $this->id_field = $id_field;
    }

    public function getFieldName()
    {
        return $this->field_name;
    }

    public function setFieldName($field_name)
    {
        $this->field_name = $field_name;
    }

    public function getFieldCategory()
    {
        return $this->field_category;
    }

    public function setFieldCategory($field_category)
    {
        $this->field_category = $field_category;
    }

    public function getSubscribingPrice()
    {
        return $this->subscribing_price;
    }

    public function setSubscribingPrice($subscribing_price)
    {
        $this->subscribing_price = $subscribing_price;
    }

    public function getFieldType()
    {
        return $this->field_type;
    }

    public function setFieldType($field_type)
    {
        $this->field_type = $field_type;
    }

    public function getInfrastructure()
    {
        return $this->infrastructure;
    }

    public function setInfrastructure($infrastructure)
    {
        $this->infrastructure = $infrastructure;
    }

    public function getLight()
    {
        return $this->light;
    }

    public function setLight($light)
    {
        $this->light = $light;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getIdReservation()
    {
        return $this->id_reservation;
    }

    public function setIdReservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;
    }

    public function getReservationDate()
    {
        return $this->reservation_date;
    }

    public function setReservationDate($reservation_date)
    {
        $this->reservation_date = $reservation_date;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getBirthDate()
    {
        return $this->birth_date;
    }

    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($Duration)
    {
        $this->duration = $Duration;
    }

    public function getEtatLettre()
    {
        $etat = "";
        if ($this->getState() == 2)
            $etat = "En retard";
        else if ($this->getState() == 1)
            $etat = "Valider";
        else if($this->getState() == 3) 
            $etat = "Annuler";
        return $etat;
    }

    public function getEnd()
    {
        $hoursToAdd = Self::getDuration();

        // Convertir le timestamp en un format exploitable
        $time = strtotime(Self::getStart());

        // Ajouter l'heure spécifiée
        $newTime = date('H:i', strtotime("+{$hoursToAdd} hours", $time));

        return $newTime; // Affiche le nouveau timestamp avec l'heure ajoutée

    }

    public function getFieldDescription()
    {
        return $this->field_description;
    }

    public function setFieldDescription($field_description)
    {
        $this->field_description = $field_description;
    }

    public function getFieldAddress()
    {
        return $this->field_address;
    }

    public function setFieldAddress($field_address)
    {
        $this->field_address = $field_address;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }


    public function __construct(

        $id_client,
        $rf_id_field,
        $price,
        $id_field,
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
        $start,
        $duration,
        $field_description,
        $field_address,
        $reference,
        $state
    ) {
        $this->id_client = $id_client;
        $this->rf_id_field = $rf_id_field;
        $this->price = $price;
        $this->id_field = $id_field;
        $this->field_name = $field_name;
        $this->field_category = $field_category;
        $this->subscribing_price = $subscribing_price;
        $this->field_type = $field_type;
        $this->infrastructure = $infrastructure;
        $this->light = $light;
        $this->address = $address;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->description = $description;
        $this->id_reservation = $id_reservation;
        $this->reservation_date = $reservation_date;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birth_date = $birth_date;
        $this->phone_number = $phone_number;
        $this->mail = $mail;
        $this->start = $start;
        $this->duration = $duration;
        $this->field_description = $field_description;
        $this->field_address = $field_address;
        $this->reference = $reference;
        $this->state = $state;
    }
    
    public function getReservationByIdField($id_field)
    {
        //$exactDay = self::getExactDay();
        $results = DB::table('v_reservation_detailled_field')
            ->where('id_field', $id_field)
            ->get();

        $reservations = [];
        foreach ($results as $result) {
            $reservation = new Reservation_field(
                $result->id_client,
                $result->rf_id_field,
                $result->price,
                $result->id_field,
                $result->field_name,
                $result->field_category,
                $result->subscribing_price,
                $result->field_type,
                $result->infrastructure,
                $result->light,
                $result->address,
                $result->longitude,
                $result->latitude,
                $result->description,
                $result->id_reservation,
                $result->reservation_date,
                $result->first_name,
                $result->last_name,
                $result->birth_date,
                $result->phone_number,
                $result->mail,
                $result->start,
                $result->duration,
                $result->field_description,
                $result->field_address,
                $result->reference,
                $result->state
            );
            $reservations[] = $reservation;
        }

        return $reservations;
    }

    public function getDay()
    {

        $dateTime = new DateTime($this->getReservationDate());
        $jourSemaineFrancais = $dateTime->format('l');

        if ($jourSemaineFrancais == "Monday")
            return "Lundi";
        else if ($jourSemaineFrancais == "Tuesday")
            return "Mardi";
        else if ($jourSemaineFrancais == "Wednesday")
            return "Mercredi";
        else if ($jourSemaineFrancais == "Thursday")
            return "Jeudi";
        else if ($jourSemaineFrancais == "Friday")
            return "Vendredi";
        else if ($jourSemaineFrancais == "Saturday")
            return "Samedi";
        else if ($jourSemaineFrancais == "Sunday")
            return "Dimanche";
    }

    public function getReservationsOneWeek($id_field)
    {
        $results = DB::table('v_reservation_detailled_field')
            ->where('id_field', $id_field)
            ->where('reservation_date', '>=', DB::raw('CURRENT_DATE'))
            ->where('reservation_date', '<', DB::raw("CURRENT_DATE + INTERVAL '7 days'"))
            ->orderBy('reservation_date','desc')
            ->get();

        $reservations = [];
        foreach ($results as $result) {
            $reservation = new Reservation_field(
                $result->id_client,
                $result->rf_id_field,
                $result->price,
                $result->id_field,
                $result->field_name,
                $result->field_category,
                $result->subscribing_price,
                $result->field_type,
                $result->infrastructure,
                $result->light,
                $result->address,
                $result->longitude,
                $result->latitude,
                $result->description,
                $result->id_reservation,
                $result->reservation_date,
                $result->first_name,
                $result->last_name,
                $result->birth_date,
                $result->phone_number,
                $result->mail,
                $result->start,
                $result->duration,
                $result->field_description,
                $result->field_address,
                $result->reference,
                $result->state
            );
            $reservations[] = $reservation;
        }

        return $reservations;
    }

    public function getReservationNearBy($id_field)
    {
        $results = DB::table('v_reservation_detailled_field')
            ->where('id_field', $id_field)
            ->orderBy('reservation_date','desc')
            ->get();

        $reservations = [];
        foreach ($results as $result) {
            $reservation = new Reservation_field(
                $result->id_client,
                $result->rf_id_field,
                $result->price,
                $result->id_field,
                $result->field_name,
                $result->field_category,
                $result->subscribing_price,
                $result->field_type,
                $result->infrastructure,
                $result->light,
                $result->address,
                $result->longitude,
                $result->latitude,
                $result->description,
                $result->id_reservation,
                $result->reservation_date,
                $result->first_name,
                $result->last_name,
                $result->birth_date,
                $result->phone_number,
                $result->mail,
                $result->start,
                $result->duration,
                $result->field_description,
                $result->field_address,
                $result->reference,
                $result->state
            );
            $reservations[] = $reservation;
        }

        return $reservations;
    }

    public function getReservationsWithFields($id_field)
    {
        $results = DB::table('v_reservation_detailled_field')
            ->where('id_field', $id_field)
            ->orderBy('reservation_date','desc')
            ->get();

        $reservations = [];
        foreach ($results as $result) {
            $reservation = new Reservation_field(
                $result->id_client,
                $result->rf_id_field,
                $result->price,
                $result->id_field,
                $result->field_name,
                $result->field_category,
                $result->subscribing_price,
                $result->field_type,
                $result->infrastructure,
                $result->light,
                $result->address,
                $result->longitude,
                $result->latitude,
                $result->description,
                $result->id_reservation,
                $result->reservation_date,
                $result->first_name,
                $result->last_name,
                $result->birth_date,
                $result->phone_number,
                $result->mail,
                $result->start,
                $result->duration,
                $result->field_description,
                $result->field_address,
                $result->reference,
                $result->state
            );
            $reservations[] = $reservation;
        }

        return $reservations;
    }


}


?>