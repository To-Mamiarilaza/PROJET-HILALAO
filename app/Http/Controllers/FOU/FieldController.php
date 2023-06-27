<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\FieldDetailled;
use App\Models\FOU\Category;
use App\Models\FOU\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index($id_category = 0)
    {
        $categories = Category::findAll();
        if ($id_category == 0) {
            $fields = FieldDetailled::findAll();
        } else {
            $fields = FieldDetailled::findByCategory($id_category);
        }
        $filters = Field::getFilters();
        return view('FOU\list-terrain', ['fields' => $fields, 'categories' => $categories, 'id_category' => $id_category, 'filters' => $filters]);
    }

    public function filter(Request $request) {
        $id_category = $request->input("id_category");
        $id_infrastructure = $request->input("infrastructure");
        $id_field_type = $request->input("field_type");
        $id_light = $request->input("light");
        $date_reservation = $request->input("date_reservation");
        $time = $request->input("time");
        $tri = $request->input("tri");
        $filters = Field::getFilters();
        $fields = FieldDetailled::filtre($id_category, $id_infrastructure, $id_field_type, $id_light, $date_reservation, $time, $tri);
        $categories = Category::findAll();
        return view('Fou\list-terrain', ['fields' => $fields, 'categories' => $categories, 'id_category' => $id_category, 'filters' => $filters]);
    }

}
