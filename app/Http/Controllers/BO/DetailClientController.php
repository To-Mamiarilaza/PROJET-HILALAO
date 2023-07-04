<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\DetailClient;
use App\Models\BO\BackOfficeNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class DetailClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Vérifier la présence de la session 'id'
            if (!Session::has('id_account_admin')) {
                // Rediriger vers une page ou retourner une réponse selon vos besoins
                return redirect()->route('log_admin'); // Exemple de redirection vers une page de connexion
            }
            
            return $next($request);
        });
    }
    public function detailClient( $id_client,$ref)
    {
        $detail = new DetailClient();
        $all = $detail->getDetailClient($id_client);
        
        $notification = BackOfficeNotification::getAllBackOfficeNotification();
        return view('BO.detailClient', [
            'all' => $all,
            'ref' => $ref,
            'notifications' => $notification
        ]);
    }

    public function modifierStatus($value, $id_client){
        $modifier = new DetailClient();;
        $modifier->update_status($value, $id_client);
        if($value !=1){
            $value = 0;
        }
        BackOfficeNotification::insert_client_notification($id_client,10);
        BackOfficeNotification::insert_client_validation($value);
        return redirect('/ValidationClient/validationClient');
    }
}