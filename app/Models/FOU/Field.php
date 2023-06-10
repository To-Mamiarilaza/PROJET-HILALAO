<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Field {
    private $id_field;
    private $id_category;
    private $category;
    private $subscribing_price;
    private $id_client;
    private $client;
    private $name;
    private $id_field_type;
    private $field_type;
    private $id_infrastructure;
    private $infrastructure;
    private $id_light;
    private $light;
    private $description;
    private $address;
    private $latitude;
    private $longitude;
    private $insert_date;
    private $field_files;
    private $availability;
    private $reservation;


    public static function findById($id) {
        $sql = "SELECT id_field, id_category, category, subscribing_price, id_client, name, id_field_type, field_type, id_infrastructure, infrastructure, id_light, light, description, address, latitude, longitude, insert_date, field_files FROM v_field_detailled WHERE id_field=%s";
        $sql = sprintf($sql, $id);
        $field_db = DB::select($sql);
        $field = new Field();
        if (count($field_db) != 0) {
            $field = Field::settingByDBResult($field_db[0]);
        }
        return $field;
    }



    public function getIdField() {
        return $this->id_field;
    }
    public function setIdField($values) {
        $this->id_field = $values;
    }
    public function getIdCategory() {
        return $this->id_category;
    }
    public function setIdCategory($values) {
        $this->id_category = $values;
    }
    public function getCategory() {
        return $this->category;
    }
    public function setCategory($values) {
        $this->category = $values;
    }
    public function getSubscribingPrice() {
        return $this->subscribing_price;
    }
    public function setSubscribingPrice($values) {
        $this->subscribing_price = $values;
    }
    public function getIdClient() {
        return $this->id_client;
    }
    public function setIdClient($values) {
        $this->id_client = $values;
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
    public function getIdFieldType() {
        return $this->id_field_type;
    }
    public function setIdFieldType($values) {
        $this->id_field_type = $values;
    }
    public function getFieldType() {
        return $this->field_type;
    }
    public function setFieldType($values) {
        $this->field_type = $values;
    }
    public function getIdInfrastructure() {
        return $this->id_infrastructure;
    }
    public function setIdInfrastructure($values) {
        $this->id_infrastructure = $values;
    }
    public function getInfrastructure() {
        return $this->infrastructure;
    }
    public function setInfrastructure($values) {
        $this->infrastructure = $values;
    }
    public function getIdLight() {
        return $this->id_light;
    }
    public function setIdLight($values) {
        $this->id_light = $values;
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
    public function getAvailability() {
        return $this->availability;
    }
    public function setAvailability($values) {
        $this->availability = $values;
    }

    private static function settingByDBResult($result) {
        $field = new Field();
        $field->setIdField($result->id_field);
        $field->setIdCategory($result->id_category);
        $field->setCategory($result->category);
        $field->setSubscribingPrice($result->subscribing_price);
        $field->setIdClient($result->id_client);
        $field->setClient(Client::findbyId($result->id_client));
        $field->setName($result->name);
        $field->setIdFieldType($result->id_field_type);
        $field->setFieldType($result->field_type);
        $field->setIdInfrastructure($result->id_infrastructure);
        $field->setInfrastructure($result->infrastructure);
        $field->setIdLight($result->name);
        $field->setLight($result->light);
        $field->setDescription($result->description);
        $field->setAddress($result->address);
        $field->setName($result->name);
        $field->setLatitude($result->latitude);
        $field->setLongitude($result->longitude);
        $field->setInsertDate($result->insert_date);
        $field->setFieldFiles($result->field_files);
        $field->setAvailability(AvailabilityField::findByIdField($result->id_field));
        return $field;
    }
}
?>
