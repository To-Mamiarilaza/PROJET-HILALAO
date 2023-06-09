<?php
namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use App\Models\BO\Category;
use App\Models\BO\DetailClient;
use App\Models\BO\DetailTerrain;
use App\Models\BO\Statistique;
use App\Models\BO\BackOfficeNotification;
use Illuminate\Support\Facades\Session;


class StatistiqueController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Vérifier la présence de la session 'id'
            if (Session::has('id_account_admin')) {
                // Rediriger vers une page ou retourner une réponse selon vos besoins
                return $next($request);// Exemple de redirection vers une page de connexion
            }
            return redirect()->route('log_admin'); 
            
        });
    }

    public function statistique($ref){
        $category = new Category();
        $client = new DetailClient();
        $allCategories = $category->getAllCategory();
        $currentYear = date("Y");
        $nbUsers = Statistique::getDataUsersYear($currentYear);
        $nbClients = Statistique::getDataClientsYear($currentYear); 
        $nbTerrains = Statistique::getDataTerrainsYear($currentYear, 0); 
        $clients = $client->getDetailClients();
        $detail = new DetailTerrain();
        $terrain = $detail->getAllField();
        $field = new Statistique();
        $all = $field->StatField();
        $notification = BackOfficeNotification::getAllBackOfficeNotification();

        
        return view('BO.statistique', [
            'allCategories' => $allCategories,
            'NbUsers' => Statistique::nombre(Statistique::getDonneeNb($nbUsers)),
            'NbClients' => Statistique::nombre(Statistique::getDonneeNb($nbClients)),
            'NbTerrains' => Statistique::nombre(Statistique::getDonneeNb($nbTerrains)),
            'clients' => $clients,
            'terrains' =>$terrain,
            'ref' => $ref,
            'all' => $all,
            'notifications' => $notification
        ]);
    }
}
?>