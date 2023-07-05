<?php

namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;

class Discount
{
    private $id_discount;
    private $field;
    private $start;
    private $end;
    private $discount;

    public function __construct($id_discount, $field, $start, $end, $discount)
    {
        $this->id_discount = $id_discount;
        $this->field = $field;
        $this->start = $start;
        $this->end = $end;
        $this->discount = $discount;
    }

///Encapsulation
    public function getIdDiscount()
    {
        return $this->id_discount;
    }

    public function getField()
    {
        return $this->field;
    }

    public function setField($value)
    {
        $this->field = $value;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($value)
    {
        $this->start = $value;
    }
    
    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($value)
    {
        $this->end = $value;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDicount($value)
    {
        $this->discount = $value;
    }

    //Recuperer toutes les Remises
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM discount');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Discount($row->id_discount, Field::findById($row->id_field), $row->start, $row->end, $row->discount);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer toutes les Remises d'un terrain
    public static function getAllDiscountField($field)
    {
        $results = DB::select('SELECT * FROM discount WHERE id_field='.$field->getIdField());
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Discount($row->id_discount, Field::findById($row->id_field), $row->start, $row->end, $row->discount);
            $i++;
        }
         
        return $datas;
     }

    //Recuperer les remises correspondant au parametre id
    public static function findById($id)
    {
        $results = DB::table('discount')->where('id_discount', $id)->first();
        
        return  new Discount($results->id_discount, Field::findById($results->id_field), $results->start, $results->end, $results->discount);
    }

    //Sauvegarder une remise dans la base
    public function create()
    {
        $req = "INSERT INTO discount VALUES ( default, %d, '%s', '%s', %d)";
           $req = sprintf($req,$this->field->getIdField(),$this->start,$this->end,$this->discount);
           DB::insert($req);
       }
   
    //Mettre a jour une remise
    public function update()
    {
        DB::table('discount')
        ->where('id_discount', $this->id_discount)
        ->update([
            'id_discount' => $this->id_discount,
            'id_field' => $this->field->getIdField(),
            'start' => $this->start,
            'end' => $this->end,
            'discount' => $this->discount,
        ]);
    }
   
    //Supprimer une remise par son id
    public function delete()
    {
        DB::table('discount')
        ->where('id_discount', $this->id_discount)
        ->delete();
    }
}