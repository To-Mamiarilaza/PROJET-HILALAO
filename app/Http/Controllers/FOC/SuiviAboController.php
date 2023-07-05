<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Client;
use App\Models\FOC\suiviAbo\VueAbo;
use App\Models\FOC\suiviAbo\SubscriptionSuivi;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exceptions\ClientExceptionHandler;

class SuiviAboController extends Controller
{
   public function subscriptionPage() {
      $field = Session::get('field');
      $dateNow = SubscriptionSuivi::getDateNow();
      $lastSubscription = SubscriptionSuivi::getEndSubscriptionField($field);

      if(isset($_POST['year'])) {
         $year = $_POST['year'];
      }
      else {
         $year = SubscriptionSuivi::getYear($dateNow);
      }
      $vueAbo = VueAbo::formerVueAbo($field, $year);
      
      return view('FOC/suiviAbo')->with([
         'vueAbo' => $vueAbo,
         'lastSubscription' => $lastSubscription,
     ]);
   }
}
?>