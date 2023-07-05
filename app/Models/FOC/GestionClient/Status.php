<?php

namespace App\Models\FOC\GestionClient;
use Illuminate\Support\Facades\DB;

class Status
{
    private $id_status;
    private $status;

    public function __construct($id_status, $status)
    {
        $this->id_status = $id_status;
        $this->status = $status;
    }

///Encapsulation
    public function getIdStatus()
    {
        return $this->id_status;
    }

    public function getStatus()
    {
        return $this->status;
    }


    //Recuperer toutes les clients
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM status_client');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Status($row->id_status_client, $row->status);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer le client correspondant le id au parametre id
    public static function findById($id)
    {
        $results = DB::table('status_client')->where('id_status_client', $id)->first();
        
        return new Status($results->id_status_client, $results->status);
    }
}