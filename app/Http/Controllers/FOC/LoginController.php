<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
	public function login(Request $request)
	{
		return view('FOC/login');
	}

	public function signin(Request $request)
	{
		return view('FOC/sign');
	}

	public function nextSignin(Request $request)
	{
		return view('FOC/sign_next_CIN');
	}
}
?>