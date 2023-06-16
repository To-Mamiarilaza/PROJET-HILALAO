<?php
namespace App\Models\FOC\GestionTerrain;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\FOC\GestionClient\Client;

class Field {
    private $id_field;
    private $category;
    private $client;
    private $name;
    private $field_type;
    private $infrastructure;
    private $light;
    private $description;
    private $address;
    private $latitude;
    private $longitude;
    private $insert_date;
    private $field_files;


    public function __construct($id_field, $category, $client, $name, $field_type, $infrastructure, $light, $description, $address, $latitude, $longitude, $insert_date, $field_files)
    {
        $this->id_field = $id_field;
        $this->category = $category;
        $this->client = $client;
        $this->name = $name;
        $this->field_type = $field_type;
        $this->infrastructure = $infrastructure;
        $this->light = $light;
        $this->description = $description;
        $this->address = $address;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->insert_date = $insert_date;
        $this->field_files = $field_files;
    }

//Encapsulation
    public function getIdField() {
        return $this->id_field;
    }

    public function getCategory() {
        return $this->category;
    }
    public function setCategory($values) {
        $this->category = $values;
    }

    public function getClient() {
        return $this->client;
    }
    public function setClient($values) {
        $this->client = $values;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($values) {
        $this->name = $values;
    }

    public function getFieldType() {
        return $this->field_type;
    }
    public function setFieldType($values) {
        $this->field_type = $values;
    }

    public function getInfrastructure() {
        return $this->infrastructure;
    }
    public function setInfrastructure($values) {
        $this->infrastructure = $values;
    }

    public function getLight() {
        return $this->light;
    }
    public function setLight($values) {
        $this->light = $values;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($values) {
        $this->description = $values;
    }

    public function getAddress() {
        return $this->address;
    }
    public function setAddress($values) {
        $this->address = $values;
    }

    public function getLatitude() {
        return $this->latitude;
    }
    public function setLatitude($values) {
        $this->latitude = $values;
    }

    public function getLongitude() {
        return $this->longitude;
    }
    public function setLongitude($values) {
        $this->longitude = $values;
    }
 
    public function getInsertDate() {
        return $this->insert_date;
    }
    public function setInsertDate($values) {
        $this->insert_date = $values;
    }

    public function getFieldFiles() {
        return $this->field_files;
    }
    public function setFieldFiles($values) {
        $this->field_files = $values;
    }

///Fonctions de classe
    //Recuperer toutes les terrain
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM field');
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] =  new Field($row->id_field, Category::findById($row->id_category), Client::findById($row->id_client), $row->name, FieldType::findById($row->id_field_type), Infrastructure::findById($row->id_infrastructure), Light::findById($row->id_light), $row->description, $row->address, $row->latitude, $row->longitude,  $row->insert_date,  $row->field_files);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer toutes les terrain du client connecte
    public static function getFieldsClientConnectedById($idClientConnected)
    {
        $results = DB::select('SELECT * FROM field WHERE id_client = '.$idClientConnected);
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] =  new Field($row->id_field, Category::findById($row->id_category), Client::findById($row->id_client), $row->name, FieldType::findById($row->id_field_type), Infrastructure::findById($row->id_infrastructure), Light::findById($row->id_light), $row->description, $row->address, $row->latitude, $row->longitude,  $row->insert_date,  $row->field_files);
            $i++;
        }
          
         return $datas;
    }

    //Trouver un terrain par son id
    public static function findById($id)
    {
        $results = DB::table('field')->where('id_field', $id)->first();
        $infra =Light::findById($results->id_light);

        return  new Field($results->id_field,  Category::findById($results->id_category), Client::findById($results->id_client), $results->name, FieldType::findById($results->id_field_type), Infrastructure::findById($results->id_infrastructure), Light::findById($results->id_light), $results->description, $results->address, $results->latitude, $results->longitude,  $results->insert_date,  $results->field_files);
    }

    //Sauvegarder un terrain dans la base
    public function create()
    {
        $req = "INSERT INTO field VALUES ( default, %d, %d, '%s', %d, %d, %d, '%s', %d, %d, %d, '%s', '%s')";
        $req = sprintf($req,$this->category->id_category,$this->client->id_client,$this->name,$this->field_type->id_field_type,$this->infrastructure->id_infrastructure,$this->light->id_light,$this->description->id_description,$this->address,$this->latitude,$this->longitude, $this->insert_date, $this->field_files);
        DB::insert($req);
    }
 
     //Mettre a jour un terrain
     public function update()
     {
         DB::table('field')
         ->where('id_fiels', $this->id_field)
         ->update([
             'id_field' => $this->id_field, 
             'id_category' => $this->category->id_category,
             'id_client' => $this->client->id_client, 
             'name' => $this->name, 
             'id_field_type' => $this->field_type->id_field_type, 
             'id_infrastructe' => $this->infrastructure->id_infrastructure, 
             'id_light' => $this->light->id_light,
             'description' => $this->description,
             'address' => $this->address,
             'latitude' => $this->latitude,
             'longitude' => $this->longitude,
             'insert_date' => $this->insert_date,
             'field_files' => $this->field_files,
         ]);
     }
 
     //Supprimer un terrain par son id
     public function delete()
     {
         DB::table('field')
         ->where('id_field', $this->id_field)
         ->delete();
     }

}
?>
