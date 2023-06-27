<?php
namespace App\Models\BO;
use Exception;
use Illuminate\Support\Facades\DB;

class ValidationClient
{
    protected $id_client;
    protected $first_name;
    protected $last_name;

    public function getId_client() {
        return $this->id_client;
    }
    public function setId_client($value) {
        $this->id_client = $value;
    }

    public function getFirst_name() {
        return $this->first_name;
    }
    public function setFirst_name($value) {
        $this->first_name = $value;
    }

    public function getLast_name() {
        return $this->last_name;
    }
    public function setLast_name($value) {
        $this->last_name = $value;
    }

    //client en attente
    public function getPendingClient(){
        try{
            $client = DB::select("select c.id_client, c.first_name, c.last_name from client c
            join status_client sc on c.id_status = sc.id_status_client
            where sc.id_status_client = 1");
            $res = array();
            foreach ($client as $result) {
                $temp = new ValidationClient();
                $temp->setId_client($result->id_client);
                $temp->setFirst_name($result->first_name);
                $temp->setLast_name($result->last_name);
                $res[] = $temp;
            }
            return $res;
        }catch(Exception $e){
            $e->getMessage();
        }
    }
}