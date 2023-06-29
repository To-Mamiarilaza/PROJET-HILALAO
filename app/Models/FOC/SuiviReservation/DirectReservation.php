<?php

namespace App\Models\FOC\SuiviReservation;

use Illuminate\Support\Facades\DB;

class DirectReservation
{
    private $id_direct_reservation;
    private $reservation_date;
    private $client_name;
    private $start_time;
    private $id_field;
    private $duration;
    private $phone_number_client;

    public function __construct($id_direct_reservation, $reservation_date, $client_name, $start_time, $id_field, $duration, $phone_number_client)
    {
        $this->id_direct_reservation = $id_direct_reservation;
        $this->reservation_date = $reservation_date;
        $this->client_name = $client_name;
        $this->start_time = $start_time;
        $this->id_field = $id_field;
        $this->duration = $duration;
        $this->phone_number_client = $phone_number_client;
    }

    public function getIdDirectReservation()
    {
        return $this->id_direct_reservation;
    }

    public function setIdDirectReservation($id_direct_reservation)
    {
        $this->id_direct_reservation = $id_direct_reservation;
        if($id_direct_reservation == "" || $id_direct_reservation == null) throw new \Exception(" id direct reservation vide ou null ");
    }

    public function getReservationDate()
    {
        return $this->reservation_date;
    }

    public function setReservationDate($reservation_date)
    {
        $this->reservation_date = $reservation_date;
        if($reservation_date == "" || $reservation_date == null) throw new \Exception(" la date de reservation est vide ou null ");
    }

    public function getClientName()
    {
        return $this->client_name;
    }

    public function setClientName($client_name)
    {
        $this->client_name = $client_name;
        if($client_name == "" || $client_name == null) throw new \Exception(" nom du client invalide ");
    }

    public function getStartTime()
    {
        return $this->start_time;
    }

    public function setStartTime($start_time)
    {
        $this->start_time = $start_time;
        if($start_time == "" || $start_time == null) throw new \Exception(" temps de commencement invalide ");
    }

    public function getIdField()
    {
        return $this->id_field;
    }

    public function setIdField($id_field)
    {
        $this->id_field = $id_field;
        if($id_field == "" || $id_field == null) throw new \Exception(" id du terrain invalide ");
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
        if($duration == "" || $duration == null) throw new \Exception(" duree de reservation invalide ");
    }

    public function getPhoneNumberClient()
    {
        return $this->phone_number_client;
    }

    public function setPhoneNumberClient($phone_number_client)
    {
        $this->phone_number_client = $phone_number_client;
        if($phone_number_client == "" || $phone_number_client == null) throw new \Exception(" numero du telephone invalide ");
    }

    public function create()
    {
        try {
            $formattedReservationDate = date_create($this->getReservationDate())->format('Y-m-d');
            $req = "INSERT INTO direct_reservation (client_name, phone_number_client,reservation_date, start_time, id_field, duration) 
                    VALUES ('%s', '%s', '%s','%s', %d, %d)";
            $req = sprintf($req, $this->getClientName(), $this->getPhoneNumberClient(),$formattedReservationDate, $this->getStartTime(), $this->getIdField(), $this->getDuration());
            DB::insert($req);
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de la création de la réservation : " . $e->getMessage());
        }
    }
}