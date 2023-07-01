<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\Category;
use App\Models\FOU\UserNotification;
use Illuminate\Contracts\Session\Session;

class HomeController extends Controller
{
    public function index()
    {
        $idUser = Session::get("user"); // ID de l	'utilisateur (vous pouvez le remplacer par la valeur appropriée)
        $notifications = UserNotification::getAllUserNotification($idUser);
        $categories = Category::findAll();
        return view('FOU\landing', ['categories' => $categories, 'notifications' => $notifications]);
    }
}
