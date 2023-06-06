<?php

namespace App\Models\BO;
use Illuminate\Support\Facades\DB;

class Category
{
    public $id_category;
    public $category;
    public $subscribing_price;

    public function getId_category()
    {
        return $this->id_category;
    }
    public function setId_category($value)
    {
        $this->id_category = $value;
    }

    public function getCategory()
    {
        return $this->category;
    }
    public function setCategory($value)
    {
        $this->category = $value;
    }

    public function getSubscribing_price()
    {
        return $this->subscribing_price;
    }
    public function setSubscribing_price($value)
    {
        $this->subscribing_price = $value;
    }

    public function __construct()
    {
    }

    public function getAllCategory()
    {
        $category = DB::select('SELECT * FROM category ');
        $res = array();
        foreach ($category as $result) {
            $temp = new Category();
            $temp->setId_category($result->id_category);
            $temp->setCategory($result->category);
            $temp->setSubscribing_price($result->subscribing_price);
            $res[] = $temp;
        }
        return $res;
    }

    public function save(){
        $req = "INSERT INTO category(category,subscribing_price) VALUES ('%s',%s)";
        $category = $this->category;
        $subscribing_price = $this->subscribing_price;
        $req = sprintf($req,$category,$subscribing_price);
        DB::insert($req);
    }
}
