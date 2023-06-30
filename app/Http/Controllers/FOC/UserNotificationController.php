<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Customer;
use App\Http\Controllers\Controller;
use App\Models\FOC\ClientNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FOC\UserNotification;

class TestNotification extends Controller
{
	public function index(Request $request)
	{
		$idUser = 3; // ID de l	'utilisateur (vous pouvez le remplacer par la valeur appropriée)

        $notifications = UserNotification::getAllUserNotification($idUser);
		
        return view('FOC/testNotification', ['notifications' => $notifications]);	
	}

	public function changeNotificationState($idNotif) 
	{
		$idClientNotification = $idNotif;

		ClientNotification::updateState($idClientNotification);

		echo "Changement d'état effectué";
	}
}
?>