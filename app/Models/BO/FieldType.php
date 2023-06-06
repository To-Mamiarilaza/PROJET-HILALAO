<?php

namespace App\Models\BO;
use Illuminate\Support\Facades\DB;

class FieldType
{
    public $id_field_type;
    public $field_type;

    public function getId_field_type()
    {
        return $this->id_field_type;
    }
    public function setId_field_type($value)
    {
        $this->id_field_type = $value;
    }

    public function getField_type()
    {
        return $this->field_type;
    }
    public function setField_type($value)
    {
        $this->field_type = $value;
    }

    public function __construct()
    {
    }

    public function getAllFieldType()
    {
        $field_type = DB::select('SELECT * FROM field_type ');
        $res = array();
        foreach ($field_type as $result) {
            $temp = new FieldType();
            $temp->setId_field_type($result->id_field_type);
            $temp->setField_type($result->field_type);
            $res[] = $temp;
        }
        return $res;
    }

    public function save(){
        $req = "INSERT INTO category(field_type) VALUES ('%s')";
        $field_type = $this->field_type;
        $req = sprintf($req,$field_type);
        DB::insert($req);
    }
}
