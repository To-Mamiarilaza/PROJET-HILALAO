<?php

namespace App\Models\BO;
use Illuminate\Support\Facades\DB;

class FieldType
{
    protected $id_field_type;
    protected $field_type;
    protected $status;

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

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($value)
    {
        $this->status = $value;
    }

    public function __construct()
    {
    }

    public function getAllFieldType()
    {
        $field_type = DB::select('SELECT * FROM field_type where status = 1');
        $res = array();
        foreach ($field_type as $result) {
            $temp = new FieldType();
            $temp->setId_field_type($result->id_field_type);
            $temp->setField_type($result->field_type);
            $res[] = $temp;
        }
        return $res;
    }

    public function getFieldTypeById($id)
    {
        $req = sprintf("SELECT * FROM Field_Type WHERE id_field_type = %s", $id);
        $res = DB::select($req);
        
        if (count($res) > 0) {
            $result = $res[0];
            $temp = new FieldType();
            $temp->setId_field_type($result->id_field_type);
            $temp->setField_type($result->field_type);
            return $temp;
        }
        
        return null;
    }


    public function save(){
        $req = "INSERT INTO field_type(field_type) VALUES ('%s')";
        $field_type = $this->getField_type();
        $req = sprintf($req,$field_type);
        DB::insert($req);
    }

    public function update(){
        $req = "update field_type set field_type='%s' where id_field_type = %s";
        $id_field_type = $this->getId_field_type();
        $field_type = $this->getField_type();
        $req = sprintf($req,$field_type,$id_field_type);
        DB::update($req);
    }

    public function delete(){
        try{
            $req = "update field_type set status = 10 where id_field_type = %s";
            $field_type = $this->getId_field_type();
            $req = sprintf($req, $field_type);
            DB::update($req);
        }catch(Exception $e){
            throw new Exception("Supression non valider");
        }
    }
}
