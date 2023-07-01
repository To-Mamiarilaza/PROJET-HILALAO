<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;

class CIN {
    private $id_cin;
    private $cin_number;
    private $first_picture;
    private $second_picture;

    public static function findById($id) {
        $sql = 'SELECT id_cin, cin_number, first_picture, second_picture FROM "public".cin WHERE id_cin=%s';
        $sql = sprintf($sql, $id);
        $cin_db = DB::select($sql);
        $cin = new CIN();
        if (count($cin_db)!=0) {
            $cin->setIdCIN($cin_db[0]->id_cin);
            $cin->setCINNumber($cin_db[0]->id_cin);
            $cin->setFirstPicture($cin_db[0]->first_picture);
            $cin->setSecondPicture($cin_db[0]->second_picture);
        }
        return $cin;
    }


    public function getIdCIN() {
        return $this->id_cin;
    }
    public function setIdCIN($values) {
        $this->id_cin = $values;
    }
    public function getCINNumber() {
        return $this->cin_number;
    }
    public function setCINNumber($values) {
        $this->cin_number = $values;
    }
    public function getFirstPicture() {
        return $this->first_picture;
    }
    public function setFirstPicture($values) {
        $this->first_picture = $values;
    }
    public function getSecondPicture() {
        return $this->second_picture;
    }
    public function setSecondPicture($values) {
        $this->second_picture = $values;
    }

}
?>
