<?php
namespace App\Models\FOC\SuiviReservation;

use Illuminate\Support\Facades\DB;
use DateTime;

class BoardReservation
{
    private $totalArgent;
    private $nombreReservation;
    private $nombreTerrain;

    public function getIdField($id_client)
    {
        $listIdField = [];
        $req = "select distinct id_field from v_reservation_detailled_field where id_client = " . $id_client;
        //echo $req;
        $result = DB::select($req);
        foreach ($result as $results) {
            $listIdField[] = $results->id_field;
        }
        // echo count($listIdField);
        return $listIdField;
    }

    public function getNomTerrain($id_client)
    {
        $nomFields = [];
        $req = "select distinct field_name from v_reservation_detailled_field where id_client = " . $id_client;
        //echo $req;
        $result = DB::select($req);
        foreach ($result as $results) {
            $nomFields[] = $results->field_name;
        }
        return $nomFields;
    }

    public function getIdFieldClient($id_client)
    {
        $numberField = [];
        $listeFields = $this->getIdField($id_client);
        $req = "select id_field from v_reservation_detailled_field where id_client = " . $id_client;
        $result = DB::select($req);
        foreach ($result as $results) {
            $numberField[] = $results->id_field;
        }
        return $numberField;
    }

    public function getNombreReservationByIdField($id_field)
    {
        $nombreField = 0;
        $req = "SELECT count(id_reservation) as nombreReservation
        FROM v_reservation_detailled_field
        WHERE id_field = " . $id_field . ";";
        $result = DB::select($req);
        foreach ($result as $results) {
            $nombreField = $results->nombrereservation;
        }
        return $nombreField;
    }

    public function getNombreField($year, $month, $id_client)
    {
        $numberField = [];
        if ($month != "" && $year != "") {
            $requ = "SELECT id_field as nombreField 
            FROM field 
            WHERE id_client = " . $id_client . " 
            AND EXTRACT(MONTH FROM insert_date) = " . $month . " 
            AND EXTRACT(YEAR FROM insert_date) = " . $year . ";";
            //echo $requ;
            $resul = DB::select($requ);
            foreach ($resul as $results) {
                $numberField[] = $results->nombrefield;
            }
            //echo count($numberField);

        } else if ($month == "" && $year != "") {
            $requ = "SELECT id_field as nombreField 
            FROM field 
            WHERE id_client = " . $id_client . " 
            AND EXTRACT(YEAR FROM insert_date) = " . $year . ";";
            //echo $requ;
            $resul = DB::select($requ);
            foreach ($resul as $results) {
                $numberField[] = $results->nombrefield;
            }
            //echo count($numberField);

        } else if ($month != "" && $year == "") {
            $requ = "SELECT id_field as nombreField 
            FROM field 
            WHERE id_client = " . $id_client . " 
            AND EXTRACT(MONTH FROM insert_date) = " . $month . ";";
            //echo $requ;
            $resul = DB::select($requ);
            foreach ($resul as $results) {
                $numberField[] = $results->nombrefield;
            }
            //echo count($numberField);

        } else if ($month == "" && $year == "" || $month == null && $year == null) {
            $requ = "SELECT id_field as nombreField 
            FROM field 
            WHERE id_client = " . $id_client . ";";
            //echo $requ;
            $resul = DB::select($requ);
            foreach ($resul as $results) {
                $numberField[] = $results->nombrefield;
            }
            //echo count($numberField);

        }
        return $numberField;
    }

    public function filtreBoard($month, $year, $id_client)
    {
        $boardReservation = [];

        $numberReservation = 0;
        $montantTotal = 0;
        $numberField = 0;

        if ($month != "" && $year != "") {
            $req = "SELECT id_reservation as nombreReservation, price as montantPrice
            FROM v_reservation_detailled_field
            WHERE id_client = " . $id_client . "
            AND EXTRACT(MONTH FROM reservation_date) = " . $month . "
            AND EXTRACT(YEAR FROM reservation_date) = " . $year . ";";
            //echo $req;
            $result = DB::select($req);
            foreach ($result as $results) {
                $numberReservation = $results->nombrereservation;
                $montantTotal = $results->montantprice;
                $numberField = $this->getNombreField($year, $month, $id_client);
                //echo $numberField;
                $boardReservation[] = new self($montantTotal, $numberReservation, $numberField);
            }
        } else if ($month == "" && $year != "") {
            $req = "SELECT id_reservation as nombreReservation, price as montantPrice
            FROM v_reservation_detailled_field
            WHERE id_client = " . $id_client . "
            AND EXTRACT(YEAR FROM reservation_date) = " . $year . ";";
            //echo $req;
            $result = DB::select($req);
            foreach ($result as $results) {
                $numberReservation = $results->nombrereservation;
                $montantTotal = $results->montantprice;
                $numberField = $this->getNombreField($year, $month, $id_client);
                //echo $numberField;
                $boardReservation[] = new self($montantTotal, $numberReservation, $numberField);
            }
        } else if ($month != "" && $year == "") {
            $req = "SELECT id_reservation as nombreReservation, price as montantPrice
            FROM v_reservation_detailled_field
            WHERE id_client = " . $id_client . "
            AND EXTRACT(MONTH FROM reservation_date) = " . $month . ";";
            //echo $req;
            $result = DB::select($req);
            foreach ($result as $results) {
                $numberReservation = $results->nombrereservation;
                $montantTotal = $results->montantprice;
                $numberField = $this->getNombreField($year, $month, $id_client);
                //echo $numberField;
                $boardReservation[] = new self($montantTotal, $numberReservation, $numberField);
            }
        } else if ($month == "" && $year == "" || $month == null && $year == null) {
            $req = "SELECT id_reservation as nombreReservation, price as montantPrice
            FROM v_reservation_detailled_field
            WHERE id_client = " . $id_client . ";";
            //echo $req;
            $result = DB::select($req);
            foreach ($result as $results) {
                $numberReservation = $results->nombrereservation;
                $montantTotal = $results->montantprice;
                $numberField = $this->getNombreField($year, $month, $id_client);
                //echo count($numberField);
                $boardReservation[] = new self($montantTotal, $numberReservation, $numberField);
            }
        }
        return $boardReservation;
    }

    public function __construct($total_argent, $nombre_argent, $nombre_terrain)
    {
        $this->setTotalArgent($total_argent);
        $this->setNombreReservation($nombre_argent);
        $this->setNombreTerrain($nombre_terrain);
    }

    public function getNombreTerrain()
    {
        return $this->nombreTerrain;
    }
    public function setNombreTerrain($nombreTerrain)
    {
        $this->nombreTerrain = $nombreTerrain;
    }
    public function getNombreReservation()
    {
        return $this->nombreReservation;
    }

    public function setNombreReservation($nombreReservation)
    {
        $this->nombreReservation = $nombreReservation;
    }
    public function getTotalArgent()
    {
        return $this->totalArgent;
    }
    public function setTotalArgent($totalArgent)
    {
        $this->totalArgent = $totalArgent;
    }
}