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


    public static function filtre($id_category = '%', $id_infrastructure_array = [], $id_field_type_array = [], $id_light_array = [] , $date_reservation = null, $time = null , $tri = 'asc') {
        $sql = FieldDetailled::filtreQuery($id_category, $id_field_type_array, $id_light_array, $id_infrastructure_array, $date_reservation, $time , $tri);
        $fields = FieldDetailled::executingArrayQuery($sql);
        return $fields;
    }

    public static function filtreQuery($id_category = '%', $id_field_type_array = [], $id_light_array = [], $id_infrastructure_array = [], $date_reservation = null, $time = null , $tri = 'asc') {
        $id_field_type = "";
        if ($id_field_type_array !== null) {
            for ($i=0; $i<count($id_field_type_array); $i++){
                if ($i == 0) {
                    $id_field_type .= "AND (v.id_field_type=".$id_field_type_array[$i];
                } else {
                    $id_field_type .= " OR v.id_field_type=".$id_field_type_array[$i];
                }
                if ($i == count($id_field_type_array)-1) {
                    $id_field_type .= ")";
                }
            }
        }

        $id_light = "";
        if ($id_light_array !== null) {

            for ($i=0; $i<count($id_light_array); $i++){
                if ($i == 0) {
                    $id_light .= "AND (v.id_light=".$id_light_array[$i];
                } else {
                    $id_light .= " OR v.id_light=".$id_light_array[$i];
                }
                if ($i == count($id_light_array)-1) {
                    $id_light .= ")";
            }
        }
        }
        $id_infrastructure = "";
        if ($id_infrastructure_array !== null) {

            for ($i=0; $i<count($id_infrastructure_array); $i++){
                if ($i == 0) {
                    $id_infrastructure .= "AND (v.id_infrastructure=".$id_infrastructure_array[$i];
                } else {
                    $id_infrastructure .= " OR v.id_infrastructure=".$id_infrastructure_array[$i];
                }
                if ($i == count($id_infrastructure_array)-1) {
                    $id_infrastructure .= ")";
                }
            }
        }
        if ($id_category == 0) {
            $category = "WHERE v.category LIKE '%'";
        } else {
            $category = "WHERE v.id_category=".$id_category;
        }
        $sql = "SELECT v.id_field, v.id_category, v.category, v.subscribing_price, v.id_client, v.name, v.id_field_type, v.field_type, v.id_infrastructure, v.infrastructure, v.id_light, v.light, v.description, v.address, v.latitude, v.longitude, v.insert_date, v.field_files FROM v_field_detailled v %s %s %s %s";
        $sql = sprintf($sql, $category, $id_field_type, $id_infrastructure, $id_light);
        if ($date_reservation !== null && $time!==null) {
            $sql = "SELECT v.id_field, v.id_category, v.category, v.subscribing_price, v.id_client, v.name, v.id_field_type, v.field_type, v.id_infrastructure, v.infrastructure, v.id_light, v.light, v.description, v.address, v.latitude, v.longitude, v.insert_date, v.field_files FROM v_field_detailled v JOIN (SELECT id_field FROM dispo_and_price WHERE id_day=extract(dow from DATE '%s')+1 AND start_time<'%s' AND end_time>='%s' ORDER BY price %s ) dp ON v.id_field=dp.id_field %s %s %s %s";
            $sql = sprintf($sql,$date_reservation,$time,$time,$tri,$category, $id_field_type, $id_infrastructure, $id_light);
        }
        return $sql;
    }

    public function executingQuery($sql) {
        $field_db = DB::select($sql);
        if (count($field_db) != 0) {
            $this->settingDBResult($field_db[0]);
        }
    }

    public static function executingArrayQuery($sql) {
        $field_db = DB::select($sql);
        $res = array();
        foreach ($field_db as $field_db) {
            $temp = new FieldDetailled();
            $temp->settingDBResult($field_db);
            $res[] = $temp;
        }
        return $res;
    }

    public static function findByCategory($id_category) {
        $sql = "SELECT id_field, id_category, category, subscribing_price, id_client, name, id_field_type, field_type, id_infrastructure, infrastructure, id_light, light, description, address, latitude, longitude, insert_date, field_files FROM v_field_detailled WHERE id_category=%s";
        $sql = sprintf($sql, $id_category);
        return FieldDetailled::executingArrayQuery($sql);
    }

    public function findById($id, $date = null) {
        $sql = "SELECT id_field, id_category, category, subscribing_price, id_client, name, id_field_type, field_type, id_infrastructure, infrastructure, id_light, light, description, address, latitude, longitude, insert_date, field_files FROM v_field_detailled WHERE id_field=%s";
        $sql = sprintf($sql, $id);
        $this->executingQuery($sql);
    }



    public static function sfindByIdWithoutReservation($id, $date = null) {
        $model = new FieldDetailled();
        $sql = "SELECT id_field, id_category, category, subscribing_price, id_client, name, id_field_type, field_type, id_infrastructure, infrastructure, id_light, light, description, address, latitude, longitude, insert_date, field_files FROM v_field_detailled WHERE id_field=%s";
        $sql = sprintf($sql, $id);
        $field_db = DB::select($sql);
        if (count($field_db) != 0) {
            $model->settingDBResultWithoutReservation($field_db[0]);
            if ($date != null) $model->setAvailability(Availability::findByIdField($id, $date));
        }
        return $model;
    }
    public static function sfindById($id, $date = null) {
        $model = new FieldDetailled();
        $sql = "SELECT id_field, id_category, category, subscribing_price, id_client, name, id_field_type, field_type, id_infrastructure, infrastructure, id_light, light, description, address, latitude, longitude, insert_date, field_files FROM v_field_detailled WHERE id_field=%s";
        $sql = sprintf($sql, $id);
        $field_db = DB::select($sql);
        if (count($field_db) != 0) {
            $model->settingDBResult($field_db[0]);
            if ($date != null) $model->setAvailability(Availability::findByIdField($id, $date));
        }
        return $model;
    }

    public static function findAll() {
        $sql = "SELECT id_field, id_category, category, subscribing_price, id_client, name, id_field_type, field_type, id_infrastructure, infrastructure, id_light, light, description, address, latitude, longitude, insert_date, field_files FROM v_field_detailled";
        $field_db = DB::select($sql);
        $res = array();
        foreach ($field_db as $field_db) {
            $temp = new FieldDetailled();
            $temp->settingDBResult($field_db);
            $res[] = $temp;
        }
        return $res;
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

    public function getDisponibility() {
        $availability = [];

        return $availability;
    }

    protected function settingDBResult($result) {
        parent::settingDBResult($result);
        $this->setCategory($result->category);
        $this->setClient(Client::findbyId($result->id_client));
        $this->setFieldType($result->field_type);
        $this->setInfrastructure($result->infrastructure);
        $this->setLight($result->light);
        $this->setAvailability(Availability::findByIdField($result->id_field));
        $this->setReservations(Reservation::findActifReservationByIdField($result->id_field));
    }
    protected function settingDBResultWithoutReservation($result) {
        parent::settingDBResult($result);
        $this->setCategory($result->category);
        $this->setClient(Client::findbyId($result->id_client));
        $this->setFieldType($result->field_type);
        $this->setInfrastructure($result->infrastructure);
        $this->setLight($result->light);
        $this->setAvailability(Availability::findByIdField($result->id_field));
    }
}
?>
