<?php
namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use App\Models\BO\BackOfficeNotification;
use Illuminate\Http\Request;

class BackOfficeController extends Controller
{
	public function index(Request $request)
	{
        $notifications = BackOfficeNotification::getAllBackOfficeNotification();
        return view('FOC/testNotification', ['notifications' => $notifications]);	
	}

	public function changeNotificationState($idNotif) 
	{
		BackOfficeNotification::updateState($idNotif);

		echo "Changement d'état effectué";
	}
}
?>