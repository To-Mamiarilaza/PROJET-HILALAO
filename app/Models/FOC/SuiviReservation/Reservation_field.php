<?php
namespace App\Models\FOC\SuiviReservation;

use Illuminate\Support\Facades\DB;

class Reservation_field
{
    private $id_client;
    private $start_time;
    private $end_time;
    private $rf_id_field;
    private $price;
    private $field_id;
    private $field_name;
    private $field_category;
    private $subscribing_price;
    private $field_type;
    private $infrastructure;
    private $light;
    private $address;
    private $longitude;
    private $latitude;
    private $description;
    private $id_reservation;
    private $reservation_date;
    private $first_name;
    private $last_name;
    private $birth_date;
    private $phone_number;
    private $mail;
    private $start;
    private $duration;
    private $rv_field_name;
    private $field_description;
    private $field_address;

    public function getIdClient()
    {
        return $this->id_client;
    }

    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }

    public function getStartTime()
    {
        return $this->start_time;
    }

    public function setStartTime($start_time)
    {
        $this->start_time = $start_time;
    }

    public function getEndTime()
    {
        return $this->end_time;
    }

    public function setEndTime($end_time)
    {
        $this->end_time = $end_time;
    }

    public function getRfIdField()
    {
        return $this->rf_id_field;
    }

    public function setRfIdField($rf_id_field)
    {
        $this->rf_id_field = $rf_id_field;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getFieldId()
    {
        return $this->field_id;
    }

    public function setFieldId($field_id)
    {
        $this->field_id = $field_id;
    }

    public function getFieldName()
    {
        return $this->field_name;
    }

    public function setFieldName($field_name)
    {
        $this->field_name = $field_name;
    }

    public function getFieldCategory()
    {
        return $this->field_category;
    }

    public function setFieldCategory($field_category)
    {
        $this->field_category = $field_category;
    }

    public function getSubscribingPrice()
    {
        return $this->subscribing_price;
    }

    public function setSubscribingPrice($subscribing_price)
    {
        $this->subscribing_price = $subscribing_price;
    }

    public function getFieldType()
    {
        return $this->field_type;
    }

    public function setFieldType($field_type)
    {
        $this->field_type = $field_type;
    }

    public function getInfrastructure()
    {
        return $this->infrastructure;
    }

    public function setInfrastructure($infrastructure)
    {
        $this->infrastructure = $infrastructure;
    }

    public function getLight()
    {
        return $this->light;
    }

    public function setLight($light)
    {
        $this->light = $light;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getIdReservation()
    {
        return $this->id_reservation;
    }

    public function setIdReservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;
    }

    public function getReservationDate()
    {
        return $this->reservation_date;
    }

    public function setReservationDate($reservation_date)
    {
        $this->reservation_date = $reservation_date;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getBirthDate()
    {
        return $this->birth_date;
    }

    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($Duration)
    {
        $this->duration = $Duration;
    }

    public function getRvFieldName()
    {
        return $this->rv_field_name;
    }

    public function setRvFieldName($rv_field_name)
    {
        $this->rv_field_name = $rv_field_name;
    }

    public function getFieldDescription()
    {
        return $this->field_description;
    }

    public function setFieldDescription($field_description)
    {
        $this->field_description = $field_description;
    }

    public function getFieldAddress()
    {
        return $this->field_address;
    }

    public function setFieldAddress($field_address)
    {
        $this->field_address = $field_address;
    }


    public function __construct(
        $id_client,
        $start_time,
        $end_time,
        $rf_id_field,
        $price,
        $field_id,
        $field_name,
        $field_category,
        $subscribing_price,
        $field_type,
        $infrastructure,
        $light,
        $address,
        $longitude,
        $latitude,
        $description,
        $id_reservation,
        $reservation_date,
        $first_name,
        $last_name,
        $birth_date,
        $phone_number,
        $mail,
        $start,
        $duration,
        $rv_field_name,
        $field_description,
        $field_address
    ) {
        $this->id_client = $id_client;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->rf_id_field = $rf_id_field;
        $this->price = $price;
        $this->field_id = $field_id;
        $this->field_name = $field_name;
        $this->field_category = $field_category;
        $this->subscribing_price = $subscribing_price;
        $this->field_type = $field_type;
        $this->infrastructure = $infrastructure;
        $this->light = $light;
        $this->address = $address;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->description = $description;
        $this->id_reservation = $id_reservation;
        $this->reservation_date = $reservation_date;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birth_date = $birth_date;
        $this->phone_number = $phone_number;
        $this->mail = $mail;
        $this->start = $start;
        $this->duration = $duration;
        $this->rv_field_name = $rv_field_name;
        $this->field_description = $field_description;
        $this->field_address = $field_address;
    }

    public static function getReservationsWithFields($id_client)
    {
        $results = DB::table('v_reservation_detailled_field')
            ->where('id_client', $id_client)
            ->limit(1)
            ->get();

        $reservations = [];
        foreach ($results as $result) {
            $reservation = new Reservation_field(
                $result->id_client,
                $result->start_time,
                $result->end_time,
                $result->rf_id_field,
                $result->price,
                $result->field_id,
                $result->field_name,
                $result->field_category,
                $result->subscribing_price,
                $result->field_type,
                $result->infrastructure,
                $result->light,
                $result->address,
                $result->longitude,
                $result->latitude,
                $result->description,
                $result->id_reservation,
                $result->reservation_date,
                $result->first_name,
                $result->last_name,
                $result->birth_date,
                $result->phone_number,
                $result->mail,
                $result->start,
                $result->duration,
                $result->rv_field_name,
                $result->field_description,
                $result->field_address
            );
            $reservations[] = $reservation;
        }

        return $reservations;
    }

}


?>