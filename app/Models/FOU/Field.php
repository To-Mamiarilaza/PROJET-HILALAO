<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Field {
    private $id_field;
    private $id_category;
    private $subscribing_price;
    private $id_client;
    private $name;
    private $id_field_type;
    private $id_infrastructure;
    private $id_light;
    private $description;
    private $address;
    private $latitude;
    private $longitude;
    private $insert_date;
    private $field_files;


    public function findById($id) {
        $sql = "SELECT id_field, id_category, subscribing_price, name, id_field_type, id_infrastructure, id_light, description, address, latitude, longitude, insert_date, field_files FROM field WHERE id_field=%s";
        $sql = sprintf($sql, $id);
        $field_db = DB::select($sql);
        if (count($field_db) != 0) {
            $this->settingDBResult($field_db[0]);
        }
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
    public function getIdInfrastructure() {
        return $this->id_infrastructure;
    }
    public function setIdInfrastructure($values) {
        $this->id_infrastructure = $values;
    }
    public function getIdLight() {
        return $this->id_light;
    }
    public function setIdLight($values) {
        $this->id_light = $values;
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

    public function __construct() {

    }

    protected function settingDBResult($result) {
        $this->setIdField($result->id_field);
        $this->setIdCategory($result->id_category);
        $this->setSubscribingPrice($result->subscribing_price);
        $this->setIdClient($result->id_client);
        $this->setName($result->name);
        $this->setIdFieldType($result->id_field_type);
        $this->setIdInfrastructure($result->id_infrastructure);
        $this->setIdLight($result->name);
        $this->setDescription($result->description);
        $this->setAddress($result->address);
        $this->setName($result->name);
        $this->setLatitude($result->latitude);
        $this->setLongitude($result->longitude);
        $this->setInsertDate(DateTime::createFromFormat('Y-M-d', $result->insert_date));
        $this->setFieldFiles($result->field_files);
    }
}
?>
