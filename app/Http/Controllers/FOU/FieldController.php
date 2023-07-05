<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\Availability;
use App\Models\FOU\FieldDetailled;
use App\Models\FOU\Category;
use App\Models\FOU\Field;
use App\Models\FOU\FieldUser;
use App\Models\FOU\InfoField;
use App\Models\FOU\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FieldController extends Controller
{
    public function search(Request $request, $id_category=0) {
        $text = $request->input("search");
        $categories = Category::findAll();
        $fields = FieldDetailled::search($text, $id_category);
        $filters = Field::getFilters();
        if (Session::get("user") !== null) {
            $user = Session::get("user");
            $notifications = UserNotification::getAllUserNotification($user->getIdUsers());
            return view('FOU\list-terrain', ['fields' => $fields, 'categories' => $categories, 'id_category' => $id_category, 'filters' => $filters, 'notifications' => $notifications]);
        }
        return view('FOU\list-terrain', ['fields' => $fields, 'categories' => $categories, 'id_category' => $id_category, 'filters' => $filters]);
    }
    public function detail($id_field) {
        $date = date('Y-m-d');
        $users = null;
        if (Session::get("user") !== null) {
            $users = Session::get("user");
            $field = FieldUser::Sfind( $id_field, $users->getIdUsers());
            $notifications = UserNotification::getAllUserNotification($users->getIdUsers());
            return view('FOU\profile-field', ['field' => $field, 'date' => $date, 'notifications' => $notifications, 'haveuser' => true]);
        } else {
            $field = FieldUser::findReservation($id_field);
            return view('FOU\profile-field', ['field' => $field, 'date' => $date]);
        }
    }
    public function detailled($id_field, $date) {
        $field = new FieldDetailled();
        $field->findById($id_field);
        $availability = Availability::findByIdField($id_field, $date);
        if(Session::get("user") !== null) {
            $user = Session::get("user");
            $notifications = UserNotification::getAllUserNotification($user->getIdUsers());
            if (count($availability) == 0) return view('FOU\profile-field', ['field' => $field, 'availability_message' => "Ce terrain n'est pas disponible pour cette date"]);
            return view('FOU\profile-field', ['field' => $field, 'availability' => $availability, 'notifications' => $notifications]);
        }
        if (count($availability) == 0) return view('FOU\profile-field', ['field' => $field, 'availability_message' => "Ce terrain n'est pas disponible pour cette date"]);
        return view('FOU\profile-field', ['field' => $field, 'availability' => $availability]);

    }

    public function index($id_category = 0)
    {
        $categories = Category::findAll();
        if ($id_category == 0) {
            $fields = FieldDetailled::findAll();
        } else {
            $fields = FieldDetailled::findByCategory($id_category);
        }
        $filters = Field::getFilters();
        if (Session::get("user") !== null) {
            $user = Session::get("user");
            $notifications = UserNotification::getAllUserNotification($user->getIdUsers());
            return view('FOU\list-terrain', ['fields' => $fields, 'categories' => $categories, 'id_category' => $id_category, 'filters' => $filters, 'notifications' => $notifications]);
        }
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
        if (Session::get("user") !== null) {
            $user = Session::get("user");
            $notifications = UserNotification::getAllUserNotification($user->getIdUsers());
            return view('FOU\list-terrain', ['fields' => $fields, 'categories' => $categories, 'id_category' => $id_category, 'filters' => $filters, 'notifications' => $notifications]);
        }
        return view('FOU\list-terrain', ['fields' => $fields, 'categories' => $categories, 'id_category' => $id_category, 'filters' => $filters]);
    }

}
