<?php
namespace App\Http\Controllers\FOU;

use App\Models\FOC\GestionClient\Customer;
use App\Http\Controllers\Controller;
use App\Models\FOC\ClientNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FOU\UserNotification;

class UserNotificationController extends Controller
{
	public function index(Request $request)
	{
		$idUser = 2; // ID de l	'utilisateur (vous pouvez le remplacer par la valeur appropriée)

        $notifications = UserNotification::getAllUserNotification($idUser);
		
        return view('FOC/testNotification', ['notifications' => $notifications]);	
	}

	public function changeNotificationState($idNotif) 
	{
		$idClientNotification = $idNotif;

		UserNotification::updateState($idClientNotification);

		echo "Changement d'état effectué";
	}
}
?>