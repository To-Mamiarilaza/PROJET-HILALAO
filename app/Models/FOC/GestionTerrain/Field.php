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
    private $pictureProfile;


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
        $this->pictureProfile = "";
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

    public function getPictureProfile() {
        return $this->pictureProfile;
    }
    public function setPictureProfile($values) {
        $this->pictureProfile = $values;
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

    public static function getLastInsertFieldByClient($client) {
        $req = "SELECT * FROM field WHERE id_client = %d ORDER BY id_field desc limit 1";
        $req = sprintf($req,$client->getIdClient());
        echo "requete ".$req;
        $results = DB::select($req);
        $result = null;
        foreach ($results as $row) {
            $result =  new Field($row->id_field, Category::findById($row->id_category), Client::findById($row->id_client), $row->name, FieldType::findById($row->id_field_type), Infrastructure::findById($row->id_infrastructure), Light::findById($row->id_light), $row->description, $row->address, $row->latitude, $row->longitude,  $row->insert_date,  $row->field_files);
        }
          
         return $result;
    } 

    //Sauvegarder un terrain dans la base
    public function create($client)
    {
        $req = "INSERT INTO field VALUES ( %s, %d, %d, '%s', %d, %d, %d, '%s', %d, %d, %d, '%s', '%s')";
        $req = sprintf($req,$this->id_field,$this->category->getIdCategory(),$this->client->getIdClient(),$this->name,$this->field_type->getIdFieldType(),$this->infrastructure->getIdInfrastructure(),$this->light->getIdLight(),$this->description,$this->address,$this->latitude,$this->longitude, $this->insert_date, $this->field_files);
        DB::insert($req);
        $field = Field::getLastInsertFieldByClient($client);
        $pictureProfileField = new PictureField('default', 'terrainInconnu.jpg',TypePicture::findById(1),  $field);
        $pictureSecond1 = new PictureField('default', 'terrainInconnu.jpg',TypePicture::findById(2),  $field);
        $pictureSecond2 = new PictureField('default', 'terrainInconnu.jpg',TypePicture::findById(2),  $field);
        $pictureSecond3 = new PictureField('default', 'terrainInconnu.jpg',TypePicture::findById(2),  $field);
        $pictureProfileField->create();
        $pictureSecond1->create();
        $pictureSecond2->create();
        $pictureSecond3->create();
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

    //Rchercehe multicritere
    public static function searchMultiCritere($critere, $idCategory) {
        
        $req = "SELECT * FROM field WHERE name like '%s%s%s' AND id_category = %d";
        $req = sprintf($req,'%',$critere,'%',$idCategory);
        $results = DB::select($req);
        $datas = array();
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] =  new Field($row->id_field, Category::findById($row->id_category), Client::findById($row->id_client), $row->name, FieldType::findById($row->id_field_type), Infrastructure::findById($row->id_infrastructure), Light::findById($row->id_light), $row->description, $row->address, $row->latitude, $row->longitude,  $row->insert_date,  $row->field_files);
            $i++;
        }
          
         return $datas;
    }

    //Inserer dans pictureProfile le photo de profil d'un terrain
    public static function getPicProfileEachField($fields, $pictureProfile) {
        $count = 0;
        foreach($fields as $field) {
            $field->setPictureProfile($pictureProfile[$count]->getPicture());
            if($pictureProfile == null) {
                $field->setPrictureProfile("terrainInconnu.jpg");
            }
            $count++;
        }

        return $fields;
    }

    

}
?>
