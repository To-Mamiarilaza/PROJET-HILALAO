<?php

namespace App\Models\BO;
use Exception;
use Illuminate\Support\Facades\DB;

class Category
{
    protected $id_category;
    protected $category;
    protected $subscribing_price;
    protected $status;

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

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($value)
    {
        $this->status = $value;
    }

    public function __construct()
    {
    }

    public function getAllCategory()
    {
        try{
            $category = DB::select('SELECT * FROM category where status = 1');
            $res = array();
            foreach ($category as $result) {
                $temp = new Category();
                $temp->setId_category($result->id_category);
                $temp->setCategory($result->category);
                $temp->setSubscribing_price($result->subscribing_price);
                $res[] = $temp;
            }
            return $res;
        }catch(Exception $e){
            throw new Exception("Impossible d'avoir ");
        }
    }

    public function getCategoryById($id)
    {
        try{
            $req = sprintf("SELECT * FROM category WHERE id_category = %s", $id);
            $category = DB::select($req);
            
            if (count($category) > 0) {
                $result = $category[0];
                $temp = new Category();
                $temp->setId_category($result->id_category);
                $temp->setCategory($result->category);
                $temp->setSubscribing_price($result->subscribing_price);
                return $temp;
            }

        }catch(Exception $e){
            throw new Exception("Cette categorie n'existe meme pas");
        }
        
    }


    public function save(){
        try{
            $req = "INSERT INTO category(category,subscribing_price) VALUES ('%s',%s)";
            $category = $this->getCategory();
            $subscribing_price = $this->getSubscribing_price();
            $req = sprintf($req,$category,$subscribing_price);
            DB::insert($req);

        }catch(Exception $e){
            $e->getMessage();
        }
    }

    public function delete(){
        try{
            $req = "update category set status = 10 where id_category = %s";
            $id_category = $this->getId_category();
            $req = sprintf($req, $id_category);
            DB::update($req);
        }catch(Exception $e){
            throw new Exception("Supression non valider");
        }
    }

    public function update(){
        try{
            $req = "update category set category='%s' , subscribing_price =%s  where id_category = %s ";
            $id_category = $this->getId_category();
            $category = $this->getCategory();
            $subscribing_price = $this->getSubscribing_price();
            $req = sprintf($req,$category,$subscribing_price,$id_category);
            print($req);
            DB::update($req);
        }catch(Exception $e){
            throw new Exception("Veuillez ressayer");
        }
    }
}
