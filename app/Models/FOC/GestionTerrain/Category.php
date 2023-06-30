<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;

class Category
{
    private $id_category;
    private $category;
    private $subscribing_price;

    public function __construct($id_category, $category, $subscribing_price)
    {
        $this->id_category = $id_category;
        $this->category = $category;
        $this->subscribing_price = $subscribing_price;
    }

///Encapsulation
    public function getIdCategory()
    {
        return $this->id_category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($value)
    {
        $this->category = $value;
    }

    public function getSubscribing_price()
    {
        return $this->subscribing_price;
    }

    public function setSubscribing_price($value)
    {
        $this->subscribing_price = $value;
    }

    //Recuperer toutes les category
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM category');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Category($row->id_category, $row->category,  $row->subscribing_price);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer le category correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('category')->where('id_category', $id)->first();
        
        return new Category($results->id_category, $results->category,  $results->subscribing_price);
    }

    //Sauvegarder une categorie dans la base
    public function create()
    {
        $req = "INSERT INTO category VALUES ( default, %d, '%s')";
           $req = sprintf($req,$this->id_category,$this->category,$this->subscribing_price);
           //echo $req;  
           DB::insert($req);
       }
   
    //Mettre a jour une categorie
    public function update()
    {
        DB::table('category')
        ->where('id_category', $this->id_category)
        ->update([
            'id_category' => $this->id_category,
            'category' => $this->category,
            'subscribing_price' => $this->subscribing_price,
        ]);
    }
   
    //Supprimer une categorie par son id
    public function delete()
    {
        DB::table('category')
        ->where('id_category', $this->id_category)
        ->delete();
    }
}