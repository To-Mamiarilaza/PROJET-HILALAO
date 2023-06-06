<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Client;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exceptions\ClientExceptionHandler;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $client = Client::login($password, $email);
            if($client != null) {
                session()->put('clientConnected', $client);
                $value = session()->get('clientConnected');
                return view('FOC/welcome')->with('client', $value);
            }
            else {
                throw new Exception("Veuillez ressayer");
            }
            
        } catch(Exception $e) {
            return view('FOC/login')->with('error', $e->getMessage());
        }     
    }

    public function signUp(Request $request)
    {
        return view('FOC/signUp');
    }

    public function signUpCin(Request $request)
    {
        return view('FOC/signUpCin');
    }
}
?>