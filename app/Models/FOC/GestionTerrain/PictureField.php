<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;

class PictureField
{
    private $id_picture;
    private $picture;
    private $type_picture;
    private $field;

    public function __construct($id_picture, $picture, $type_picture, $field)
    {
        $this->id_picture = $id_picture;
        $this->picture = $picture;
        $this->type_picture = $type_picture;
        $this->field = $field;
    }

///Encapsulation
    public function getIdPicture()
    {
        return $this->id_picture;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($value)
    {
        $this->picture = $value;
    }

    public function getTypePicture()
    {
        return $this->type_picture;
    }

    public function setTypePicture($value)
    {
        $this->type_picture = $value;
    }

    public function getField()
    {
        return $this->field;
    }

    public function setField($value)
    {
        $this->field = $value;
    }

    //Recuperer toutes les images d'un terrain
    public static function getPictureField($field)
    {
        $results = DB::select('SELECT * FROM picture WHERE id_field ='.$field->getIdfield());
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new PictureField($row->id_picture, $row->picture, TypePicture::findById($row->id_type_picture), Field::findById($row->id_field));
            $i++;
        }
        
        return $datas;
    }

    //Recuperer la photo de profil d'un terrain
    public static function getPictureProfileField($fields)
    {
        $datas = array();
        foreach($fields as $field) {
            $results = DB::select('SELECT * FROM picture WHERE id_field ='.$field->getIdfield().' AND id_type_picture =1');
            $datas = array();
            $i = 0;
            foreach ($results as $row) {
                $datas[$i] = new PictureField($row->id_picture, $row->picture, TypePicture::findById($row->id_type_picture), Field::findById($row->id_field));
                $i++;
            }            
        }

        return $datas;
    }

    //Recuperer la photo secondaire d'un terrain
    public static function getSecondProfileField($field)
    {
        $results = DB::select('SELECT * FROM picture WHERE id_field ='.$field->id_field.' AND id_type_picture =2');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new PictureField($row->id_picture, $row->picture, TypePicture::findById($row->id_type_picture), Field::findById($row->id_field));
            $i++;
        }
          
        return $datas;
    }

    //Recuperer l'image correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('picture')->where('id_picture', $id)->first();
        
        return  new PictureField($results->id_picture, $results->picture, TypePicture::findById($results->id_type_picture), Field::findById($results->id_field));
    }

    //Sauvegarder une image dans la base
    public function create()
    {
        $req = "INSERT INTO picture VALUES ( default, '%s', %d, %d)";
        $req = sprintf($req,$this->picture,$this->type_picture->id_type_picture,$this->field->id_field);
        DB::insert($req);
    }
   
    //Mettre a jour une image
    public function update()
    {
        DB::table('picture')
        ->where('id_picture', $this->id_picture)
        ->update([
            'id_picture' => $this->id_picture,
            'picture' => $this->picture,
            'id_type_picture' => $this->type_picture->id_type_picture,
            'id_field' => $this->field->id_field,
        ]);
    }
   
    //Supprimer une image par son id
    public function delete()
    {
        DB::table('picture')
        ->where('id_picture', $this->id_picture)
        ->delete();
    }
}