<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Client;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exceptions\ClientExceptionHandler;
use App\Models\FOC\ClientNotification;

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
            if($client != null) {
                echo "status";
                echo $client->getStatus()->getIdStatus();
                echo $client->getFirstName();
                if($client->isValidate()) {
                    session()->put('clientConnected', $client);
                    return redirect()->route('homeClient');
                }
                else {
                    session()->put('clientConnected', $client);
                    return redirect()->route('getClient');
                }
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

    public function homeClient() {
        $clientConnected = session()->get('clientConnected');
         $notifications = ClientNotification::getAllClientNotification($clientConnected->getIdClient()); 
         
         return view('FOC/home')->with([
            'notifications' => $notifications,
        ]);
    }
}
?>