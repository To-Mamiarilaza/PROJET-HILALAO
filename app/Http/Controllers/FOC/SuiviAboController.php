<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Client;
use App\Models\FOC\suiviAbo\VueAbo;
use App\Models\FOC\suiviAbo\SubscriptionSuivi;
use App\Models\FOC\suiviAbo\Month;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exceptions\ClientExceptionHandler;
use App\Models\FOC\suiviAbo\SubscriptionState;
use App\Models\FOC\ClientNotification;

class SuiviAboController extends Controller
{
   public function subscriptionPage() {
      try {
         $clientConnected = session()->get('clientConnected');
         $notifications = ClientNotification::getAllClientNotification($clientConnected->getIdClient()); 
         $error = null;
         if(isset($_GET['error'])) {
            $error = $_GET['error'];
         }

         $field = Session::get('field');
         $dateNow = SubscriptionSuivi::getDateNow();
         $lastSubscription = SubscriptionSuivi::getEndSubscriptionField($field);
         $allMonth = Month::getAllMonth();
         
         if(isset($_POST['year'])) {
            $year = $_POST['year'];
         }
         else {
            $year = SubscriptionSuivi::getYear($dateNow);
         }
         $vueAbo = VueAbo::formerVueAbo($field, $year);
      } catch(Exception $e) {
         $error = $e->getMessage();
      }
      
      return view('FOC/subscription')->with([
         'vueAbo' => $vueAbo,
         'lastSubscription' => $lastSubscription,
         'allMonth' => $allMonth,
         'year' => $year,
         'field' => $field,
         'error' => $error,
         'notifications' => $notifications,
     ]);
   }

   public function insertSubscription(Request $request) {
      try {
         if($request->input("year") != null && $request->input("month") != null && $request->input("montant") != null) {
            $field = Session::get('field');
            $month = $request->input("month");
            $year = $request->input("year");
            $montant = $request->input("montant");
            $dateNow = SubscriptionSuivi::getDateNow();
            $subscription = new SubscriptionSuivi("default", $field, $dateNow, $year."-".$month."-01", 1, SubscriptionState::findById(1));
            $subscription->create($field->getClient());
         }
         else {
            throw new Exception("Completer correctement les champs");
         }
         
     } catch(Exception $e) {
         return redirect()->route('subscriptionPage', ['error' =>  $e->getMessage()]);
     }    
     
      return redirect()->route('subscriptionPage');
   }
}
?>