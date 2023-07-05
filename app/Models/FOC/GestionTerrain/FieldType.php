<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;

class FieldType
{
    private $id_field_type;
    private $field_type;

    public function __construct($id_field_type, $field_type)
    {
        $this->id_field_type = $id_field_type;
        $this->field_type = $field_type;
    }

///Encapsulation
    public function getIdFieldType()
    {
        return $this->id_field_type;
    }

    public function getFieldType()
    {
        return $this->field_type;
    }

    public function setFieldType($value)
    {
        $this->field_type = $value;
    }

    //Recuperer toutes les types de terrain
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM field_type WHERE status=1');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new FieldType($row->id_field_type, $row->field_type);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer le type de terrain correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('field_type')->where('id_field_type', $id)->first();
        
        return new FieldType($results->id_field_type, $results->field_type);
    }

    //Sauvegarder une categorie dans la base
    public function create()
    {
        $req = "INSERT INTO field_type VALUES ( default,'%s')";
        $req = sprintf($req,$this->field_type);
        DB::insert($req);
    }
   
    //Mettre a jour une categorie
    public function update()
    {
        DB::table('field_type')
        ->where('id_field_type', $this->id_field_type)
        ->update([
            'id_field_type' => $this->id_field_type,
            'field_type' => $this->field_type,
        ]);
    }
   
    //Supprimer une categorie par son id
    public function delete()
    {
        DB::table('field_type')
        ->where('id_field_type', $this->id_field_type)
        ->delete();
    }
}