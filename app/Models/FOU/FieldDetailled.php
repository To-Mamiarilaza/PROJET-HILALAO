<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class FieldDetailled extends Field{
    private $category;
    private $subscribing_price;
    private $client;
    private $field_type;
    private $infrastructure;
    private $light;
    private $availability;
    private $reservations;

    public function __construct()
    {
        parent::__construct();
    }

    public function findById($id) {
        $sql = "SELECT id_field, id_category, category, subscribing_price, id_client, name, id_field_type, field_type, id_infrastructure, infrastructure, id_light, light, description, address, latitude, longitude, insert_date, field_files FROM v_field_detailled WHERE id_field=%s";
        $sql = sprintf($sql, $id);
        $field_db = DB::select($sql);
        if (count($field_db) != 0) {
            $this->settingDBResult($field_db[0]);
        }
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
    public function getClient() {
        return $this->client;
    }
    public function setClient($values) {
        $this->client = $values;
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
    public function getAvailability() {
        return $this->availability;
    }
    public function setAvailability($values) {
        $this->availability = $values;
    }
    public function getReservations() {
        return $this->reservations;
    }
    public function setReservations($values) {
        $this->reservations = $values;
    }

    protected function settingDBResult($result) {
        parent::settingDBResult($result);
        $this->setCategory($result->category);
        $this->setClient(Client::findbyId($result->id_client));
        $this->setFieldType($result->field_type);
        $this->setInfrastructure($result->infrastructure);
        $this->setLight($result->light);
        $this->setAvailability(AvailabilityField::findByIdField($result->id_field));
        $this->setReservations(Reservation::findActifReservationByIdField($result->id_field));
    }
}
?>
