<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;

class Infrastructure
{
    private $id_infrastructure;
    private $infrastructure;

    public function __construct($id_infrastructure, $infrastructure)
    {
        $this->id_infrastructure = $id_infrastructure;
        $this->infrastructure = $infrastructure;
    }

///Encapsulation
    public function getIdInfrastructure()
    {
        return $this->id_infrastructure;
    }

    public function getInfrastructure()
    {
        return $this->infrastructure;
    }

    public function setInfrasctructure($value)
    {
        $this->infrastructure = $value;
    }

    //Recuperer toutes les infrastructures
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM infrastructure WHERE status=1');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Infrastructure($row->id_infrastructure, $row->infrastructure);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer l'infrastructure correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('infrastructure')->where('id_infrastructure', $id)->first();
 
        return new Infrastructure($results->id_infrastructure, $results->infrastructure);
    }

    //Sauvegarder une infrastructure dans la base
    public function create()
    {
        $req = "INSERT INTO infrastructure VALUES ( default,'%s')";
        $req = sprintf($req,$this->infrastructure);
        DB::insert($req);
    }
   
    //Mettre a jour une infrastructure
    public function update()
    {
        DB::table('infrastructure')
        ->where('id_infrastructure', $this->id_infrastructure)
        ->update([
            'id_infrastructure' => $this->id_infrastructure,
            'infrastructure' => $this->infrastructure,
        ]);
    }
   
    //Supprimer une categorie par son id
    public function delete()
    {
        DB::table('infrastructure')
        ->where('id_infrastructure', $this->id_infrastructure)
        ->delete();
    }
}