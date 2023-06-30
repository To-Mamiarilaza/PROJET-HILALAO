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
    //Premier page a afficher
    public function firstPage(Request $request)
    {
        return view('FOC/login');
    }

    //Se connecter
    public function login(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $client = Client::login($password, $email);
           // echo $client->getIdClient();
           if($client != null) {
                session()->put('clientConnected', $client);
                return redirect()->to('/home-client');
            }
            else {
                throw new Exception("Veuillez ressayer");
            }

        } catch(Exception $e) {
            return view('FOC/login')->with('error', $e->getMessage());
        }
    }

    public function signin(Request $request)
    {
        return view('FOC/signUp');
    }

    public function nextsignup(Request $request)
    {
        return view('FOC/sign_next_CIN');
    }
	public function nextSignin(Request $request)
	{
		return view('FOC/sign_next_CIN');
	}

	public function profilClient(Request $request)
	{
		return view('FOC/profilClient');
	}

    public function deconnect() {
        // Récupérez l'ID de session actuel
        $sessionId = session()->getId();

        // Utilisez l'ID de session pour oublier la session
        Session::forget($sessionId);

        return view('FOC/login');
    }
}
?>
