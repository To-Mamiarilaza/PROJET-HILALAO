<?php

namespace App\Http\Controllers\FOU;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FOU\Users;
use App\Exceptions\UserException;
use App\Models\FOU\UserReservation;
use App\Models\FOU\UserNotification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LogController extends Controller
{

    public function index() {
        return $this->log();
    }

    public function log($error = ""): View
    {
        return view('FOU/login', ['error' => $error]);
    }



    public function sign(): View
    {
        return view('FOU/sign');
    }

    public function signup(Request $request) {
    }

    public function signin(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        $user = new Users();
        $user->setMail($username);
        $user->setPwd($password);
        try {
            Session::put("user", $user->log());
            return Redirect('landing');
        } catch (UserException $e) {
            return View('FOU/login', ['error' => $e->getType()]);
        }
    }

    public function signout() {
        Session::remove("user");
        return Redirect('/log/user');
    }

    public function myAccount() {
        if (Session::get("user") !== null) {
            return Redirect("/user/account");
        }
        return Redirect("/log/user");
    }

    public function info() {
        $user = Session::get("user");
        $user = UserReservation::findReservationByIdUser($user->getIdUsers());
        $notifications = UserNotification::getAllUserNotification($user->getIdUsers());
        return view('FOU/profil-user', ["user" => $user, "notifications" => $notifications]);
    }
}

?>
