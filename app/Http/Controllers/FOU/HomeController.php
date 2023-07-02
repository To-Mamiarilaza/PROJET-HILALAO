<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\Category;
use App\Models\FOU\UserNotification;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        if (Session::get("user") !== null) {
            $idUser = Session::get("user")->getIdUsers(); // ID de l	'utilisateur (vous pouvez le remplacer par la valeur appropriée)
            $notifications = UserNotification::getAllUserNotification($idUser);
            $categories = Category::findAll();
            return view('FOU\landing', ['categories' => $categories, 'notifications' => $notifications]);
        } else {
            $categories = Category::findAll();
            return view('FOU\landing', ['categories' => $categories]);
        }
    }
}
