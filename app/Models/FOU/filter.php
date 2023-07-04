<?php
namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Filter {
    private $name_filter;
    private $id_filter;
    private $value;


    public static function find($name_filter) {
        $sql = "SELECT id_%s as id, %s as val FROM %s WHERE status=1";
        $sql = sprintf($sql, $name_filter, $name_filter, $name_filter);
        $filters_db = DB::select($sql);
        $filters = [];
        foreach ($filters_db as $filter_db) {
            $filter = new Filter();
            $filter->setNameFilter($name_filter);
            $filter->setIdFilter($filter_db->id);
            $filter->setValue($filter_db->val);
            $filters[] = $filter;
        }
        return $filters;
    }

    public function getNameFilter() {
        return $this->name_filter;
    }
    public function setNameFilter($values) {
        $this->name_filter = $values;
    }
    public function getIdFilter() {
        return $this->id_filter;
    }
    public function setIdFilter($values) {
        $this->id_filter = $values;
    }
    public function getValue() {
        return $this->value;
    }
    public function setValue($values) {
        $this->value = $values;
    }
}
?>
