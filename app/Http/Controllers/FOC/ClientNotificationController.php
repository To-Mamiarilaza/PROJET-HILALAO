<?php
namespace App\Http\Controllers\FOC;

use App\Http\Controllers\Controller;
use App\Models\FOC\ClientNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientNotificationController extends Controller
{
	public function index(Request $request)
	{
		$idClient = 1; // ID de l'utilisateur (vous pouvez le remplacer par la valeur appropriée)

        $notifications = ClientNotification::getAllClientNotification($idClient);
        return view('FOC/testNotification', ['notifications' => $notifications]);	
	}

	public function changeNotificationState($idNotif) 
	{
		$idUserNotification = $idNotif;

		ClientNotification::updateState($idUserNotification);

		echo "Changement d'état effectué";
	}
}
?>