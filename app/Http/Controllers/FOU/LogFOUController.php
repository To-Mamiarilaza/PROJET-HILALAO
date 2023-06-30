<?php

namespace App\Http\Controllers\FOU;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FOU\Users;
use App\Exceptions\UserException;
use Illuminate\Support\Facades\Session;

class LogFOUController extends Controller
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
}

?>
