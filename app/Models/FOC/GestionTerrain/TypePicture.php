<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;

class TypePicture
{
    private $id_type_picture;
    private $type_picture;

    public function __construct($id_type_picture, $type_picture)
    {
        $this->id_type_picture = $id_type_picture;
        $this->type_picture = $type_picture;
    }

///Encapsulation
    public function getIdTypePicture()
    {
        return $this->id_type_picture;
    }

    public function getTypePicture()
    {
        return $this->type_picture;
    }


    //Recuperer toutes les types pictures
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM type_picture');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new TypePicture($row->id_type_picture, $row->type_picture);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer le type picture correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('type_picture')->where('id_type_picture', $id)->first();
        
        return new TypePicture($results->id_type_picture, $results->type_picture);
    }
}