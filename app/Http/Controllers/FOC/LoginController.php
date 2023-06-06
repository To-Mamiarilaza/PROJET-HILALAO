<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $client = Client::login($password, $email);

        if($client != null) {
            session()->put('customerConnected', $client);
            $value = session()->get('customerConnected');
            return view('FOC/welcome')->with('customer', $value);
        }      
        echo "erreur";
    }

    public function signup(Request $request)
    {
        return view('FOC/sign');
    }
}
?>