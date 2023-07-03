<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;

class Category{
    private $id_category;
    private $category;
    private $subscribing_price;
    private $description;

    public static function findAll() {
        $sql = "SELECT id_category, category, subscribing_price, description FROM category WHERE status=1";
        $categories_db = DB::select($sql);
        $res = array();
        foreach ($categories_db as $category_db) {
            $temp = new Category();
            $temp->settingDBResult($category_db);
            $res[] = $temp;
        }
        return $res;
    }

    public function getIdCategory()
    {
        return $this->id_category;
    }
    public function setIdCategory($values) {
        $this->id_category = $values;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function setCategory($values) {
        $this->category = $values;
    }
    public function getSubscribingPrice()
    {
        return $this->subscribing_price;
    }
    public function setSubscribingPrice($values) {
        $this->subscribing_price = $values;
    }
    public function getDescription() {
        return $this->description;
    }
    public function setDescription($values) {
        $this->description = $values;
    }

    private function settingDBResult($result) {
        $this->setIdCategory($result->id_category);
        $this->setCategory($result->category);
        $this->setSubscribingPrice($result->subscribing_price);
        $this->setDescription($result->description);
    }


}
?>
