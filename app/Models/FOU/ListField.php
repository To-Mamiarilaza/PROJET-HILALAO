<?php

namespace App\Models\FOU;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ListField extends Model
{
    protected $fillable = ['id_field', 'picture', 'name', 'address', 'description'];

    // Getter and Setter for 'id' attribute
    public function getIdAttribute($value)
    {
        return (int) $value;
    }

    public function setIdAttribute($value)
    {
        $this->attributes['id_field'] = (int) $value;
    }

    // Getter and Setter for 'picture' attribute
    public function getPictureAttribute($value)
    {
        return $value;
    }

    public function setPictureAttribute($value)
    {
        $this->attributes['picture'] = $value;
    }

    // Getter and Setter for 'name' attribute
    public function getNameAttribute($value)
    {
        return $value;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    // Getter and Setter for 'address' attribute
    public function getAddressAttribute($value)
    {
        return $value;
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = $value;
    }

    // Getter and Setter for 'description' attribute
    public function getDescriptionAttribute($value)
    {
        return $value;
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = $value;
    }

    // Constructor
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

   


function getListFields()
{
    // Define the SQL query
    $query = "SELECT id_field, picture, name, address, description FROM ListField";

    // Execute the query and retrieve the results
    $results = DB::select($query);

    // Create a collection to hold the ListField objects
    $listFields = collect();

    // Iterate through the query results and create ListField objects
    foreach ($results as $result) {
        $listField = new ListField();
        $listField->id_field = $result->id_field;
        $listField->picture = $result->picture;
        $listField->name = $result->name;
        $listField->address = $result->address;
        $listField->description = $result->description;

        $listFields->push($listField);
    }
    return $listFields;
}

}
