<?php
namespace App\Models\FOC\SuiviReservation;

use Illuminate\Support\Facades\DB;
use DateTime;

class HistoriqueReservation
{
    private $first_name;
    private $last_name;
    private $reservation_date;
    private $start;
    private $duration;
    private $price;
    private $state;
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

    public function getReservationDate()
    {
        return $this->reservation_date;
    }
    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
    public function setReservationDate($reservation_date)
    {
        $reservation_date = date('d F Y', strtotime($reservation_date));
        $this->reservation_date = $reservation_date;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $start = date('H:i', strtotime($start));
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
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $price = number_format($price, 0, ',', ' ');
        $this->price = $price;
    }

    public function getEnd()
    {
        $timestamp = $this->getStart();
        $hoursToAdd = $this->getDuration();

        // Convertir le timestamp en un format exploitable
        $time = strtotime($timestamp);

        // Ajouter l'heure spécifiée
        $newTime = date('H:i', strtotime("+{$hoursToAdd} hours", $time));

        return $newTime; // Affiche le nouveau timestamp avec l'heure ajoutée

    }

    public function __construct( $first_name, $last_name, $reservation_date, $start, $duration, $price, $state)
    {
        $this->setFirstName($first_name);
        $this->setLastName($last_name);
        $this->setReservationDate($reservation_date);
        $this->setStart($start);
        $this->setDuration($duration);
        $this->setPrice($price);
        $this->setState($state);
    }
    public function getEtatLettre()
    {
        $etat = "";
        if ($this->getState() == 2)
            $etat = "Retard";
        else if ($this->getState() == 1)
            $etat = "Normale";
        return $etat;
    }

    public function getMontantTotal($id_client)
    {
        $query = "SELECT SUM(price) AS montantTotal
        FROM v_reservation_detailled_field
        WHERE id_client = ".$id_client;

        $result = DB::select($query);

        if (!empty($result)) {
            return number_format($result[0]->montanttotal, 0, ',', ' ');
        }
        else{
            return 0;
        }
    }

    public function countAllReservation($id_client){
        $query = "SELECT COUNT(id_client) AS numberReservation
        FROM v_reservation_detailled_field
        WHERE id_client = ".$id_client;
    
        $result = DB::select($query);
    
        if (!empty($result)) {
            return $result[0]->numberreservation;
        }
        else{
            return 0;
        }
    }

    public function countAllField($id_client){
        $query = "SELECT COUNT(id_field) AS numberField
        FROM field
        WHERE id_client = ".$id_client;
    
        $result = DB::select($query);
    
        if (!empty($result)) {
            return $result[0]->numberfield;
        }
        else{
            return 0;
        }
    }

    public function filtre($month, $year, $id_field)
    {
        $histos = [];
        if ($month != "all" && $year != "all" && $month != "" && $year != "") {
            $req = "SELECT distinct first_name, last_name, reservation_date, start, duration, price, state
            FROM v_reservation_detailled_field
            WHERE EXTRACT(MONTH FROM reservation_date) = ".$month." AND EXTRACT(YEAR FROM reservation_date) = ".$year." AND id_field = ".$id_field.";";
            //echo $req;
            $result = DB::select($req);
            foreach ($result as $results) {
                //$first_name,$last_name,$reservation_date,$start,$duration,$price,$state
                $histo = new HistoriqueReservation($results->first_name, $results->last_name, $results->reservation_date, $results->start, $results->duration, $results->price, $results->state);
                $histos[] = $histo;
            }
        } else if ($month == "" && $year != "") {
            $req = "SELECT distinct first_name, last_name, reservation_date, start, duration, price, state
            FROM v_reservation_detailled_field AND EXTRACT(YEAR FROM reservation_date) = ".$year." AND id_field = ".$id_field.";";
            //echo $req;
            $result = DB::select($req);
            foreach ($result as $results) {
                //$first_name,$last_name,$reservation_date,$start,$duration,$price,$state
                $histo = new HistoriqueReservation($results->first_name, $results->last_name, $results->reservation_date, $results->start, $results->duration, $results->price, $results->state);
                $histos[] = $histo;
            }
        } else if ($month != "" && $year == "") {
            $req = "SELECT distinct first_name, last_name, reservation_date, start, duration, price, state
            FROM v_reservation_detailled_field
            WHERE EXTRACT(MONTH FROM reservation_date) = ".$month." AND id_field = ".$id_field.";";
            //echo $req;

            $result = DB::select($req);
            foreach ($result as $results) {
                //$first_name,$last_name,$reservation_date,$start,$duration,$price,$state
                $histo = new HistoriqueReservation($results->first_name, $results->last_name, $results->reservation_date, $results->start, $results->duration, $results->price, $results->state);
                $histos[] = $histo;
            }
        } else if ($month != "" && $year != "" && $month != "" && $year != "") {
            $req = "SELECT distinct first_name, last_name, reservation_date, start, duration, price, state
            FROM v_reservation_detailled_field
            WHERE id_field = " . $id_field . ";";
            //echo $req;

            $result = DB::select($req);
            foreach ($result as $results) {
                //$first_name,$last_name,$reservation_date,$start,$duration,$price,$state
                $histo = new HistoriqueReservation($results->first_name, $results->last_name, $results->reservation_date, $results->start, $results->duration, $results->price, $results->state);
                $histos[] = $histo;
            }
        } else if ($month == "" && $year == "" || $month == null && $year == null) {
            $req = "SELECT distinct first_name, last_name, reservation_date, start, duration, price, state
            FROM v_reservation_detailled_field
            WHERE id_field = " . $id_field . ";";
            //echo $req;

            $result = DB::select($req);
            foreach ($result as $results) {
                //$first_name,$last_name,$reservation_date,$start,$duration,$price,$state
                $histo = new HistoriqueReservation($results->first_name, $results->last_name, $results->reservation_date, $results->start, $results->duration, $results->price, $results->state);
                $histos[] = $histo;
            }
        }
        return $histos;
    }
}