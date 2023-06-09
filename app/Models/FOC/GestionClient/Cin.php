<?php

namespace App\Models\FOC\GestionClient;
use Illuminate\Support\Facades\DB;

class Cin
{
    private $id_cin;
    private $cin_number;
    private $first_picture;
    private $second_picture;

    public function __construct($cin_number,$first_picture,$second_picture)
    {
        $this->setCinNumber($cin_number);
        $this->setFirstPicturer($first_picture);
        $this->setSecondPicture($second_picture);
    }

///Encapsulation
    public function getIdCin()
    {
        return $this->id_cin;
    }

    public function getCinNumber()
    {
        return $this->cin_number;
    }
    public function setCinNumber($cin_number = "")
    {
        $this->cin_number = $cin_number;
        if($cin_number == "" || $cin_number == null) throw Exception("id invalid");
    }

    public function getFirstPicture()
    {
        return $this->cin_number;
    }
    public function setFirstPicturer($first_picture = "")
    {
        $this->first_picture = $first_picture;
        if($first_picture == "" || $first_picture == null) throw Exception("le nom d'image ne doit pas etre vide ou null");
    }

    public function getSecondPicture()
    {
        return $this->second_picture;
    }
    public function setSecondPicture($second_picture = "")
    {
        $this->second_picture = $second_picture;
        if($second_picture == "" || $second_picture == null) throw Exception("le nom d'image ne doit pas etre vide ou null");

    }

    //Recuperer toutes les cin
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM cin');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Cin($row->id_cin, $row->cin_number,$row->first_picture,$row->second_picture);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer le cin correspondant le id au parametre id
    public static function findById($id)
    {
        $results = DB::table('cin')->where('id_cin', $id)->first();
   
        return new Cin($results->id_cin, $results->cin_number,$results->first_picture,$results->second_picture);
    }

    //Recuperer le dernier cin
    public static function lastCinId()
    {
        $result = DB::table('cin')->orderBy('id_cin', 'desc')->value('id_cin');
    
        return $result ? $result : null;
    }
    
     //Sauvegarder un cin dans la base
     public function create()
     {
         $req = "INSERT INTO cin VALUES ( default, '%s', '%s', '%s')";
         $req = sprintf($req,$this->cin_number,$this->first_picture,$this->second_picture);
         //echo $req;  
         DB::insert($req);
     }
}